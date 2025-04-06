<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get','post'],'user-login', 'AuthController::userlogin');
$routes->match(['get','post'],'user-register', 'AuthController::userRegister');
$routes->match(['get','post'],'verify', 'AuthController::verify');
$routes->match(['get','post'],'verify-login', 'AuthController::verify_login');
$routes->match(['get','post'],'user-kyc', 'AuthController::user_kyc');
$routes->get('logout', 'AuthController::logout');

$routes->get('privacy-policy', 'FrontController::privacy_policy');
$routes->get('term-condition', 'FrontController::term_condition');
$routes->get('refund', 'FrontController::refund');

$routes->get('tournaments', 'FrontController::tournaments');
$routes->match(['get','post'],'tournament-details/(:num)', 'FrontController::tournament_details/$1');
$routes->post('enroll_tournament/(:num)', 'Enroll_tournamentController::enroll_tournament/$1');


$routes->match(['get','post'],'admin/login', 'AdminControllers::adminLogin');
$routes->group('admin',['filter'=>'adminLogin'], static function($routes){
    $routes->get('/', 'AdminControllers::adminDashboard');
    $routes->get('logout', 'AdminControllers::logout');

   
    $routes->match(['get','post'],'sports-category','MasterController::sports_category');
    $routes->match(['get','post'],'sports-subcategory','MasterController::sports_subcategory');
    $routes->match(['get','post'],'league-session','MasterController::league_session');
    $routes->match(['get','post'],'teams','MasterController::teams');
    $routes->match(['get','post'],'players-category','MasterController::players_category');

    $routes->match(['get','post'],'add-tournament','TournamentController::add_tournament');
    $routes->match(['get','post'],'tournament-list','TournamentController::tournament_list');



});

$routes->post('fetch_sports_subcategory', 'UniversalController::fetch_sports_subcategory');
$routes->post('getParticipantTypes', 'UniversalController::getParticipantTypes');

$routes->get('test_mail', 'UniversalController::test_mail');