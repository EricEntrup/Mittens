<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AppointmentDataTable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use \App\Appointment;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AppointmentDataTable $dataTable)
    {
        $pageTitle = trans('messages.list_form_title',['form' => trans('messages.appointment')  ]);
        $auth_user = authSession();

        if(request()->ajax())
        {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

            $data = Appointment::whereDate('date', '>=', $start)->whereDate('date',   '<=', $end)->with(['user','category'])->get();

            return response()->json($data);
        }

        $assets = ['fullcalender'];

        return view('appointment.index', compact('pageTitle','auth_user','assets'));
        // return $dataTable->render('appointment.index', compact('pageTitle','auth_user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=-1)
    {
        if($id == '-1'){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.appointment')]);
            $appointmentdata = new Appointment;
            $appointmentdata->date = date('d-m-Y');
            $appointmentdata->time = date('H:i');
        }else{
            $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.appointment')]);
            $appointmentdata = Appointment::find($id);
            $appointmentdata->date = date('d-m-Y',strtotime($appointmentdata->date));
        }
        return view('appointment.create', compact('pageTitle' ,'appointmentdata' ));
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
            'category_id' => 'required',
            'service_id' => 'required',
        ]);
        if($validator->fails()) {
           return redirect()->back()->withInput()->with('errors', $validator->errors()->first());
        }
        $data['date'] = isset($request->date) ? date('Y-m-d',strtotime($request->date)) : date('Y-m-d');

        $result = Appointment::updateOrCreate(['id' => $data['id'] ],$data);

        $message = trans('messages.update_form',['form' => trans('messages.appointment')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.appointment')]);
        }
        return redirect(route('appointment.index'))->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = trans('messages.view_form_title',['form' => trans('messages.appointment')  ]);
        $appointmentdata = Appointment::where('id',$id)->first();
        return view('appointment.view', compact('pageTitle' ,'appointmentdata'));
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
        $id = $request->id;
        $input = $request->all();

        $input['date'] = date('Y-m-d',strtotime($request->date));

        $appointment = Appointment::find($id);
        $appointment->fill($input)->update();
        return response()->json([ 'status' => true , 'message' => trans('messages.update_form',['form' => trans('messages.appointment')]) ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointmentdata = Appointment::where('id',$id)->first();
        if($appointmentdata != ''){
            $appointmentdata->delete();
            $message = trans('messages.delete_form',['form' => trans('messages.appointment')]);
        }
        else{
            $message = trans('messages.not_found_entry',['form' => trans('messages.appointment')]);
        }
        return redirect(route('appointment.index'))->withSuccess($message);
    }
}
