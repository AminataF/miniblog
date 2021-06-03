<?php
require 'header.php';
//checkbox
$parfums = [
	'Fraise' => 4,
	'Chocolat' => 5,
	'Vanille' => 3 
];

//radio
$cornets = [
	'Pot' => 2,
	'Cornet' => 3
];

//checkbox
$supplements = [
	'Pépite de Chocolat' => 1,
	'Chantilly' => 0.50
];
$ingredients = [];
$total = 0;


if (isset($_GET['parfum'])) {
	foreach ($_GET['parfum'] as $parfum) {
		if (isset($parfums[$parfum])) {
			$ingredients = $parfum;
			$total += $parfums[$parfum];
		}
	}
}	

if (isset($_GET['cornet'])) {
	$cornet = $_GET['cornet'];
	if (isset($cornets[$cornet])) {
		$ingredients = $cornet;
		$total += $cornets[$cornet];
	}
}
	
if (isset($_GET['supplement'])) {
	foreach ($_GET['supplement'] as $supplement) {
		if (isset($supplements[$supplement])) {
			$ingredients = $supplement;
			$total += $supplements[$supplement];
		}
	}
}
	

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Glaces</title>
	</head>
	<body>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Votre Glace</h5>
						<ul>
							<?php foreach($ingredients as $ingredient) { ?>
								<li><?php echo $ingredient; ?></li>
							<?php } ?>
						</ul>
						<strong>Prix : </strong><?= $total ?> €
					</div>
				</div>
			</div>
		</div>
		<h1>Nos glaces</h1>
		<form action="jeu.php" method="GET">
			<?php foreach ($parfums as $parfum => $prix) : ?> 
			<div class="checkbox">
				<label>
					<?= checkbox('parfum', $parfum, $_GET); ?>
					<?= $parfum; ?> - <?= $prix; ?> €
				</label>
			</div>
			<?php endforeach; ?>
			<h3>Nos cornets</h3>
			<?php foreach ($cornets as $cornet => $prix) : ?> 
			<div>
				<label>
					<?= radio('cornet', $cornet, $_GET); ?>
					<?= $cornet; ?> - <?= $prix; ?> €
				</label>
			</div>
			<?php endforeach; ?>
			<h3>Nos supplements</h3>
			<?php foreach ($supplements as $supplement => $prix) : ?> 
			<div class="checkbox">
				<label>
					<?= checkbox('supplement', $supplement, $_GET); ?>
					<?= $supplement; ?> - <?= $prix; ?> €
				</label>
			</div>
			<?php endforeach; ?>
			<button type="submit" class="btn btn-primary">Composer votre glaces</button>
		</form>
	</body>
</html>