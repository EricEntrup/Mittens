<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ServiceDataTable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.service')  ]);
        $auth_user = authSession();
        $assets = ['datatable'];
        return $dataTable->render('service.index', compact('pageTitle','auth_user','assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=-1)
    {
        if($id == '-1'){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.service')]);
            $servicedata = new Service;
        }else{
            $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.service')]);
            $servicedata = Service::find($id);
        }
        return view('service.create', compact('pageTitle' ,'servicedata' ));
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
            'category_id' => 'required',
            'price' => 'required|numeric'
        ]);
        if($validator->fails()) {
           return redirect()->back()->withInput()->with('errors', $validator->errors()->first());
        }

        $result = Service::updateOrCreate(['id' => $data['id'] ],$data);

        $message = trans('messages.update_form',['form' => trans('messages.service')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.service')]);
        }
        return redirect(route('service.index'))->withSuccess($message);
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
        $table_list = ['appointment'];
        $column_name = "service_id";
        $del_status = CheckRecordExist($table_list,$column_name,$id);
        if(!$del_status){
            return redirect(route('service.index'))->with('errors',trans('messages.check_delete_msg',['form' => trans('messages.service') ]));
        }
        $servicedata = Service::where('id',$id)->first();
        if($servicedata != ''){
            $servicedata->delete();
            $message = trans('messages.delete_form',['form' => trans('messages.service')]);
        }
        else{
            $message = trans('messages.not_found_entry',['form' => trans('messages.service')]);
        }
        return redirect(route('service.index'))->withSuccess($message);
    }
}
