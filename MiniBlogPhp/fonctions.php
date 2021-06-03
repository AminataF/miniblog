<?php
require_once 'data/config.php';

function dump($variable){
	echo '<pre>';
	var_dump($variable);
	echo '</pre>';
}

function nav_item(string $lien, string $titre, string $linkClass = ''): string{
	$classe = 'nav-item';
	if ($_SERVER['SCRIPT_NAME'] === $lien) {
		$classe .= ' active';
	}
	return '<li class="' . $classe . '">
	       		<a class="' . $linkClass . '" href="' . $lien . '">' . $titre . '</a>
	      	</li>';
}

function nav_menu(string $linkClass = ''): string
{
	return
		nav_item('index.php', 'Accueil', $linkClass) .
		nav_item('menuVersionCsv.php', 'Menu', $linkClass) .
		nav_item('contact.php', 'Contact', $linkClass).
		nav_item('dashboard.php', 'Dashboard', $linkClass);
}

// name c'est le nom de mon tableau j'ai ensuite cornets et supplements...
//$value c'est le noms de mes champs dans le tableau et $data = $_GET c'est mon tableau entier
function checkbox(string $name, string $value, array $data) : string{
	$attribute = '';
	if (isset($data[$name]) && in_array($value, $data[$name])) {
		$attribute .= 'checked';
	}
	return <<<HTML
	<input type="checkbox" name="{$name}[]" value="$value" $attribute>
HTML;
}

function radio(string $name, string $value, array $data) : string{
	$attribute = '';
	if (isset($data[$name]) && $value === $data[$name]) {
		$attribute .= 'checked';
	}
	return <<<HTML
		<input type="radio" name="{$name}" value="$value" $attribute>
HTML;
}

function select(string $name, $value, array $options) : string{
	$html_options = [];
	foreach ($options as $key => $option) {
		$attribute = ($key == $value) ? ' selected ' : '';
		$html_options[] = "<option value='$key' $attribute>$option</option>";
	}
	return '<select class="form-control" name="'.$name.'">' . implode($html_options) . '</select>';
}

function creneaux_html(array $creneaux){
	if (empty($creneaux)) {
		return 'Fermer';
	}
	$phrase = [];
	foreach ($creneaux as $creneau) {
		$phrase[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
	}
	return 'Ouvert ' . implode(' et ', $phrase);
}

function in_creneaux(int $heure, array $creneaux): bool{
	foreach ($creneaux as $creneau) {
		$debut = $creneau[0];
		$fin = $creneau[1];
		if ($heure >= $debut && $heure < $fin){
		return true;
		}
	}
	return false;
}


