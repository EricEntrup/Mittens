<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Service;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $assets = ['apexchart'];
        return view('dashboard.index',compact('assets'));
    }
    public function getAjaxList(Request $request)
    {
        $items = array();
        $value = $request->q;
        $auth_user =  authSession();
        switch ($request->type) {
            case 'permission':
                $items = \DB::table('permissions')->select(\DB::raw('id,name text'))
                        ->whereNull('parent_id')
                        ->get();
                    break;
            case 'static_data':
                $items = \DB::table('static_data')->select(\DB::raw('value id,value text'))
                    ->where('type',$request->data_type)
                    ->where('status',1)
                    ->orderby('sequence')
                    ->orderby('value')
                    ->get();
                break;
            case 'user':
                $items = \DB::table('users')->select(\DB::raw('id,name text'))
                    ->whereNotIn('user_type',['admin' , 'demo_admin'])
                    ->orderby('name')
                    ->get();
                break;
            case 'category':
                $items = Category::select(\DB::raw('id,name text'))
                    ->where('status','1')
                    ->where(function($query) use($value) {
                        $query->where(\DB::raw('name', 'LIKE', '%'.$value.'%'));
                        $query->orWhere('name', 'LIKE', '%'.$value.'%');
                    });
                    $items = $items->get();
                break;
            case 'service':
                $items = Service::select(\DB::raw('id,name text ,price'))
                    ->where('status','1')
                    ->where('category_id',$request->data_type)
                    ->where(function($query) use($value) {
                        $query->where(\DB::raw('name', 'LIKE', '%'.$value.'%'));
                        $query->orWhere('name', 'LIKE', '%'.$value.'%');
                    });
                    $items = $items->get();
                break;
            default :
                break;
        }
        return response()->json(['status' => 'true', 'results' => $items]);
    }

    public function changeStatus(Request $request)
    {

        $type = $request->type;

        $message = trans('messages.update_form',['form' => trans('messages.status')]);
        switch ($type) {
            case 'role':
                    $role = \App\Role::find($request->id);
                    $role->status = $request->status;
                    $role->save();
                    break;
            case 'service':
                    $service = \App\Service::find($request->id);
                    $service->status = $request->status;
                    $service->save();
                    break;
            case 'category':
                    $category = \App\Category::find($request->id);
                    $category->status = $request->status;
                    $category->save();
                    break;
            default:
                    $message = 'error';
                break;
        }
        
        return response()->json(['message'=> $message ]);
    }
}
