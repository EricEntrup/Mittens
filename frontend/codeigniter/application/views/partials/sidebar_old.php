<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="#">
            <img src="<?php echo base_url('assets/images/logo.gif')?>" class="img-fluid" alt="logo">
            <span>Metorik</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>

                <li class="active">
                    <a href="#" class="iq-waves-effect collapsed"><i class="ri-user-line"></i><span>Dashboard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="active"><a href="<?php echo base_url('index.php/dashboard-1') ?>">Dashboard 1</span></a></li>
                        <li><a href="<?php echo base_url('index.php/dashboard-2') ?>">Dashboard 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="iq-waves-effect"><i class="las la-envelope-open"></i><span>Email</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="mailbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li>
                            <a href="<?php echo base_url('index.php/email-inbox');?>" class="iq-waves-effect"></i><span>Inbox</span></a>
                        </li>
                        <li>
                             <a href="<?php echo base_url('index.php/email-compose');?>" class="iq-waves-effect"></i><span>Email Compose</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/todo-list');?>" class="iq-waves-effect"><i class="las la-check-square"></i><span>Todo</span></a>
                </li>
                <li>
                        <a href="<?php echo base_url('index.php/chat');?>" class="iq-waves-effect"><i class="las la-sms"></i><span>Chat</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/project-list');?>" class="iq-waves-effect"><i class="ri-pages-line"></i><span>Project Management</span></a>
                </li>
                <li>
                    <a href="#" class="iq-waves-effect"><i class="ri-list-check"></i><span>Booking</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu">
                        <li><a href="<?php echo base_url('index.php/category-list');?>">Category List</a></li>
                        <li><a href="<?php echo base_url('index.php/service-list');?>">Service List</a></li>
                        <li><a href="<?php echo base_url('index.php/appointment-list');?>">Appointment List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="iq-waves-effect"><i class="las la-users-cog"></i><span>User CRUD</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu">
                        <li><a href="<?php echo base_url('index.php/user-list');?>">User List</a></li>
                        <li><a href="<?php echo base_url('index.php/user-add');?>" >User Add</a></li>
                    </ul>
                </li>
                <li>
                     <a href="#" class="iq-waves-effect"><i class="ri-shopping-cart-line"></i><span>E-commerce</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul class="iq-submenu">
                        <li><a href="<?php echo base_url('index.php/e-commerce');?>">Product Listing</a></li>
                        <li><a href="<?php echo base_url('index.php/e-commerce-product-details');?>">Product Details</a></li>
                        <li><a href="<?php echo base_url('index.php/e-commerce-checkout');?>">Checkout</a></li>
                     </ul>
                </li>
            
                <li>
                    <a href="#" class="iq-waves-effect"><i class="las la-users-cog"></i><span>Account Setting</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu">
                        <li><a href="<?php echo base_url('index.php/role-list');?>">Roles</a></li>
                        <li><a href="<?php echo base_url('index.php/permission-list');?>" >Permissions</a></li>
                    </ul>
                </li>
             
                <li>
                    <a href="#" class="iq-waves-effect"><i class="ri-user-settings-line"></i><span>User Setting</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul class="iq-submenu">
                        <li><a href="<?php echo base_url('index.php/setting');?>">Settings</a></li>
                    </ul>
                </li>
              
              <!-- Components !-->
                <li class="iq-menu-title"><i class="ri-separator"></i><span>Components</span></li>
                  <li>
                     <a href="#" class="iq-waves-effect"><i class="ri-pencil-ruler-line"></i><span>UI Component</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                     <ul class="iq-submenu">
                        <li><a href="<?php echo base_url('index.php/ui-color');?>">colors</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-typography');?>">Typography</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-alert');?>">Alerts</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-badge');?>">Badges</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-breadcrumb');?>">Breadcrumb</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-button');?>">Buttons</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-card');?>">Cards</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-carousel');?>">Carousel</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-video');?>">Video</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-grid');?>">Grid</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-image');?>">Images</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-listgroup');?>">list Group</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-media');?>">Media</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-modal');?>">Modal</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-notification');?>">Notifications</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-pagination');?>">Pagination</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-popover');?>">Popovers</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-progressbar');?>">Progressbars</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-tab');?>">Tabs</a></li>
                        <li><a href="<?php echo base_url('index.php/ui-tooltip');?>">Tooltips</a></li>
                     </ul>
                  </li>
                  <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-profile-line"></i><span>Forms</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href=<?php echo base_url('index.php/form-layouts');?>>Form Elements</a></li>
                           <li><a href=<?php echo base_url('index.php/form-validation');?>>Form Validation</a></li>
                           <li><a href=<?php echo base_url('index.php/form-switch');?>>Form Switch</a></li>
                           <li><a href=<?php echo base_url('index.php/form-checkbox');?>>Form Checkbox</a></li>
                           <li><a href=<?php echo base_url('index.php/form-radio');?>>Form Radio</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-archive-drawer-line"></i><span>Forms Wizard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href="<?php echo base_url('index.php/form-simple-wizrard');?>">Simple Wizard</a></li>
                           <li><a href="<?php echo base_url('index.php/form-validate-wizrard');?>">Validate Wizard</a></li>
                           <li><a href="<?php echo base_url('index.php/form-vertical-wizard');?>">Vertical Wizard</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-table-line"></i><span>Table</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href="<?php echo base_url('index.php/basic-table');?>">Basic Tables</a></li>
                           <li><a href="<?php echo base_url('index.php/data-table');?>">Data Table</a></li>
                           <li><a href="<?php echo base_url('index.php/edit-table');?>">Editable Table</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-pie-chart-box-line"></i><span>Charts</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href="<?php echo base_url('index.php/morries-chart');?>">Morris Chart</a></li>
                           <li><a href="<?php echo base_url('index.php/high-chart');?>">High Charts</a></li>
                           <li><a href="<?php echo base_url('index.php/am-chart');?>">Am Charts</a></li>
                           <li><a href="<?php echo base_url('index.php/apex-chart');?>">Apex Chart</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-list-check"></i><span>Icons</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href="<?php echo base_url('index.php/dripicons');?>">Dripicons</a></li>
                           <li><a href="<?php echo base_url('index.php/font-awesome');?>">Font Awesome 5</a></li>
                           <li><a href="<?php echo base_url('index.php/line-awesome');?>">line Awesome</a></li>
                           <li><a href="<?php echo base_url('index.php/remixicon');?>">Remixicon</a></li>
                           <li><a href="<?php echo base_url('index.php/unicons');?>">unicons</a></li>
                        </ul>
                     </li>
                     <li class="iq-menu-title"><i class="ri-separator"></i><span>Pages</span></li>
                     <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-pages-line"></i><span>Authentication</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href="<?php echo base_url('index.php/login');?>">Login</a></li>
                           <li><a href="<?php echo base_url('index.php/register');?>">Register</a></li>
                           <li><a href="<?php echo base_url('index.php/recover-password');?>">Recover Password</a></li>
                           <li><a href="<?php echo base_url('index.php/confirm-mail');?>">Confirm Mail</a></li>
                           <li><a href="<?php echo base_url('index.php/lock-screen');?>">Lock Screen</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-map-pin-user-line"></i><span>Maps</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href="<?php echo base_url('index.php/google-map');?>">Google Map</a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="iq-waves-effect"><i class="ri-pantone-line"></i><span>Extra Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul class="iq-submenu">
                           <li><a href="<?php echo base_url('index.php/timeline');?>">Timeline</a></li>
                           <li><a href="<?php echo base_url('index.php/invoice');?>">Invoice</a></li>
                           <li><a href="<?php echo base_url('index.php/blank-page');?>">Blank Page</a></li>
                           <li><a href="<?php echo base_url('index.php/error-400');?>">Error 404</a></li>
                           <li><a href="<?php echo base_url('index.php/error-500');?>">Error 500</a></li>
                           <li><a href="<?php echo base_url('index.php/pricing');?>">Pricing</a></li>
                           <li><a href="<?php echo base_url('index.php/pricing-one');?>">Pricing 1</a></li>
                           <li><a href="<?php echo base_url('index.php/maintenance');?>">Maintenance</a></li>
                           <li><a href="<?php echo base_url('index.php/coming-soon');?>">Coming Soon</a></li>
                           <li><a href="<?php echo base_url('index.php/faq');?>">Faq</a></li>
                        </ul>
                     </li>

              <!-- Components !-->
           
            
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
