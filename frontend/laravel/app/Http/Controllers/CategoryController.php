<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CategoryDataTable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use \App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.category')  ]);
        $auth_user = authSession();
        $assets = ['datatable_builder'];
        return $dataTable->render('category.index', compact('pageTitle','auth_user','assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=-1)
    {
        if($id == '-1'){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.category')]);
            $categorydata = new Category;
        }else{
            $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.category')]);
            $categorydata = Category::find($id);
        }
        return view('category.create', compact('pageTitle' ,'categorydata' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'name' => 'required',
        ]);
        if($validator->fails()) {
           return redirect()->back()->withInput()->with('errors', $validator->errors()->first());
        }
        $data['status'] = '1';
        $result = Category::updateOrCreate(['id' => $data['id'] ],$data);

        $message = trans('messages.update_form',['form' => trans('messages.category')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.category')]);
        }
        return redirect(route('category.index'))->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $table_list = ['service','appointment'];
        $column_name = "category_id";
        $del_status = CheckRecordExist($table_list,$column_name,$id);
        if(!$del_status){
            return redirect(route('category.index'))->with('errors',trans('messages.check_delete_msg',['form' => trans('messages.category') ]));
        }
        $categorydata = Category::where('id',$id)->first();
        if($categorydata != ''){
            $categorydata->delete();
            $message = trans('messages.delete_form',['form' => trans('messages.category')]);
        }
        else{
            $message = trans('messages.not_found_entry',['form' => trans('messages.category')]);
        }
        return redirect(route('category.index'))->withSuccess($message);
    }
}
