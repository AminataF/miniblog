<?php
require_once 'elements/header.php';
require_once 'functions/auth.php';
require_once 'fonctions.php';

$error = null;
$mdp = password_hash('012345', PASSWORD_DEFAULT, ['cost' => 12]);
$login = 'Lucas';
if (isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {

    $pseudo = htmlentities($_POST['pseudo']);
    $pwd = htmlentities($_POST['pwd']);
    if (password_verify($pwd, $mdp) && $login === $pseudo) {
        header('location: dashboard.php');
        session_start();
        $_SESSION['connecter'] = 1;
        exit();
    } else {
        $error = 'Identifiant ou mot de passe incorrects';
    }
}

if (est_connecter()) {
    header('Location:dashboard.php');
}
?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
<?php endif; ?>
<form class="form" method="post" action="#">
    <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
    <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Entrez votre identifiant" required autofocus>
    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Entrez votre mot de passe" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary" type="submit">Connexion</button>
</form>
<?php require 'elements/footer.php'; ?>