<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Repositories\SettingRepository;

class ThemeSettingController extends Controller
{
    /** @var  SettingRepository */
//    private $themeSettingRepository;
//
//    public function __construct(SettingRepository $themeSettingRepo)
//    {
//        $this->themeSettingRepository = $themeSettingRepo;
//    }

    public function index(Request $request)
    {
        $pageTitle = 'Theme Setting';
        $auth_user = authSession();
        $page = $request->page;
        if ($page == '')
        {
            $page = 'header';
        }
        return view('theme-setting.index',compact('page', 'pageTitle','auth_user'));
    }

    public function themePage(Request $request)
    {
        $page = $request->page;
        $color = \Config::get('constant.COLOR');
        $font = \Config::get('constant.FONT');
        switch ($page) {
            case 'header' :
                $data  = view('theme-setting.header', compact('page'))->render();
                break;
            default:
                $data  = view('theme-setting.'.$page, compact('page','color','font'))->render();
                break;
        }
        return response()->json($data);
    }

    public function themeSettingStore(Request $request)
    {
        $page = $request->page;
        $path = base_path('resources/views/partials/_dynamic_'.$page.'.blade.php');
        if ($page == 'header'){
            foreach($request->custom as $key => $listing){
                $path = base_path('resources/views/partials/_dynamic_'.$key.'.blade.php');
                if (file_exists($path)) {
                    file_put_contents($path,$listing);
                    $message = ucfirst($page)." Setting Saved Successfully.";
                }else{
                    $message = "File Not Found.";
                }
            }
        }elseif($page == 'font'){
            if (isset($request->font)){
                $font = \Config::get('constant.FONT');
                foreach ($font as $font_variable){
                    file_put_contents($path,$request->$page);
                    $font_family = '--font-family';
                    $font_value['value'] = $request[$font_family];
                    $variableCss = file_get_contents(public_path('css/variable.css'));
                    $find_value = $font_variable.': ';
                    $old_value = get_string_between($variableCss, "$find_value", ";");
                    variableCssChange($font_variable,$old_value,$request[$font_family]);
                }
            }
            $message = ucfirst($page)." Setting Saved Successfully.";
        }
        return redirect()->route('theme.setting', ['page' => $page])->withSuccess($message);
    }

    public function themeColorStore(Request $request)
    {
        $page = $request->page;
        $color = \Config::get('constant.COLOR');
        foreach ($color as $color_name){
            $color_value['value'] = $request->$color_name;
            $theme_type = 'theme-type';
            $theme_color = '--theme-color';
            $gradient_f_color = '--gradient-first-color';
            $gradient_s_color = '--gradient-second-color';
            $variableCss = file_get_contents(public_path('css/variable.css'));
            $find_value = $color_name.': ';
            $old_value = get_string_between($variableCss, "$find_value", ";");
            if ($request->$color_name != null || $request->$color_name != '')
            {
                if ($request->$theme_type == 'single'){
                    $request[$gradient_f_color] = $request->$theme_color ;
                    $request[$gradient_s_color] = $request->$theme_color ;
                }else{
                    $request[$theme_color] = $request[$gradient_f_color];
                }
                variableCssChange($color_name,$old_value,$request->$color_name);
            }
            $message = ucfirst($page).' Setting Saved Successfully.';
        }
        return redirect()->route('theme.setting', ['page' => $page])->withSuccess($message);
    }
}
