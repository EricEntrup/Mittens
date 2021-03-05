<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Dashboard 
$route['dashboard-1'] = 'DashboardController';
$route['dashboard-2'] = 'DashboardController/dashboardTwo';


//static app
$route['email-inbox'] = 'StaticAppController';
$route['email-compose'] = 'StaticAppController/composeEmail';
$route['todo-list'] = 'StaticAppController/todoList';
$route['chat'] = 'StaticAppController/chat';



//Permission Routes
$route['permission-list'] = 'Admin/PermissionController';
$route['permission-add'] = 'Admin/PermissionController/permission_add';
$route['permission-role'] = 'Admin/PermissionController/permissionRole';
//Role Routes
$route['role-list'] = 'Admin/PermissionController/role';
$route['role-add'] = 'Admin/PermissionController/add_role';
$route['role-status/(:any)/(:any)'] = 'Admin/PermissionController/changeRolestatus/status/id';

//User Routes
$route['user-list'] = 'UserController';
$route['user-add'] = 'UserController/add_user';
$route['user-save'] = 'UserController/save_user';
$route['user-edit'] = 'UserController/edit';
$route['user-update'] = 'UserController/update';
$route['user-delete'] = 'UserController/delete';

//Settings Routes
$route['setting']='Admin/SettingController';
$route['profile_update']='Admin/SettingController/profile_update';
$route['change-password']='Admin/SettingController/changePassword';


//Category Routes
$route['category-list'] = 'CategoryController';
$route['category-add'] = 'CategoryController/create';
$route['category-add/(:any)'] = 'CategoryController/create';
$route['category-store'] = 'CategoryController/store';
$route['category-update'] = 'CategoryController/update';
$route['status-change/(:any)/(:any)'] = 'CategoryController/updateStatus/status/id';
// $route['delete-category/(:any)'] = 'CategoryController/deleteCategory/id';


//Service Route

$route['service-list'] = 'ServiceController';
$route['service-add'] = 'ServiceController/create';
$route['service-add/(:any)'] = 'ServiceController/create';
$route['service-store'] = 'ServiceController/store';
$route['service-update'] = 'ServiceController/update';
$route['service-status-change/(:any)/(:any)'] = 'ServiceController/updateStatus/status/id';

//Appointment Route

$route['appointment-list'] = 'AppointmentController';
$route['appointment-add'] = 'AppointmentController/create';
$route['appointment-add/(:any)'] = 'AppointmentController/create';
$route['appointment-store'] = 'AppointmentController/store';
$route['appointment-update-data'] = 'AppointmentController/updateData';
$route['appointment-update'] = 'AppointmentController/update';
$route['appointment-view/(:any)'] ='AppointmentController/view/id';
$route['get-service'] = 'AppointmentController/get_sub_category';
// $route['delete-appointment/(:any)'] = 'AppointmentController/deleteAppoimtment/id';


//Project Management Routes

$route['project-list'] = 'ProjectController';
$route['board-add'] = 'ProjectController/create';
$route['board-store'] = 'ProjectController/store';
$route['board-update'] = 'ProjectController/update';
$route['task-update'] = 'ProjectTaskController/update';
$route['update-data'] = 'ProjectController/updateData';

$route['board-task-add'] = 'ProjectTaskController';
$route['task-save'] = 'ProjectTaskController/store';
$route['task-sequence-update'] = 'ProjectTaskController/updateSequence';

$route['delete-project/(:any)'] = 'ProjectController/deleteAppoimtment/id';

//Appoiment Booking Routes.

// Ecommerce Routes
$route['e-commerce'] = 'EcommerceController';
$route['e-commerce-product-details'] = 'EcommerceController/productDetails';
$route['e-commerce-checkout'] = 'EcommerceController/checkout';

//UI Components Routes

$route['ui-color'] = "UIElementsController";
$route['ui-typography'] = "UIElementsController/uiTypography";
$route['ui-alert'] = "UIElementsController/uiAlert";
$route['ui-badge'] = "UIElementsController/uiBadge";
$route['ui-breadcrumb'] = "UIElementsController/uiBreadcrumb";
$route['ui-button'] = "UIElementsController/uiButton";
$route['ui-card'] = "UIElementsController/uiCard";
$route['ui-carousel'] = "UIElementsController/uiCarousel";
$route['ui-video'] = "UIElementsController/uiVideo";
$route['ui-grid'] = "UIElementsController/uiGrid";
$route['ui-image'] = "UIElementsController/uiImages";
$route['ui-listgroup'] = "UIElementsController/uiListGroup";
$route['ui-media'] = "UIElementsController/uiMedia";
$route['ui-modal'] = "UIElementsController/uiModal";
$route['ui-notification'] = "UIElementsController/uiNotification";
$route['ui-pagination'] = "UIElementsController/uiPagination";
$route['ui-popover'] = "UIElementsController/uiPopover";
$route['ui-progressbar'] = "UIElementsController/uiProgressBar";
$route['ui-tab'] = "UIElementsController/uiTabs";
$route['ui-tooltip'] = "UIElementsController/uiTooltip";

//form elements
$route['form-layouts'] = "FormElementController";
$route['form-validation'] = "FormElementController/formValidation";
$route['form-switch'] = "FormElementController/formSwitch";
$route['form-checkbox'] = "FormElementController/formCheckbox";
$route['form-radio'] = "FormElementController/formLayout";

//form wizard
$route['form-simple-wizrard'] = "FormWizardController";
$route['form-validate-wizrard'] = "FormWizardController/validateWizard";
$route['form-vertical-wizard'] = "FormWizardController/verticalWizard";


//table
$route['basic-table'] = "TableController";
$route['data-table'] = "TableController/dataTable";
$route['edit-table'] = "TableController/editTable";


//chart
$route['morries-chart'] = "ChartController";
$route['high-chart'] = "ChartController/highChart";
$route['am-chart'] = "ChartController/amChart";
$route['apex-chart'] = "ChartController/apexChart";


//icon
$route['dripicons'] = "IconController";
$route['font-awesome'] = "IconController/fontAwesome";
$route['line-awesome'] = "IconController/lineAwesome";
$route['remixicon'] = "IconController/remixion";
$route['unicons'] = "IconController/unicons";


//authentication
$route['login'] = "AutheticationPageController";
$route['register'] = "AutheticationPageController/registrtion";
$route['recover-password'] = "AutheticationPageController/recoverPassword";
$route['confirm-mail'] = "AutheticationPageController/confirmMail";
$route['lock-screen'] = "AutheticationPageController/lockScreen";



//map

$route['google-map'] = "MapController";



//extra pages
$route['timeline'] = "ExtraPagesController";
$route['invoice'] = "ExtraPagesController/invoice";
$route['blank-page'] = "ExtraPagesController/blankPage";
$route['error-400'] = "ExtraPagesController/error400";
$route['error-500'] = "ExtraPagesController/error500";
$route['pricing'] = "ExtraPagesController/pricing";
$route['pricing-one'] = "ExtraPagesController/pricingOne";
$route['maintenance'] = "ExtraPagesController/maintenance";
$route['coming-soon'] = "ExtraPagesController/commingSoon";
$route['faq'] = "ExtraPagesController/faq";
