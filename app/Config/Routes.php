<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('colleges', 'CollegesController::index'); // Fetch colleges
$routes->post('colleges', 'CollegesController::create'); // Add a new college

