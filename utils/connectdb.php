<?php


function connectDB()
{

    try {

        $host = "localhost";
        $databaseName = "dauphineexam";
        $user = "root";
        $password = "";

        $pdo = new PDO("mysql:host=" . $host . ";port=3307;dbname=" . $databaseName . ";charset=utf8", $user, $password);

        configPdo($pdo);

        return $pdo;
    } catch (Exception $e) {
        
        //Lancer l'erreur
        //throw $e;

        echo ("base de données non connectée : " .  $e->getMessage());

        exit();
    }
}

function configPdo(PDO $pdo)
{
    // Recevoir les erreurs PDO ( coté SQL )
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

?>