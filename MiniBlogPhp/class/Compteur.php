<?php

class Compteur {

    public $fichier;
    const INCREMENT = 1;

    public function __construct($fichier = null)
    {
        $this->fichier = $fichier;
    }

    public function incrementer() : void
    {
        $compteur = 1;
        if (file_exists($this->fichier)) {
            $compteur = (int)file_get_contents($this->fichier);
            $compteur += static::INCREMENT;
            //self fais reference a la class actuelle (ou je suis, ici compteur)
            //static elle fais reference au contexte dans le quel il est ici DoubleCompteur c'est la résolution static
        }
        file_put_contents($this->fichier, $compteur);
    }

    public function recuperer() : int
    {
        if (!file_exists($this->fichier)) {
            return 0;
        }
        return file_get_contents($this->fichier);
    }
}