<?php
require_once 'elements/header.php';
require_once 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
require_once 'functions' . DIRECTORY_SEPARATOR . 'auth.php';

$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_selection && $mois_selection) {
    $vue = nombre_vues_mois($annee_selection, $mois_selection);
    $detail = nombre_vues_detail_mois($annee_selection, $mois_selection);
} else {
    $vue = nombre_vue();
}

$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
?>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <a class="list-group-item <?= $annee - $i === $annee_selection ? ' active' : '' ?>" href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
                <?php if ($annee - $i === $annee_selection) : ?>
                    <div class="list-group">
                        <?php foreach ($mois as $key => $nom_mois) : ?>
                            <a class="list-group-item <?= $mois_selection === $key ? 'active' : '' ?>" href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $key ?>">
                                <?= $nom_mois ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <h2>Nombre de visite<?= $vue > 1 ? 's' : '' ?> global du site : <?= $vue; ?></h2>
            </div>
        </div>
        <?php if (isset($detail)) : ?>
            <h2>Détails des visites pour le mois</h2>
            <table class="table table_striped">
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Nombre de visite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $ligne) : ?>
                        <tr>
                            <td><?= $ligne['jour'] ?></td>
                            <td><?= $ligne['visites'] ?> visite<?= $ligne['visites'] > 1 ? 's' : '' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php require 'elements/footer.php'; ?>