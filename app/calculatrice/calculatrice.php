<?php
// ajout gestion exeption 
class Calculatrice
{
    public $nombre1;
    public $nombre2;
    
    public function __construct($nombre1, $nombre2)
    {
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
    }

    public function add()
    {
        return $this->nombre1 + $this->nombre2;
    }
    public function mul()
    {
        return $this->nombre1 * $this->nombre2;
    }
    public function sub()
    {
        return $this->nombre1 - $this->nombre2;
    }
    public function div()
    {
        return $this->nombre1 / $this->nombre2;
    }

}