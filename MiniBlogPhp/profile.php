<?php
$title = 'Mon profile';
$user = [
    'prénom' => 'John',
    'nom' => 'Doe',
    'age' => 39
];

$utilisateur = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 20);
}
if (!empty($_COOKIE['utilisateur'])){
    $utilisateur = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $utilisateur = $_POST['nom'];
}
require_once 'elements/header.php';
?>

<?php if($utilisateur): ?>
    <h1>Bonjour <?= htmlentities($utilisateur); ?></h1>
    <a href="profile.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>
    <div class="form-group">
        <form method="POST" role="form" action="">
            <legend>profile</legend>
            <div class="form-group">
                <input type="text" name="nom" class="form-control col-sm-8" placeholder="Entrer votre nom" require>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php endif; ?>

<?php
require 'elements/footer.php';
?>