<?php
session_start();
unset($_SESSION['connecter']);
header('Location: connexion.php');