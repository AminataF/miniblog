<?php
$title = 'Nos Menus';
//$nav = "contact";
require_once 'elements/header.php';
require_once 'fonctions.php';
$lignes = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.tsv');

foreach ($lignes as $key => $ligne) {
    $lignes[$key] = explode('\t', trim($ligne));

}

?>

<h1>Menu</h1>

<?php foreach ($lignes as $ligne) : ?>
    <hr>
    <?= dump($ligne) ?>
    <hr>

    <?php if (count($ligne) === 1) : ?>
        <hr>
        <h2><?= $ligne[0] ?></h2>
    <?php else : ?>
        <div class="row">
            <div class="col-sm-8">
                <p>
                    <strong><?= $ligne[0]; ?></strong><br>
                    <?= $ligne[1]; ?>
                </p>
            </div>
            <div class="col-sm-4">
                <strong><?= number_format($ligne[2], 2, ',', ' ') ?> €</strong>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<?php require 'elements/footer.php'; ?>c