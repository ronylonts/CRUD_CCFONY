<?php
use Symfony\Component\Dotenv\Dotenv;

// Chemin CORRECT vers vendor/autoload.php (niveau racine du projet)
require __DIR__.'/../../vendor/autoload.php';

// Charge les variables d'environnement
if (file_exists(__DIR__.'/../../.env')) {
    (new Dotenv())->bootEnv(__DIR__.'/../../.env');
}

// Initialisation du kernel uniquement pour les tests
if ($_SERVER['APP_ENV'] ?? 'dev' === 'test') {
    $kernel = new \App\Kernel($_SERVER['APP_ENV'], (bool)($_SERVER['APP_DEBUG'] ?? false));
    $kernel->boot();
}