<?php
$title = 'Nous Contacter';
require_once 'data/config.php';
require_once 'class/Form.php';
require_once 'elements/header.php';
require_once 'fonctions.php';
date_default_timezone_set('Europe/Paris');
$heure = (int) ($_GET['heure'] ?? date('G'));
$jour = (int) ($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
?>

<div class="row">
	<div class="col-md-8">
		<h2>Nous Contacter</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
	<div class="col-md-4">
		<h2>Horaire d'ouverture</h2>
		<?php if ($ouvert){
			echo '	<div class="alert alert-success">
						<p>Le magasin sera ouvert</p>
					</div>';
		} else {
			echo '	<div class="alert alert-danger">
						<p>Le magasin sera fermé</p>
					</div>';
		} ?>
		<form method="GET">
			<div class="from-group">
				<label for="semaine">Jours de la semaine</label>
				<?= select('jour', $jour, JOURS); ?>
			</div>
			<div class="from-group">
				<label for="heure">Heure d'ouverture</label>
				<input type="number" name="heure" class="from-control" value="<?= $heure ?>">
			</div>
			<button type="submit" class="btn btn-primary">Voir si le magasin est ouvert</button>
		</form>
		<ul>
			<?php foreach (JOURS as $k => $jour) : ?>
				<li>
					<strong><?= $jour; ?> : </strong>
					<?= creneaux_html(CRENEAUX[$k]); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php
require 'elements/footer.php';
?>