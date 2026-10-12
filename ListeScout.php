<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Si l'application envoie une requête de pré-vérification (OPTIONS), on arrête l'exécution ici
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Initialisation de l'environnement de connexion
require 'Initialize.php';

// Recupération de la liste des scouts
$results = Database::getResults('SELECT * FROM profil_jn_tbl ORDER by id_profil_jn');

// Sortie d'un tableau JSON
header('Content-Type: application/json');

// Si le résultat est vide, l'Application reconnais qu'il n'y a pas de scout
echo json_encode($results);

exit;

