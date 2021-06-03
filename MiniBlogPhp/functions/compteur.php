<?php

function ajout_vue(){
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
}

function nombre_vue(){
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}

function incrementer_compteur( string $fichier){
    $compteur = 1;
    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}

function nombre_vues_mois(int $years, string $month): int{
    $mois = str_pad($month, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $years . '-' . $mois. '-'. '*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach ($fichiers as $fichier) {
        $total +=  (int)file_get_contents($fichier);
    }
    return $total;
}

function nombre_vues_detail_mois(int $years, string $month): array{
    $mois = str_pad($month, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $years . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $visite = [];
    foreach ($fichiers as $fichier) {
        $parties = explode('-', basename($fichier));
        $visite[] = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'visites' => file_get_contents($fichier)

        ];var_dump($visite);
    }
    return $visite;
}