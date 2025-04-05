<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

// Configuration du temps maximum d'exécution (optionnel)
set_time_limit(30);

// Gestion des erreurs (pour le dev)
if (isset($_SERVER['APP_DEBUG']) && $_SERVER['APP_DEBUG']) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

return function (array $context) {
    // Création du kernel Symfony
    $kernel = new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

    // Gestion de la requête
    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();

    // Terminaison du kernel
    $kernel->terminate($request, $response);

    return $kernel;
};