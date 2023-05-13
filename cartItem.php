<?php
class CartItem {
  public $Id;
  public $Pocet;
  public $Cena;
  public $Nazev;

  public function set_Pocet($pocet) {
    $this->Pocet = $pocet;
  }
  public function get_Pocet() {
    return $this->Pocet;
  }

  public function set_Id($id) {
    $this->Id = $id;
  }
  public function get_Id() {
    return $this->Id;
  }

  public function set_Nazev($name) {
    $this->Nazev = $name;
  }
  public function get_Nazev() {
    return $this->Nazev;
  }


  public function set_Cena($cena) {
    $this->Cena = $cena;
  }
  public function get_Cena() {
    return $this->Cena;
  }
}
?>