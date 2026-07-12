<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


$routes->get('eperpus', 'Buku::index');
$routes->get('eperpus/tambah', 'Buku::create');
$routes->post('eperpus/simpan', 'Buku::store');