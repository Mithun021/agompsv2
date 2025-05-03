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
$routes->get('contact', 'FrontController::contact');

$routes->get('tournaments', 'FrontController::tournaments');
$routes->match(['get','post'],'tournament-details/(:num)', 'FrontController::tournament_details/$1', ['filter' => 'authCheck']);
$routes->post('enroll_tournament/(:num)', 'Enroll_tournamentController::enroll_tournament/$1');
$routes->post('search-tournament', 'Enroll_tournamentController::search_tournament');

$routes->post('enroll_payment/(:num)/(:num)', 'Enroll_tournamentController::enroll_payment/$1/$2');
$routes->get('payment_success', 'Enroll_tournamentController::payment_success');
$routes->get('payment_success_page/(:num)', 'Enroll_tournamentController::payment_success_page/$1');

$routes->match(['get','post'],'admin/login', 'AdminControllers::adminLogin');
$routes->group('admin',['filter'=>'adminLogin'], static function($routes){
    $routes->get('/', 'AdminControllers::adminDashboard');
    $routes->get('logout', 'AdminControllers::logout');

   
    $routes->match(['get','post'],'sports-category','MasterController::sports_category');
    $routes->match(['get','post'],'edit-sports-category/(:num)','MasterController::edit_sports_category/$1');
    $routes->match(['get','post'],'delete-sports-category/(:num)','MasterController::delete_sports_category/$1');
    $routes->match(['get','post'],'sports-subcategory','MasterController::sports_subcategory');
    $routes->match(['get','post'],'edit-sports-subcategory/(:num)','MasterController::edit_sports_subcategory/$1');
    $routes->match(['get','post'],'delete-sports-subcategory/(:num)','MasterController::delete_sports_subcategory/$1');
    $routes->match(['get','post'],'league-session','MasterController::league_session');
    $routes->match(['get','post'],'teams','MasterController::teams');
    $routes->match(['get','post'],'players-category','MasterController::players_category');
    $routes->match(['get','post'],'edit-players-category/(:num)','MasterController::edit_players_category/$1');
    $routes->match(['get','post'],'delete-players-category/(:num)','MasterController::delete_players_category/$1');
    

    $routes->match(['get','post'],'add-tournament','TournamentController::add_tournament');
    $routes->match(['get','post'],'tournament-list','TournamentController::tournament_list');
    $routes->match(['get','post'],'edit-tournament/(:num)','TournamentController::edit_tournament/$1');
    $routes->get('delete-tournament/(:num)', 'TournamentController::delete-tournament/$1');



});

$routes->post('fetch_sports_subcategory', 'UniversalController::fetch_sports_subcategory');
$routes->post('getParticipantTypes', 'UniversalController::getParticipantTypes');

$routes->get('test_mail', 'UniversalController::test_mail');