<?php
class CartItem {
  public $Id; // ID položky v košíku
  public $Pocet; // Počet položek
  public $Cena; // Cena položky
  public $Nazev; // Název položky

  // Metoda pro nastavení počtu položek
  public function set_Pocet($pocet) {
    $this->Pocet = $pocet; // Přiřazení hodnoty proměnné $pocet do vlastnosti $Pocet
  }
  
  // Metoda pro získání počtu položek
  public function get_Pocet() {
    return $this->Pocet; // Vrácení hodnoty vlastnosti $Pocet
  }

  // Metoda pro nastavení ID položky
  public function set_Id($id) {
    $this->Id = $id; // Přiřazení hodnoty proměnné $id do vlastnosti $Id
  }
  
  // Metoda pro získání ID položky
  public function get_Id() {
    return $this->Id; // Vrácení hodnoty vlastnosti $Id
  }

  // Metoda pro nastavení názvu položky
  public function set_Nazev($name) {
    $this->Nazev = $name; // Přiřazení hodnoty proměnné $name do vlastnosti $Nazev
  }
  
  // Metoda pro získání názvu položky
  public function get_Nazev() {
    return $this->Nazev; // Vrácení hodnoty vlastnosti $Nazev
  }

  // Metoda pro nastavení ceny položky
  public function set_Cena($cena) {
    $this->Cena = $cena; // Přiřazení hodnoty proměnné $cena do vlastnosti $Cena
  }
  
  // Metoda pro získání ceny položky
  public function get_Cena() {
    return $this->Cena; // Vrácení hodnoty vlastnosti $Cena
  }
}
?>
