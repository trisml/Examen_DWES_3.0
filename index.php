

<?php
//Link a github: https://github.com/trisml/Examen_DWES_3.0.git
require_once 'vista.php';

class Articulo {
    public $nombre;
    public $coste;
    public $precio;
    public $cantidad;

    public function __construct($nombre, $coste, $precio, $cantidad) {
        $this->nombre = $nombre;
        $this->coste = $coste;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCoste() {
        return $this->coste;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
 
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCoste($coste) {
        $this->coste = $coste;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
}

class Pizza extends Articulo {
    public $ingredientes;

    public function __construct($nombre, $coste, $precio, $cantidad, $ingredientes) {
        parent::__construct($nombre, $coste, $precio, $cantidad);
        $this->ingredientes = $ingredientes;
    }

    public function getIngredientes() {
        return $this->ingredientes;
    }

    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }
}

class Bebida extends Articulo {
    public $alcoholica;

    public function __construct($nombre, $coste, $precio, $cantidad, $alcoholica) {
        parent::__construct($nombre, $coste, $precio, $cantidad);
        $this->alcoholica = $alcoholica;
    }

    public function getAlcoholica() {
        return $this->alcoholica;
    }

    public function setAlcoholica($alcoholica) {
        $this->alcoholica = $alcoholica;
    }
}

$articulos = [
    new Articulo("Lasagna", 3.50, 7.00, 20),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50, 15),
    new Pizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, 50, false),
    new Bebida("Cerveza", 1.50, 3.00, 40, true)
];

mostrarMenu($articulos);
masVendidos($articulos);
mostrarLucrativos($articulos);
?>

