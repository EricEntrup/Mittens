<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Setting;
use App\AppSetting;
use Intervention\Image\Facades\Image; 
use Session;
use Input;
use Config;
class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function settings(Request $request)
    {
        $auth_user = authSession();
        $pageTitle = 'Setting';
        $page = $request->page;

        // dd($auth_user->hasAnyRole(['admin', 'demo_admin']));
        if($page == ''){
            if($auth_user->hasAnyRole(['admin', 'demo_admin'])){
                $page = 'general-setting';
            }else{
                $page = 'profile_form';
            }
        }

        return view('setting.index',compact('page', 'pageTitle' ,'auth_user'));
    }

    public function settingsUpdates(Request $request)
    {
        $auth_user = authSession();
        if($auth_user->hasAnyRole(['demo_admin'])){
            return redirect()->back()->with('errors',trans('messages.demo_permission_denied'));
        }
        $settings =  $request->all();

        $page = $request->page;

        $settings['site_name'] = isset($settings['site_name'] ) ? str_replace(' ','_',$settings['site_name']) : null;
        $res = AppSetting::updateOrCreate(['id' => $settings['id']], $settings);
        $type = 'APP_NAME';

        envChanges($type,$settings['site_name']);
        $ext_type = Config::get('constant.IMAGE_EXTENTIONS');
        $message = '';
        if($request->site_logo) {
            $res->clearMediaCollection('site_logo');
            $res->addMediaFromRequest('site_logo')
                ->toMediaCollection('site_logo');
        }
        if($request->site_favicon) {
            $res->clearMediaCollection('site_favicon');
            $res->addMediaFromRequest('site_favicon')
                ->toMediaCollection('site_favicon');
        }
        settingSession('set');

        return redirect()->route('admin.settings', ['page' => $page])->withSuccess(trans('Successfully updated.'));
    }
     /*ajax show layout data*/

     public function layoutPage(Request $request){

        $page = $request->page;
        $auth_user = authSession();
        $user_id = $auth_user->id;
        $settings = AppSetting::first();
        $user_data = User::find($user_id);
        $envSettting = $envSettting_value =[];
        if ($page == 'mail-setting'){
            $envSettting = Config::get('constant.MAIL_SETTING');
        }elseif ($page == 'configuration'){
            $envSettting = Config::get('constant.CONFIGURATION');
        }elseif($page == 'social'){
            $envSettting = Config::get('constant.SOCIAL');
        }
        if(count($envSettting) > 0 ){
            $envSettting_value = Setting::whereIn('key',array_keys($envSettting))->get();
        }
        if($settings == null){
            $settings = new AppSetting;
        }elseif($user_data == null){
            $user_data = new User;
        }
        switch ($page) {
            case 'password_form':
                $data  = view('user.profile.'.$page, compact('settings','user_data','page'))->render();
                break;
            case 'profile_form':
                $data  = view('user.profile.'.$page, compact('settings','user_data','page'))->render();
                break;
            case 'mail-setting':
                $data  = view('setting.'.$page, compact('settings','page','envSettting','envSettting_value'))->render();
                break;
            default:
                $data  = view('setting.'.$page, compact('settings','page','envSettting'))->render();
                break;
        }
        return response()->json($data);
    }

    public function envSetting(Request $request)
    {
        $auth_user = authSession();
        if($auth_user->hasAnyRole(['demo_admin'])){
            return redirect()->back()->with('errors',trans('messages.demo_permission_denied'));
        }
        $page=$request->page;
        $envtype = $request->type;
        $setting = $social = null;
        if ($envtype == 'mail') {

            $setting = Config::get('constant.MAIL_SETTING');

        }elseif($envtype == 'configuration'){

            $setting = Config::get('constant.CONFIGURATION');

        }elseif($envtype == 'social'){
            $social = Config::get('constant.SOCIAL');
        } else{
            $setting = null;
        }
        if ( $setting != null ) {
            foreach($setting as $key => $value){
                if ($value != null){
                    $type = $key;
                    $value = str_replace(' ','_',$request->$key);
                    envChanges($type,$value);
                }
                $input=[
                    'key' => $key,
                    'value' => str_replace(' ','_',$request->$key),
                ];
                Setting::updateOrCreate(['key'=>$input['key']],$input);
            }
        }
        if ( $social != null){
            foreach ($social as $key => $value){
                foreach($value as $social => $social_value){
                    $type = $social;
                    $value = $request->$social;
                    envChanges($type,$value);
                }
                $input=[
                    'key' => $key,
                    'value' => str_replace(' ','_',$request->$key),
                ];
                Setting::updateOrCreate(['key'=>$input['key']],$input);
            }
        }
        return redirect()->route('admin.settings', ['page' => $page])->withSuccess(ucfirst($envtype).' Setting Changed Successfully.');
    }

    public function contactus_settings(Request $request)
    {  
        if(demoUserPermission()){
            return redirect()->back()->with('errors',trans('messages.demo_permission_denied'));
        }
    	$settings =  $request->all();
    	$page = $request->page;     
        
        $res = AppSetting::updateOrCreate(['id' => $request->id], $settings);
	 
        return redirect()->route('admin.settings', ['page' => $page])->withSuccess(trans('Contact information updated successfully.'));
    }

}
