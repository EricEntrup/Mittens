<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\BoardTask;
use Validator;
use Config;
class BoardTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=-1,Request $request)
    {
        $board_id = $request->board_id;
        if($id == '-1'){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.boardtask')]);
            $boardtaskdata = new BoardTask;
            $boardtaskdata->board_id = $board_id;
            $boardtaskdata->date = date('d-m-Y');
        }else{
            $pageTitle = trans('messages.update_form_title',['form' => trans('messages.boardtask')]);
            $boardtaskdata = BoardTask::find($id);
            $boardtaskdata->date = date('d-m-Y',strtotime($boardtaskdata->date));
        }
        $taskpriority = Config::get('constant.PRIORITY');
        
        return view('boardtask.create', compact('pageTitle' ,'boardtaskdata' ,'taskpriority' ));
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
            'name'=>'required',
        ]);

        if($validator->fails()) {
            $message = $validator->errors()->first();
            return response()->json(['status'=>false,'message'=>$message,'event'=>'validation']);
        }
        $data['date'] = isset($request->date) ? date('Y-m-d',strtotime($request->date)) : date('Y-m-d');

        $result = BoardTask::updateOrCreate(['id'=>$data['id'] ],$data);
        $message = trans('messages.update_form',['form' => trans('messages.boardtask')]);
        
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.boardtask')]);
        }

        return response()->json(['status' => true, 'event' => 'callback', 'message'=>$message ]);
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
    public function update(Request $request)
    {
        $boardtask = BoardTask::where('id',$request->boardtask_id)->update([ 'board_id' => $request->board_id ]);
       
        return response()->json([ 'status' => true , 'event' => 'callback' , 'message' => trans('messages.update_form',['form' => trans('messages.appointment')]) ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boardtaskdata = BoardTask::where('id',$id)->first();
        if($boardtaskdata != ''){
            $boardtaskdata->delete();
            $message = trans('messages.delete_form',['form' => trans('messages.boardtask')]);
        }
        else{
            $message = trans('messages.not_found_entry',['form' => trans('messages.boardtask')]);
        }
        return redirect(route('board.index'))->withSuccess($message);
    }
}
