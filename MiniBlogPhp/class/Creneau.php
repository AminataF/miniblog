<?php

class Horaire{

    public $debut;
    public $fin;

    public function __construct(int $debut, int $fin){
        $this->debut = $debut;
        $this->fin = $fin;
    }
    public function toHtml(): string {
        return 'De <strong>'.$this->debut.'</strong> à <strong>'.$this->fin.'</strong>';
    }

    public function inclusHeures(int $heure): bool{
        return $heure >= $this->debut && $heure <= $this->fin;
    }

    public function interSect(Horaire $creneau) : bool {
        return $this->inclusHeures($creneau->debut) ||
                $this->inclusHeures($creneau->fin) ||
                ($this->debut > $creneau->debut && $this->fin < $creneau->fin);
    }
}