<?php
namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

use App\User;

use DB;
use Session;
use Auth;
use Hash;
use Validator;
use Image;
use File;
use Input;


class UserController extends Controller
{
	public function index(Request $request)
    {   
        
    }

    public function updateProfile(Request $request){

    	$user_data = \Auth::user();
        $title = trans('messages.profile');
        

    	return view('users.profile.index',compact('user_data','title'));
    }

    public function updateUpdate(Request $request){

        $id=$request->id;
        $page = 'profile_form';

        $route = 'admin.settings';
        if(demoUserPermission()){
            return redirect()->route($route, ['page' => $page])->with('errors',trans('messages.demo_permission_denied'));
        }

    	$validator = Validator::make($request->all(), [
    	    'name' => 'required|regex:/^[\pL\s-]+$/u|max:255',
            'contact_number' => 'required|digits_between:6,12|unique:users,contact_number,'.$id,
            'profile_image' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif|max:255',
    	],['profile_image'=>'Image should be png/PNG, jpg/JPG',
        ]);
  	        
        if ($validator->fails()) {
            return redirect()->route($route, ['page' => $page])->with('errors',$validator->errors()->first());
        }
        $user = User::findOrFail($id);
    	$user->fill($request->all())->update();
    	
    	if (isset($request->profile_image) && $request->profile_image != null) {
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        return redirect()->route($route, ['page' => $page])->withSuccess(trans('messages.update_form',['form' => trans('messages.profile')]));
    }

    public function changePassword(Request $request){ 

    	$title='Change Password';
    	return view('users.profile.change-password',compact('title'));
    }

    protected function passValidatorPass(array $data)
    {
        return Validator::make($data, [
            'old' => 'required|max:255',
            'password' => 'required|min:8|confirmed|max:255',
            ],['old.*'=>'The old password field is required.',
                'password.required'=> 'The new password field is required.',
                'password.confirmed'=> 'The password confirmation does not match.']);
    }

    public function passwordUpadte(Request $request)
    {   
        
        $route = 'admin.settings';
        
        $user = User::find(Auth::id());
        $page = 'password_form';
        if(demoUserPermission()){
            return redirect()->route($route, ['page' => $page])->with('errors',trans('messages.demo_permission_denied'));
        }
        $validator = $this->passValidatorPass($request->all());

        if ($validator->fails()) {
            return redirect()->route($route, ['page' => $page])->with('errors',$validator->errors()->first());
        }
       
        $hashedPassword = $user->password;
        $match = Hash::check($request->old, $hashedPassword);
        $same_exits = Hash::check($request->password, $hashedPassword);

        if($match) {
            if($same_exits){
                return redirect()->route($route, ['page' => $page])->with('errors',trans('messages.old_new_pass_same'));
            }

            $user->fill([ 'password' => Hash::make($request->password) ])->save();
            \Auth::logout();
        
            return redirect()->route($route, ['page' => $page])->withSuccess(trans('messages.password_change'));
        }else{
            return redirect()->route($route, ['page' => $page])->with('errors',trans('messages.check_old_password'));
        }
    }


    
}