<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/inicio', ['controller' => 'index', 'action' => 'index']);
$router->add('/login', ['controller' => 'login', 'action' => 'index']);
$router->add('/login/submit', ['controller' => 'login', 'action' => 'submit']);
$router->add('/cadastro', ['controller' => 'cadastro', 'action' => 'index']);
$router->add('/cadastro/submit', ['controller' => 'cadastro', 'action' => 'submit']);
$router->add('/posts', ['controller' => 'posts', 'action' => 'index']);
$router->add('/posts/submit', ['controller' => 'posts', 'action' => 'submit']);

$router->handle();

