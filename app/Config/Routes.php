<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ControllerHomepage::loadHomepage');

$routes->get('books', 'ControllerBooks::loadBooks');

$routes->get('authors', 'ControllerAuthors::loadAuthors');

$routes->get('genres', 'ControllerGenres::loadGenres');

$routes->get('books/(:num)', 'ControllerBook::loadBook/$1');
$routes->get('books/edit/(:num)', 'ControllerBook::editBook/$1');
$routes->post('books/update/(:num)', 'ControllerBook::updateBook/$1');
$routes->post('books/delete/(:num)', 'ControllerBooks::deleteBook/$1');
$routes->get('books/new', 'ControllerBooks::newBook');
$routes->post('books/create', 'ControllerBooks::createBook');

$routes->post('addGenre', 'ControllerGenres::addGenre');

$routes->get('login', 'ControllerIonAuth::loadLogin');
$routes->post('login', 'ControllerIonAuth::processLogin');
$routes->get('register', 'ControllerIonAuth::loadRegister');
$routes->post('register', 'ControllerIonAuth::processRegister');
$routes->post('logout', 'ControllerIonAuth::logout');