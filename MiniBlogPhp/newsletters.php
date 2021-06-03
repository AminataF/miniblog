<?php
require 'elements/header.php';
$error = null;
$success = null;
$email = null;
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'email' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = "Votre email à était enregistré";
        $email = null;
    } else {
        $error = "Votre email n'est pas valide";
    }
}
?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif; ?>

<h1>S'inscrire à notre newsletter</h1>
<p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod beatae quibusdam deleniti accusantium temporibus blanditiis non, incidunt cupiditate placeat deserunt cum vitae consectetur fugit consequuntur eligendi assumenda vero porro mollitia.</p>
<div class="form-group">
    <form method="POST" role="form" action="newsletters.php">
        <legend>NewsLetter</legend>
        <div class="form-group">
            <label for="">email</label>
            <input type="email" name="email" value="<?= htmlentities($email); ?>" class="form-control col-sm-4" id="email" placeholder="Entrer votre email" require>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
require 'elements/footer.php';
?>