<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 $routes->get('/', 'Home::index');
 $routes->get('/login', 'Auth::login');
 $routes->post('/auth/loginProcess', 'Auth::loginProcess');
 //buat create user
 $routes->get('/auth/logout', 'Auth::logout');
 $routes->get('create/user', 'Auth::register');
 $routes->post('/auth/registerProcess', 'Auth::registerProcess');

 $routes->get('/admin/index', 'Admin::index');
 $routes->get('/user/index', 'User::index');


$routes->get('User/user_list', 'Auth::userList');

// Candidate routes
$routes->get('Candidates/create', 'CandidateController::create');
$routes->post('Candidates/store', 'CandidateController::store');
$routes->get('Candidates/index', 'CandidateController::index');
$routes->post('Candidates/vote/(:num)', 'CandidateController::vote/$1');
$routes->get('user/candidates_view', 'User ::candidatesView');
$routes->get('admin/candidate_list', 'CandidateController::candidateList');

//$routes->get('candidates/edit', 'CandidateController::edit');
//$routes->post('candidates/update', 'CandidateController::update');
//$routes->get('candidates/delete', 'CandidateController::delete'); // Assuming you want to use GET for delete

$routes->get('candidates/edit/(:num)', 'CandidateController::edit/$1');
$routes->post('candidates/update/(:num)', 'CandidateController::update/$1');
$routes->post('candidates/delete/(:num)', 'CandidateController::delete/$1');


//this for user update and delete

$routes->get('users/edit/(:num)', 'Auth::edit/$1'); // Show form to edit a user
$routes->post('users/update/(:num)', 'Auth::update/$1'); // Update a user
$routes->post('users/delete/(:num)', 'Auth::delete/$1'); // Delete a user
 
 $routes->get('Auth/logout', 'Auth::logout');
 $routes->get('Login/login', 'Home::index');
// $routes->get('candidates/create', 'Candidates::create');
//$routes->post('candidates/store', 'Candidates::store');
