<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Welcome::index');
$routes->get('/login', 'Login::index');
$routes->get('/login/logout', 'Login::logout');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/adauga_medic', 'Admin::adauga_medic');
$routes->get('/admin/view_profile/(:num)', 'Admin::view_profile/$1');
$routes->get('/admin/edit_medic/(:num)', 'Admin::edit_medic/$1');
$routes->get('/admin/delete_medic/(:num)', 'Admin::delete_medic/$1');
$routes->get('/medic', 'Users::index');
$routes->get('/medic/adauga_pacient', 'Users::adauga_pacient');
$routes->post('/medic/add_done1', 'Users::add_done1');
$routes->post('/admin/delete_done', 'Admin::delete_done');
$routes->post('/admin/edit_done/(:num)', 'Admin::edit_done/$1');
$routes->post('/admin/add_done1', 'Admin::add_done1');
$routes->post('/login/done', 'Login::done');
$routes->post('/api/smartphone/login', 'API::SmartphoneLogin');
$routes->post('/api/smartphone/sensors', 'API::SmartphoneSensors');
$routes->post('/api/hl7/fhir', 'API::GetDataFromHL7FHIR');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
