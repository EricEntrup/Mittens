var express = require('express');
var router = express.Router();

const mountRegisterRoutes = require('../features/register/routes');
const mountLoginRoutes = require('../features/login/routes');
const mountLogoutRoutes = require('../features/logout/routes');
const mountResetPasswordRoutes = require('../features/reset-password/routes');

/* GET home page. */
// router.get('/', function(req, res, next) {
//   res.redirect('/home-1');
// });

function isAuthenticated(req, res, next) {
  if (req.user && req.isAuthenticated()) {
    return next();
  }

  return res.redirect('/login');
}

// Dashboards
router.get('/', isAuthenticated , (req, res, next) => { res.render('Dashboards/Dashboard1', { title: 'Home-1' }); });
router.get('/home-2', isAuthenticated, (req, res, next) => { res.render('Dashboards/Dashboard2', { title: 'Home-2' }); });
// E-commerce Pages
router.get('/e-commerce-product-list', (req, res, next) => { res.render('Apps/Ecommerce/Index', { title: 'Product Listing' }); });
router.get('/e-commerce-product-detail', (req, res, next) => { res.render('Apps/Ecommerce/Detail', { title: 'Product Detail' }); });
router.get('/e-commerce-checkout', (req, res, next) => { res.render('Apps/Ecommerce/Checkout', { title: 'Checkout' }); });
// Ui Elements
router.get('/ui-alerts', (req, res, next) => { res.render('Core/UiAlerts', { title: 'Ui Alert' }); });
router.get('/ui-badges', (req, res, next) => { res.render('Core/UiBadges', { title: 'Ui Badges' }); });
router.get('/ui-breadcrumb', (req, res, next) => { res.render('Core/UiBreadcrumbs', { title: 'Ui Breadcrumbs' }); });
router.get('/ui-Buttons', (req, res, next) => { res.render('Core/UiButtons', { title: 'Ui Buttons' }); });
router.get('/ui-cards', (req, res, next) => { res.render('Core/UiCards', { title: 'Ui Cards' }); });
router.get('/ui-carousel', (req, res, next) => { res.render('Core/UiCarousel', { title: 'Ui Carousel' }); });
router.get('/ui-Colors', (req, res, next) => { res.render('Core/UiColors', { title: 'Ui Colors' }); });
router.get('/ui-dropdowns', (req, res, next) => { res.render('Core/UiDropdowns', { title: 'Ui dropdowns' }); });
router.get('/ui-Grid', (req, res, next) => { res.render('Core/UiGrid', { title: 'Ui Grid' }); });
router.get('/ui-images', (req, res, next) => { res.render('Core/UiImages', { title: 'Ui Images' }); });
router.get('/ui-List-group', (req, res, next) => { res.render('Core/UiListGroup', { title: 'Ui List-group' }); });
router.get('/ui-Media-object', (req, res, next) => { res.render('Core/UiMediaObject', { title: 'Ui Media-object' }); });
router.get('/ui-Modal', (req, res, next) => { res.render('Core/UiModal', { title: 'Ui Modal' }); });
router.get('/ui-Notifications', (req, res, next) => { res.render('Core/UiNotifications', { title: 'Ui Notifications' }); });
router.get('/ui-Pagination', (req, res, next) => { res.render('Core/UiPagination', { title: 'Ui Pagination' }); });
router.get('/ui-Popovers', (req, res, next) => { res.render('Core/UiPopovers', { title: 'Ui Popovers' }); });
router.get('/ui-Progressbars', (req, res, next) => { res.render('Core/UiProgressbars', { title: 'Ui Progressbars' }); });
router.get('/ui-Tabs', (req, res, next) => { res.render('Core/UiTabs', { title: 'Ui Tabs' }); });
router.get('/ui-Tooltips', (req, res, next) => { res.render('Core/UiTooltips', { title: 'Ui Tooltips' }); });
router.get('/ui-Typography', (req, res, next) => { res.render('Core/UiTypography', { title: 'Ui Typography' }); });
router.get('/ui-Embed-video', (req, res, next) => { res.render('Core/UiEmbedVideo', { title: 'Ui Embed-video' }); });

// Chat
router.get('/chat', (req, res, next) => { res.render('Apps/Chat/Index', { title: 'Chat' }); });

// Email
router.get('/email', (req, res, next) => { res.render('Apps/Email/Index', { title: 'Email' }); });
router.get('/email-compose', (req, res, next) => { res.render('Apps/Email/Compose', { title: 'Email Compose' }); });

// Todo
router.get('/todo', (req, res, next) => { res.render('Apps/Todo/ProjectList', { title: 'Todo' }); });

// User
router.get('/profile', (req, res, next) => { res.render('Apps/User/Profile', { title: 'User Profile' }); });
router.get('/profile-edit', (req, res, next) => { res.render('Apps/User/ProfileEdit', { title: 'User Edit' }); });
router.get('/add-user', (req, res, next) => { res.render('Apps/User/AddUser', { title: 'User Add' }); });
router.get('/user-list', (req, res, next) => { res.render('Apps/User/UserList', { title: 'User List' }); });

