<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('home') }}">
            <img src="{{ getSingleMedia(settingSession('get'),'site_logo',null) }}" class="img-fluid site_logo" alt="site_logo">
            <span>{{ config('app.name', 'Metorik') }}</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
        <?php
            $auth_user = authSession();
            $url = '';
        ?>
        @php
            $MyNavBar = \Menu::make('MenuList', function ($menu) use ($url){
                
                $menu->raw('Main', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');

                $menu->add('<span>'.trans('messages.dashboard').'</span>', ['class' => ''])
                    ->prepend('<i class="las la-home"></i>')
                    ->nickname('dashboard')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#dashboard');
                    $menu->dashboard->add('<span>'.trans('messages.dashboard_no',['No' => 1]).'</span>', ['route' => 'dashboard-1'] )
                        ->active('dashboard-1/*')
                        ->link->attr(['class' => '']);

                    $menu->dashboard->add('<span>'.trans('messages.dashboard_no',['No' => 2]).'</span>', ['route' => 'dashboard-2'])
                        ->link->attr(['class' => 'nav-link']);

                $menu->raw('Workable App', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');

                $menu->add('<span>'.trans('messages.booking').'</span>', ['class' => ''])
                    ->prepend('<i class="las la-calendar"></i>')
                    ->nickname('booking')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#booking');

                    $menu->booking->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.category') ]).'</span>', ['route' => 'category.index'])
                        ->active('category/*')
                        ->link->attr(['class' => '']);

                    $menu->booking->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.service') ]).'</span>', ['route' => 'service.index' ])
                        ->active('service/*')
                        ->link->attr(['class' => '']);

                    $menu->booking->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.appointment') ]).'</span>', ['route' => 'appointment.index' ])
                        ->active('appointment/*')
                        ->link->attr(['class' => '']);
                
                $menu->add('<span>'.trans('messages.project_management').'</span>', ['class' => '','route' => 'board.index'])
                    ->prepend('<i class="las la-tasks"></i>')
                    ->link->attr(['class' => 'iq-waves-effect']);

                $menu->add('<span>'.trans('messages.user_crud').'</span>', ['class' => ''])
                    ->prepend('<i class="las la-user-tie"></i>')
                    ->nickname('user_crud')
                    ->data('permission', 'user list')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#user_crud');
        
                    $menu->user_crud->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.user')]).'</span>', ['route' => 'users.index'])
                        ->active('users/*')
                        ->data('permission', 'user list')
                        ->link->attr(['class' => '']);

                    $menu->user_crud->add('<span>'.trans('messages.add_form_title',['form' => trans('messages.user')]).'</span>', ['route' => 'users.create'])
                        ->active('users/*')
                        ->data('permission', 'user add')
                        ->link->attr(['class' => '']);
                
                $menu->add('<span>'.trans('messages.account_setting').'</span>', ['class' => ''])
                    ->prepend('<i class="las la-users-cog"></i>')
                    ->nickname('account_setting')
                    ->data('permission', 'role list')
                    ->data('permission', 'permission list')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#account_setting');

                    $menu->account_setting->add('<span>'.trans('messages.role').'</span>', ['route' => 'role.index'])
                        ->active('role/*')
                        ->data('permission', 'role list')
                        ->link->attr(['class' => '']);

                    $menu->account_setting->add('<span>'.trans('messages.permission').'</span>', ['route' => 'permission.index' ])
                        ->active('permission/*')
                        ->data('permission', 'permission list') 
                        ->link->attr(['class' => '']);

                $menu->add('<span>'.trans('messages.app_setting').'</span>', ['class' => ''])
                    ->prepend('<i class="las la-cog"></i>')
                    ->nickname('app_setting')
                    ->data('role','admin', 'demo_admin')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#app_setting');

                    $menu->app_setting->add('<span>App Configuration</span>', ['route' => [ 'admin.settings','page' => 'general-setting' ] ])
                        ->active('settings/general-setting/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->app_setting->add('<span>Email Configuration</span>', ['route' => [ 'admin.settings','page' => 'mail-setting'] ])
                        ->active('settings/mail-setting/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->app_setting->add('<span>Social Configuration</span>', ['route' => [ 'admin.settings', 'page' => 'social'] ])
                        ->active('settings/social/*')
                        ->link->attr(['class' => '']);
                
                $menu->add('<span>'.trans('messages.user_setting').'</span>', ['class' => ''])
                    ->prepend('<i class="las la-user-cog"></i>')
                    ->nickname('user_setting')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#user_setting');
        
                    $menu->user_setting->add('<span>Profile</span>', ['route' => [ 'admin.settings','page' => 'profile_form'] ])
                        ->active('settings/profile_form/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->user_setting->add('<span>Change Password</span>', ['route' => [ 'admin.settings', 'page' => 'password_form'] ])
                        ->active('settings/password_form/*')
                        ->link->attr(['class' => '']);
            
                
                $menu->raw('Static App', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');
                
                $menu->add('<span>Email</span>', ['class' => ''])
                    ->prepend('<i class="las la-envelope-open"></i>')
                    ->nickname('email')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#email');
        
                    $menu->email->add('<span>Inbox</span>', ['route' => 'mail'])
                        ->active('mail/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->email->add('<span>Email Compose</span>', ['route' => 'compose-mail' ])
                        ->active('compose-mail/*')
                        ->link->attr(['class' => '']);

                $menu->add('<span>Todo</span>', ['class' => '','route' => 'todo.index'])
                    ->prepend('<i class="las la-check-square"></i>')
                    ->link->attr(['class' => 'iq-waves-effect']);
                
                $menu->add('<span>Chat</span>', ['class' => '','route' => 'chat.index'])
                    ->prepend('<i class="las la-sms"></i>')
                    ->link->attr(['class' => 'iq-waves-effect']);

                $menu->add('<span>E-Commerce</span>', ['class' => ''])
                    ->prepend('<i class="las la-envelope-open"></i>')
                    ->nickname('ecommerce')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#ecommerce');
        
                    $menu->ecommerce->add('<span>Product Listing</span>', ['route' => 'e-commerce'])
                        ->active('e-commerce/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ecommerce->add('<span>Product Details</span>', ['route' => 'productDetail' ])
                        ->active('e-commerce/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ecommerce->add('<span>Checkout</span>', ['route' => 'checkout' ])
                        ->active('e-commerce/*')
                        ->link->attr(['class' => '']);
                

                $menu->raw('Components', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');

                $menu->add('<span>UI Elements</span>', ['class' => ''])
                    ->prepend('<i class="lab la-elementor"></i>')
                    ->nickname('ui_elements')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#ui_elements');
        
                    $menu->ui_elements->add('<span>Colors</span>', ['route' => 'ui-color'])
                        ->active('ui-color/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Typography</span>', ['route' => 'ui-typography'])
                        ->active('ui-typography/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Alerts</span>', ['route' => 'ui-alert'])
                        ->active('ui-alert/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Badges</span>', ['route' => 'ui-badges'])
                        ->active('ui-badges/*')
                        ->link->attr(['class' => '']);
                
                    $menu->ui_elements->add('<span>Breadcrumb</span>', ['route' => 'ui-breadcrumb'])
                        ->active('ui-breadcrumb/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Buttons</span>', ['route' => 'ui-button'])
                        ->active('ui-button/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Cards</span>', ['route' => 'ui-card'])
                        ->active('ui-card/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->ui_elements->add('<span>Carousel</span>', ['route' => 'ui-carousel'])
                        ->active('ui-carousel/*')
                        ->link->attr(['class' => '']);
                        
                    $menu->ui_elements->add('<span>Video</span>', ['route' => 'ui-video'])
                        ->active('ui-video/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Grid</span>', ['route' => 'ui-grid'])
                        ->active('ui-grid/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Images</span>', ['route' => 'ui-images'])
                        ->active('ui-images/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Group</span>', ['route' => 'ui-listgroup'])
                        ->active('ui-listgroup/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Media</span>', ['route' => 'ui-media'])
                        ->active('ui-media/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Modal</span>', ['route' => 'ui-modal'])
                        ->active('ui-modal/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Notifications</span>', ['route' => 'ui-notifications'])
                        ->active('ui-notifications/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Pagination</span>', ['route' => 'ui-pagination'])
                        ->active('ui-pagination/*')
                        ->link->attr(['class' => '']);
                        
                    $menu->ui_elements->add('<span>Popovers</span>', ['route' => 'ui-popovers'])
                        ->active('ui-popovers/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Progressbars</span>', ['route' => 'ui-progressbars'])
                        ->active('ui-progressbars/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Tabs</span>', ['route' => 'ui-tabs'])
                        ->active('ui-tabs/*')
                        ->link->attr(['class' => '']);

                    $menu->ui_elements->add('<span>Tooltips</span>', ['route' => 'ui-tooltips'])
                        ->active('ui-tooltips/*')
                        ->link->attr(['class' => '']);
            
                $menu->add('<span>Forms</span>', ['class' => ''])
                    ->prepend('<i class="las la-file-alt"></i>')
                    ->nickname('forms')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#forms');
        
                    $menu->forms->add('<span>Form Elements</span>', ['route' => 'form-layout'])
                        ->active('form-layout/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms->add('<span>Form Validation</span>', ['route' => 'form-validation'])
                        ->active('form-validation/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms->add('<span>Form Switch</span>', ['route' => 'form-switch'])
                        ->active('form-switch/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms->add('<span>Form Checkbox</span>', ['route' => 'form-chechbox'])
                        ->active('form-chechbox/*')
                        ->link->attr(['class' => '']);
                
                    $menu->forms->add('<span>Form Radio</span>', ['route' => 'form-radio'])
                        ->active('form-radio/*')
                        ->link->attr(['class' => '']);
    
                $menu->add('<span>Forms Wizard</span>', ['class' => ''])
                    ->prepend('<i class="las la-database"></i>')
                    ->nickname('forms_wizard')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#forms_wizard');
        
                    $menu->forms_wizard->add('<span>Simple Wizard</span>', ['route' => 'form-wizard'])
                        ->active('form-wizard/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms_wizard->add('<span>Validate Wizard</span>', ['route' => 'validate-wizard'])
                        ->active('validate-wizard/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->forms_wizard->add('<span>Vertical Wizard</span>', ['route' => 'vertical-wizard'])
                        ->active('vertical-wizard/*')
                        ->link->attr(['class' => '']);
                
                $menu->add('<span>Charts</span>', ['class' => ''])
                    ->prepend('<i class="las la-chart-bar"></i>')
                    ->nickname('charts')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#charts');
        
                    $menu->charts->add('<span>Morris Chart</span>', ['route' => 'chart-morris'])
                        ->active('chart-morris/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->charts->add('<span>High Charts</span>', ['route' => 'chart-high'])
                        ->active('chart-high/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->charts->add('<span>Am Charts</span>', ['route' => 'chart-am'])
                        ->active('chart-am/*')
                        ->link->attr(['class' => '']);

                    $menu->charts->add('<span>Apex Chart</span>', ['route' => 'chart-apex'])
                        ->active('chart-apex/*')
                        ->link->attr(['class' => '']);

                $menu->add('<span>Icons</span>', ['class' => ''])
                    ->prepend('<i class="las la-icons"></i>')
                    ->nickname('icons')
                    ->link->attr(["class" => "nav-link iq-waves-effect"])
                    ->href('#icons');
        
                    $menu->icons->add('<span>Dripicons</span>', ['route' => 'icon-dripicons'])
                        ->active('icon-dripicons/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->icons->add('<span>Font Awesome</span>', ['route' => 'icon-fontawesome'])
                        ->active('icon-fontawesome/*')
                        ->link->attr(['class' => '']);
                    
                    $menu->icons->add('<span>Line Awesome</span>', ['route' => 'icon-lineawesome'])
                        ->active('icon-lineawesome/*')
                        ->link->attr(['class' => '']);

                    $menu->icons->add('<span>Remixicon</span>', ['route' => 'icon-remixicon'])
                        ->active('icon-remixicon/*')
                        ->link->attr(['class' => '']);

                    $menu->icons->add('<span>Unicons</span>', ['route' => 'icon-unicons'])
                        ->active('icon-unicons/*')
                        ->link->attr(['class' => '']);
                
                $menu->raw('Pages', ['class' => 'iq-menu-title'])->prepend('<i class="ri-separator"></i>');
                    
                    $menu->add('<span>Maps</span>', ['class' => ''])
                        ->prepend('<i class="las la-map-marker"></i>')
                        ->nickname('maps')
                        ->link->attr(["class" => "nav-link iq-waves-effect"])
                        ->href('#maps');
            
                        $menu->maps->add('<span>Google Map</span>', ['route' => 'google-map'])
                            ->active('google-map/*')
                            ->link->attr(['class' => '']);

                    $menu->add('<span>Extra Pages</span>', ['class' => ''])
                        ->prepend('<i class="lab la-codepen"></i>')
                        ->nickname('extrapages')
                        ->link->attr(["class" => "nav-link iq-waves-effect"])
                        ->href('#extrapages');
            
                        $menu->extrapages->add('<span>Timeline</span>', ['route' => 'timeline'])
                            ->active('timeline/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Invoice</span>', ['route' => 'invoice'])
                            ->active('invoice/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Blank Pages</span>', ['route' => 'blank-pages'])
                            ->active('blank-pages/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->extrapages->add('<span>Error 404</span>', ['route' => 'error-404'])
                            ->active('error-404/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Error 500</span>', ['route' => 'error-500'])
                            ->active('error-500/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->extrapages->add('<span>Pricing</span>', ['route' => 'pricing'])
                            ->active('pricing/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Pricing 1</span>', ['route' => 'pricing-one'])
                            ->active('pricing-one/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Maintenance</span>', ['route' => 'maintenance'])
                            ->active('maintenance/*')
                            ->link->attr(['class' => '']);

                        $menu->extrapages->add('<span>Coming Soon</span>', ['route' => 'comingsoon'])
                            ->active('comingsoon/*')
                            ->link->attr(['class' => '']);
                        
                        $menu->extrapages->add('<span>Faq</span>', ['route' => 'faq'])
                            ->active('faq/*')
                            ->link->attr(['class' => '']);

            })->filter(function ($item) {
                return checkMenuRoleAndPermission($item);
            });
        @endphp


    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                @include(config('laravel-menu.views.bootstrap-items'), ['items' => $MyNavBar->roots()])
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
