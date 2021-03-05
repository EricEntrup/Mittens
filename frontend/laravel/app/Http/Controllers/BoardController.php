<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Board;
use \App\BoardTask;
use Validator;
use Config;
class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.project_management')  ]);
        $auth_user = authSession();

        $boarddata = Board::where('status','1')->orderBy('sequence','ASC')->with(['boardTask'])->get();
        $assets = ['rearrange'];
        $taskpriority = Config::get('constant.PRIORITY');
        return view('board.index', compact('pageTitle','auth_user','boarddata','assets','taskpriority'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=-1)
    {
        $max = Board::count();
        if($id == '-1'){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.board')]);
            $boarddata = new Board;
            $max = $max + 1 ;
            $boarddata->sequence = $max;
        }else{
            $pageTitle = trans('messages.update_form_title',['form' => trans('messages.board')]);
            $boarddata = Board::find($id);
        }
        return view('board.create', compact('pageTitle' ,'boarddata' ,'max' ));
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
            'title'=>'required',
        ]);

        if($validator->fails()) {
            $message = $validator->errors()->first();
            return response()->json(['status'=>false,'message'=>$message,'event'=>'validation']);

        }
        // $data['sequence'] = (isset($data['sequence']) && $data['sequence'] != "") ? $data['sequence'] : null;
        $data['status'] = 1;
        $result = Board::updateOrCreate(['id'=>$data['id'] ],$data);
        $message = trans('messages.update_form',['form' => trans('messages.board')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.board')]);
        }

        return response()->json(['status' => true,'event'=>'callback','message'=>$message ]);
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
        $boarddata = Board::where('id',$id)->first();
        if($boarddata != ''){
            BoardTask::where('board_id',$id)->delete();
            $boarddata->delete();
            $message = trans('messages.delete_form',['form' => trans('messages.board')]);
        }
        else{
            $message = trans('messages.not_found_entry',['form' => trans('messages.board')]);
        }
        return redirect(route('board.index'))->withSuccess($message);
    }

    public function sequenceGet()
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.board')  ]);
        $boarddata = Board::orderBy('sequence','ASC')->get();
        if(count($boarddata) > 0 ){
            $assets = ['rearrange'];
            return view('board.reorder', compact(['boarddata','pageTitle','assets']));
        }else{
            $message =  trans('messages.not_found_entry',['form' => trans('messages.board')]);
            return redirect(route('board.index'))->withSuccess($message);
        }
    }

    public function sequenceSave(Request $request)
    {
        
        if(count($request->id) > 0){
            foreach($request->id as $key => $value){
                Board::where('id',$value)->update(['sequence' => $key+1]);
            }
        }
        $message = trans('messages.update_form',['form' => trans('messages.sequence')]);
        return redirect()->route('board.index')->withSuccess($message);
    }
}
