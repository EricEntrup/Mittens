<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Validator;
use Illuminate\Http\Response;
use App\DataTables\UserDataTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.user')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('user.index', compact('pageTitle','auth_user','assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=-1)
    {
        if($id == '-1'){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.user')  ]);
            $userdata = new User;
        }else{
            $pageTitle = trans('messages.update_form_title',['form' => trans('messages.user')  ]);
            $userdata = User::findOrFail($id);
            // $userdata->date = showDate($userdata->date);
            $profile_image = getSingleMedia($userdata, 'profile_image');
        }
        $relation = [
            'roles' => Role::whereNotIn('name',['admin','demo_admin'])->where('status',1)->orderBy('name','ASC')->get()->pluck('name', 'name'),
        ];

       
        return view('user.create',compact('pageTitle','userdata')+$relation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = isset($request->id) ? $request->id : null;
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => 'required',
            'contact_number' => 'required|digits_between:6,12|unique:users,contact_number,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            
            'profile_image' => 'mimetypes:image/jpeg,image/png,image/jpg',
        ],['profile_image.mimetypes' =>'Image should be png/PNG, jpg/JPG',
        ]);
        if( $id == null ){
            $validator = Validator::make($data,[
                'password' => 'required|confirmed|min:8',
            ]);
        }

        if($validator->fails()) {
           return redirect()->back()->withInput()->with('errors', $validator->errors()->first());
        }

        // Save User data...
        if($id == null){
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
        }else{
            $user = User::findOrFail($id);
            // User data...
            $user->removeRole($user->user_type);
            $user->fill($request->all())->update();
        }
        $user->assignRole($data['user_type']);

        // Save user image...
        if (isset($request->profile_image) && $request->profile_image != null ) {
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        $message = trans('messages.update_form',['form' => trans('messages.user')]);
        if($user->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.user')]);
        }
        return redirect(route('users.index'))->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = trans('messages.view_form_title',['form' => trans('messages.user')  ]);
        $userdata = User::where('id',$id)->with(['appointment'])->first();
        return view('user.view', compact('pageTitle' ,'userdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userdata = User::where('id',$id)->first();
        if($userdata != ''){
            $userdata->delete();
            $message = trans('messages.delete_form',['form' => trans('messages.user')]);
        }
        else{
            $message = trans('messages.not_found_entry',['form' => trans('messages.user')]);
        }
        return redirect(route('user.index'))->withSuccess($message);
    }
}
