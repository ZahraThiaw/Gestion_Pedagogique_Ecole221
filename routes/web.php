<?php

use Core\Route\Route;
// // tous les routes de login
// Route::get('login', 'LoginController','showLogin');
// Route::post('login', 'LoginController','login');
// Route::get('logout', 'LoginController','logout');

// // tous les routes de boutiquier
// Route::get('accueil', 'BoutiquierController','accueil');
// Route::post('mesdettes', 'BoutiquierController','detailDette');
// Route::get('mesdettes', 'BoutiquierController','detteClients');

// // tous les routes de client
// Route::post('client', 'ClientController','findClient');

// // tous les routes de dette
// // Route::get('dette', 'DetteController','dette');
// Route::post('nouvelledette', 'DetteController','enregistrer');

// // tous les routes de paiement
// Route::get('paiement', 'PaiementController','paiement');
// Route::post('paiement', 'PaiementController','paiement');
// Route::post('liste', 'PaiementController','listerPaiement');

// //tous les routes articles 
// Route::post('produit', 'ProduitController','produit');



// Route::post('nouvelle', 'BoutiquierController','enregistrerDette');
// Route::post('accueil', 'BoutiquierController','addClient');
// Route::post('dette', 'BoutiquierController','detailDette');
// Route::get('dette/add/#id/#date', 'ExoController','store');
// Route::get('/', 'ErrorController','error404');
// Route::get('api/dette', 'ApiController','apiJson');


Route::get('login', 'LoginController','showLogin');
Route::post('login', 'LoginController','login');
Route::get('logout', 'LoginController','logout');
Route::get('listercoursprof', 'CourController','index');
Route::get('listercoursprof', 'CourController','show');
Route::get('listersessiondecours', 'SessiondecourController', 'index');
Route::post('sessiondecour/cancel', 'SessiondecourController', 'cancel');


// Route::get('listersessiondecours', 'SessiondecourController','index');
// Route::get('getProfessorSessions', 'SessiondecourController', 'getProfessorSessions');


