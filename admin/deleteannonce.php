<?php
var_dump($_GET);
require_once('../utils/connectdb.php');
$title = "Delete Annonce";
include_once('../block/header.php');
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
//suppression de l'annonce
if (isset($_GET['id'])) {
    $opd = connectdb();
    $query = $opd->prepare('DELETE FROM annonce WHERE id = :id');
    $query->execute([
        'id' => $_GET['id']
    ]);
    header("location: indexadmin.php");
}
  

