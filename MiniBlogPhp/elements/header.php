<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'fonctions.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.6">
  <title><?php
          if (isset($title)) {
            echo $title;
          } else {
            echo "Mon site";
          }
          ?>
  </title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Mon site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" container collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <?= nav_menu('nav-link') ?>
        <?php if(!est_connecter()) : ?>
          <li class="nav-item"><a href="connexion.php" class="nav-link">Connexion</a></li>
        <?php endif;?>
      </ul>
      <ul class="navbar-nav">
        <?php if(est_connecter()) : ?>
          <li class="nav-item"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
        <?php endif;?>
      </ul>
    </div>
  </nav>

  <main role="main" class="container">