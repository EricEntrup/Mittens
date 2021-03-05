<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/ajax-list','HomeController@getAjaxList')->name('ajax-list');

//Social Routes
Route::get('/social/login/{provider}', 'Auth\SocialLoginController@providerRedirect')->name('social.login');
Route::get('/social/login/callback/{provider}', 'Auth\SocialLoginController@providerRedirectCallback')->name('social.loginCallback');

Route::group(['middleware' => ['auth', 'verified']], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    //Dashboard Routes

    Route::get('/', 'DashboardController@index')->name('dashboard-1');
    Route::get('/dashboard-2', 'DashboardController@index2')->name('dashboard-2');
    Route::get('changeStatus', 'HomeController@changeStatus')->name('changeStatus');
    Route::group(['namespace' => 'Admin' ], function () {
        Route::resource('permission','PermissionController');
        Route::get('permission/add/{type}','PermissionController@addPermission')->name('permission.add');
        Route::post('permission/save','PermissionController@savePermission')->name('permission.save');

        Route::resource('role','RoleController');
    });

    Route::resource('users','UserController');
    Route::get('users/edit/{id}','UserController@create')->name('users.edit');
    Route::get('users/view/{id}','UserController@show')->name('users.view');
    Route::get('users/delete/{id}','UserController@destroy')->name('users.delete');

    Route::resource('category','CategoryController');
    Route::get('category/edit/{id}','CategoryController@create')->name('category.edit');
    Route::get('category/view/{id}','CategoryController@show')->name('category.view');
    Route::get('category/delete/{id}','CategoryController@destroy')->name('category.delete');

    Route::resource('service','ServiceController');
    Route::get('service/edit/{id}','ServiceController@create')->name('service.edit');
    Route::get('service/view/{id}','ServiceController@show')->name('service.view');
    Route::get('service/delete/{id}','ServiceController@destroy')->name('service.delete');

    Route::resource('appointment','AppointmentController');
    Route::get('appointment/edit/{id}','AppointmentController@create')->name('appointment.edit');
    Route::get('appointment/view/{id}','AppointmentController@show')->name('appointment.view');
    Route::get('appointment/delete/{id}','AppointmentController@destroy')->name('appointment.delete');
    Route::post('appointment/update','AppointmentController@update')->name('appointment.update');

    Route::get('settings/{page?}', 'SettingController@settings')->name('admin.settings');
    Route::post('/layout-page', 'SettingController@layoutPage')->name('layout_page');
    Route::post('settings/save', 'SettingController@settingsUpdates')->name('settingsUpdates');
    Route::post('contact-us', 'SettingController@contactus_settings')->name('contactus_settings');
    Route::post('env-setting', 'SettingController@envSetting')->name('envSetting');

    Route::get('theme-settings','ThemeSettingController@index')->name('admin.theme.setting');
    Route::post('/theme-page', 'ThemeSettingController@themePage')->name('theme_page');
    Route::post('/theme-setting-store', 'ThemeSettingController@themeSettingStore')->name('theme_setting_store');
    Route::post('/theme-color-store', 'ThemeSettingController@themeColorStore')->name('theme_color_store');

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {

        Route::get('/profile', 'UserController@updateProfile')->name('user.profile');
        Route::post('/profile/save', 'UserController@updateUpdate')->name('user.update');
        // Route::get('/change/password', 'UserController@changePassword')->name('user.change-password');
        Route::post('/password/upadte', 'UserController@passwordUpadte')->name('user.password.update');

    });
    Route::get('e-commerce','EcommerceController@index')->name('e-commerce');
    Route::get('e-commerce/wish-list','EcommerceController@wishList')->name('wish.list');
    Route::get('e-commerce/checkout','EcommerceController@checkOut')->name('checkout');
    Route::get('e-commerce/product-detail','EcommerceController@productDetail')->name('productDetail');
  
    Route::resource('board','BoardController');
    Route::get('board/edit/{id}','BoardController@create')->name('board.edit');
    Route::get('board/view/{id}','BoardController@show')->name('board.view');
    Route::get('board/delete/{id}','BoardController@destroy')->name('board.delete');

    Route::resource('boardtask','BoardTaskController');
    Route::get('boardtask/edit/{id}','BoardTaskController@create')->name('boardtask.edit');
    Route::get('boardtask/delete/{id}','BoardTaskController@destroy')->name('boardtask.delete');
    Route::post('boardtask/update','BoardTaskController@update')->name('boardtask.update');

    Route::get('board-reorder','BoardController@sequenceGet')->name('board.reorder.get');
    Route::post('board-reorder-save','BoardController@sequenceSave')->name('board.reorder.save');

    //Mail

    Route::get('/mail', 'MailController@mail')->name('mail');
    Route::get('/compose-mail', 'MailController@composeMail')->name('compose-mail');

    //Todo 
    Route::get('/todo', 'TodoController@index')->name('todo.index');

    //Todo 
    Route::get('/chat', 'ChatController@index')->name('chat.index');

    //UI elements
    Route::get('/ui-color', 'UIElementController@color')->name('ui-color');
    Route::get('/ui-typography', 'UIElementController@typography')->name('ui-typography');
    Route::get('/ui-alert', 'UIElementController@alert')->name('ui-alert');
    Route::get('/ui-badges', 'UIElementController@badges')->name('ui-badges');
    Route::get('/ui-breadcrumb', 'UIElementController@breadCrumb')->name('ui-breadcrumb');
    Route::get('/ui-button', 'UIElementController@button')->name('ui-button');
    Route::get('/ui-card', 'UIElementController@card')->name('ui-card');
    Route::get('/ui-carousel', 'UIElementController@carousel')->name('ui-carousel');
    Route::get('/ui-video', 'UIElementController@video')->name('ui-video');
    Route::get('/ui-grid', 'UIElementController@grid')->name('ui-grid');
    Route::get('/ui-images', 'UIElementController@images')->name('ui-images');
    Route::get('/ui-listgroup', 'UIElementController@listGroup')->name('ui-listgroup');
    Route::get('/ui-media', 'UIElementController@medai')->name('ui-media');
    Route::get('/ui-modal', 'UIElementController@modal')->name('ui-modal');
    Route::get('/ui-notifications', 'UIElementController@notifications')->name('ui-notifications');
    Route::get('/ui-pagination', 'UIElementController@pagination')->name('ui-pagination');
    Route::get('/ui-popovers', 'UIElementController@popovers')->name('ui-popovers');
    Route::get('/ui-progressbars', 'UIElementController@progressbars')->name('ui-progressbars');
    Route::get('/ui-tabs', 'UIElementController@tabs')->name('ui-tabs');
    Route::get('/ui-tooltips', 'UIElementController@tooltips')->name('ui-tooltips');

    //Form elements
    Route::get('/form-layout', 'FormElementController@formLayout')->name('form-layout');
    Route::get('/form-validation', 'FormElementController@formValidation')->name('form-validation');
    Route::get('/form-switch', 'FormElementController@formSwitch')->name('form-switch');
    Route::get('/form-chechbox', 'FormElementController@formChechbox')->name('form-chechbox');
    Route::get('/form-radio', 'FormElementController@formRadio')->name('form-radio');
    Route::get('/form-wizard', 'FormElementController@formWizard')->name('form-wizard');
    Route::get('/validate-wizard', 'FormElementController@formValidateWizard')->name('validate-wizard');
    Route::get('/vertical-wizard', 'FormElementController@formVerticalWizard')->name('vertical-wizard');
    //Chart
    Route::get('/chart-morris', 'ChartController@chartMorris')->name('chart-morris');
    Route::get('/chart-high', 'ChartController@chartHigh')->name('chart-high');
    Route::get('/chart-am', 'ChartController@chartAm')->name('chart-am');
    Route::get('/chart-apex', 'ChartController@chartApex')->name('chart-apex');

    //Icon
    Route::get('/icon-dripicons', 'IconController@dripicons')->name('icon-dripicons');
    Route::get('/icon-fontawesome', 'IconController@fontAwesome')->name('icon-fontawesome');
    Route::get('/icon-lineawesome', 'IconController@lineAwesome')->name('icon-lineawesome');
    Route::get('/icon-remixicon', 'IconController@remixicon')->name('icon-remixicon');
    Route::get('/icon-unicons', 'IconController@unicons')->name('icon-unicons');

    //ExtraPages

    Route::get('/timeline', 'ExtraPagesController@timeline')->name('timeline');
    Route::get('/invoice', 'ExtraPagesController@invoice')->name('invoice');
    Route::get('/blank-pages', 'ExtraPagesController@blankPages')->name('blank-pages');
    Route::get('/error-404', 'ExtraPagesController@error404')->name('error-404');
    Route::get('/error-500', 'ExtraPagesController@error500')->name('error-500');
    Route::get('/pricing', 'ExtraPagesController@pricing')->name('pricing');
    Route::get('/pricing-one', 'ExtraPagesController@pricingOne')->name('pricing-one');
    Route::get('/maintenance', 'ExtraPagesController@maintenance')->name('maintenance');
    Route::get('/comingsoon', 'ExtraPagesController@commingSoon')->name('comingsoon');
    Route::get('/faq', 'ExtraPagesController@faq')->name('faq');

    //Map
    Route::get('/google-map', 'MapController@googleMap')->name('google-map');
});
