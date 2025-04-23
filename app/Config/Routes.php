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