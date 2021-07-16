<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Page 
$routes->group('presensi', function($routes){
	$routes->get("", 'AttendanceApi::new');
	$routes->get("edit", 'AttendanceApi::edit'); // after confirm
});

$routes->group('peserta', function($routes){
	$routes->get("register", 'PeopleApi::new');
	$routes->get("edit", 'PeopleApi::edit');
});

$routes->group('events', function($routes){
	$routes->get("register", 'EventsApi::new');
	$routes->get("edit", 'EventsApi::edit');
});


// API
$routes->group('api/attendance', function($routes){
	$routes->get("", 'AttendanceApi::index');
	$routes->post("hadir", 'AttendanceApi::create');
	$routes->put('update/(:segment)','AttendanceApi::update');
	$routes->delete('delete/(:segment)','AttendanceApi::delete');
	
	$routes->get('events/(:segment)','AttendanceApi::showPeopleByEvents');
	$routes->get('people/(:segment)','AttendanceApi::showEventsByPeople');
});

$routes->resource('api/events', ['controller' => 'EventsApi']);
// $routes->resource('api/attendance', ['controller' => 'AttendanceApi']); 
$routes->resource('api/people', ['controller' => 'PeopleApi']); 

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