// Calendar
router.get('/calendar', (req, res, next) => { res.render('Apps/Calendar/Index', { title: 'Calendar' }); });
// Form
router.get('/form-layout', (req, res, next) => { res.render('Forms/FormLayout', { title: 'Form Layout' }); });
router.get('/form-validation', (req, res, next) => { res.render('Forms/FormValidation', { title: 'Form Validation' }); });
router.get('/form-switch', (req, res, next) => { res.render('Forms/FormSwitches', { title: 'Form Switch' }); });
router.get('/form-checkbox', (req, res, next) => { res.render('Forms/FormCheckboxes', { title: 'Form Checkbox' }); });
router.get('/form-radio', (req, res, next) => { res.render('Forms/FormRadios', { title: 'Form Radio' }); });

// Form Wizard
router.get('/form-wizard', (req, res, next) => { res.render('FormWizard/FormWizard', { title: 'Simple Wizard' }); });
router.get('/form-wizard-validate', (req, res, next) => { res.render('FormWizard/FormWizardValidate', { title: 'Validate Wizard' }); });
router.get('/form-wizard-vertical', (req, res, next) => { res.render('FormWizard/FormWizardVertical', { title: 'Vertical Wizard' }); });

// Table
router.get('/tables-basic', (req, res, next) => { res.render('Tables/TableBasic', { title: 'Basic Tables' }); });
router.get('/data-table', (req, res, next) => { res.render('Tables/DataTable', { title: 'Data Table' }); });
router.get('/table-editable', (req, res, next) => { res.render('Tables/EditableTable', { title: 'Editable Table' }); });

// Charts
router.get('/chart-morris', (req, res, next) => { res.render('Charts/MorriesChart', { title: 'Morris Chart' }); });
router.get('/chart-high', (req, res, next) => { res.render('Charts/HighCharts', { title: 'High Charts' }); });
router.get('/chart-am', (req, res, next) => { res.render('Charts/AmChart', { title: 'Am Charts' }); });
router.get('/chart-apex', (req, res, next) => { res.render('Charts/ApexCharts', { title: 'Apex Chart' }); });

// Icons
router.get('/icon-dripicons', (req, res, next) => { res.render('Icons/IconDripicons', { title: 'Dripicons' }); });
router.get('/icon-fontawesome-5', (req, res, next) => { res.render('Icons/IconFontAwesome5', { title: 'Font Awesome 5' }); });
router.get('/icon-lineawesome', (req, res, next) => { res.render('Icons/IconLineAwesome', { title: 'Line Awesome' }); });
router.get('/icon-remixicon', (req, res, next) => { res.render('Icons/IconRemixicon', { title: 'Remixicon' }); });
router.get('/icon-unicons', (req, res, next) => { res.render('Icons/IconUnicon', { title: 'Unicons' }); });

// Authentication
router.get('/sign-in', (req, res, next) => { res.render('AuthPages/login', { title: 'Login' }); });
router.get('/sign-up', (req, res, next) => { res.render('AuthPages/register', { title: 'Register' }); });
router.get('/pages-recoverpw', (req, res, next) => { res.render('AuthPages/pages-recoverpw', { title: 'Recover Password' }); });
router.get('/pages-confirm-mail', (req, res, next) => { res.render('AuthPages/pages-confirm-mail', { title: 'Confirm Mail' }); });
router.get('/pages-lock-screen', (req, res, next) => { res.render('AuthPages/pages-lock-screen', { title: 'Lock Screen' }); });

// Map
router.get('/pages-map', (req, res, next) => { res.render('Maps/GoogleMaps', { title: 'Google Maps' }); });

// Extra Pages
router.get('/pages-maintenance', (req, res, next) => { res.render('Pages/Maintenance', { title: 'Pages Maintenance' }); });
router.get('/pages-comingSoon', (req, res, next) => { res.render('Pages/ComingSoon', { title: 'Pages ComingSoon' }); });
router.get('/pages-pricing', (req, res, next) => { res.render('Pages/Pricing', { title: 'Pages Pricing' }); });
router.get('/pages-faq', (req, res, next) => { res.render('Pages/Faq', { title: 'Pages Faq' }); });
router.get('/pages-invoice', (req, res, next) => { res.render('Pages/Invoice', { title: 'Pages Invoice' }); });
router.get('/pages-pricing-one', (req, res, next) => { res.render('Pages/Pricing1', { title: 'Pages Pricing1' }); });
router.get('/pages-timeline', (req, res, next) => { res.render('Pages/TimeLines', { title: 'Pages TimeLines' }); });
router.get('/pages-error-500', (req, res, next) => { res.render('Pages/500', { title: 'Pages 500' }); });
router.get('/blank-page', (req, res, next) => { res.render('Pages/BlankPage', { title: 'Blank Page' }); });




mountRegisterRoutes(router);
mountLoginRoutes(router);
mountLogoutRoutes(router, [isAuthenticated]);
mountResetPasswordRoutes(router);

module.exports = router;
