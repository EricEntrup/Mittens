<?php
    function authSession($force=false){
        $session = new \App\User;
        if($force){
            $user = \Auth::user()->getRoleNames();
            \Session::put('auth_user',$user);
            $session = \Session::get('auth_user');
            return $session;
        }
        if(\Session::has('auth_user')){
            $session = \Session::get('auth_user');
        }else{
            $user = \Auth::user();
            \Session::put('auth_user',$user);
            $session = \Session::get('auth_user');
        }
        return $session;
    }

    function checkMenuRoleAndPermission($menu)
    {
        if (\Auth::check()) {
            if ($menu->data('role') == null && auth()->user()->hasRole('admin')) {
                return true;
            }

            if($menu->data('permission') == null && $menu->data('role') == null) {
                return true;
            }

            if($menu->data('role') != null) {
                if(auth()->user()->hasAnyRole(explode(',', $menu->data('role')))) {
                    return true;
                }
            }

            if($menu->data('permission') != null) {
                if(auth()->user()->can($menu->data('permission')) ) {
                    return true;
                }
            }
        }

        return false;
    }


    function checkRolePermission($role,$permission){
        try{
            if($role->hasPermissionTo($permission)){
                return true;
            }
            return false;
        }catch (Exception $e){
            return false;
        }
    }

    function getSingleMedia($model, $collection = 'image_icon',$skip=true)
    {
        if (!\Auth::check() && $skip) {
            return asset('assets/img/icons/user/user.png');
        }
        if ($model !== null) {
            $media = $model->getFirstMedia($collection);
        }
    
        $imgurl= isset($media)?$media->getPath():'';
    
        if (file_exists($imgurl)) {
            return $media->getFullUrl();
        }
        else
        {
            switch ($collection) {
                case 'image_icon':
                    $media = asset('assets/img/icons/user/user.png');
                    break;
                case 'profile_image':
                    $media = asset('assets/images/user/1.jpg');
                    break;
                default:
                    $media = asset('assets/img/icons/common/add.png');
                    break;
            }
            return $media;
        }
    }

    function settingSession($type='get'){
        if(\Session::get('setting_data') == ''){
            $type='set';
        }
        switch ($type){
            case "set" : 
                $settings = \App\AppSetting::first();
                \Session::put('setting_data',$settings);
                break;
            default : 
                break;
        }
        return \Session::get('setting_data');
    }

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function variableCssChange($type,$old_value,$new_value){
        $path = public_path('css/variable.css');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $type.': '.$old_value.';', $type.': '.$new_value.';', file_get_contents($path)
            ));
        }
    }

    function demoUserPermission(){
        if(\Auth::user()->hasRole('demo_admin')){
            return true;
        }else{
            return false;
        }
    }

    function envChanges($type,$value){
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $type.'='.env($type), $type.'='.$value, file_get_contents($path)
            ));
        }
    }

    function CheckRecordExist($table_list,$column_name,$id){
        $search_keyword = $column_name;
        if(count($table_list) > 0){
            foreach($table_list as $table){
                $check_data = \DB::table($table)->where($search_keyword,$id)->count();
                if($check_data > 0)
                {
                    return false ;
                }
            }
            return true;
        }
        else {
            return true;
        }
    }
?>