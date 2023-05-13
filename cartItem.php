<?php
class CartItem {
  public $Id;
  public $Pocet;
  public $Cena;
  public $Nazev;

  function set_Pocet($pocet) {
    $this->Pocet = $pocet;
  }
  function get_Pocet() {
    return $this->Pocet;
  }

  function set_Id($id) {
    $this->Id = $id;
  }
  function get_Id() {
    return $this->Id;
  }

  function set_Nazev($name) {
    $this->Nazev = $name;
  }
  function get_Nazev() {
    return $this->Nazev;
  }


  function set_Cena($cena) {
    $this->Cena = $cena;
  }
  function get_Cena() {
    return $this->Cena;
  }
}
?>