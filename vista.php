<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de la Pizzería</title>
</head>

<body>

    <h1>Bienvenido a Mamma mía! Tu pizzeria de confianza</h1>

    <?php
    function mostrarMenu($articulos)
    {
        echo "<h1>Nuestro menú</h1>";

        echo "<h2>Pizzas</h2>";
        foreach ($articulos as $articulo) {
            if ($articulo instanceof Pizza) {
                echo "{$articulo->nombre}<br>";
            }
        }

        echo "<h2>Bebidas</h2>";
        foreach ($articulos as $articulo) {
            if ($articulo instanceof Bebida) {
                echo "{$articulo->nombre}<br>";
            }
        }

        echo "<h2>Otros</h2>";
        foreach ($articulos as $articulo) {
            if (!($articulo instanceof Pizza) && !($articulo instanceof Bebida)) {
                echo "{$articulo->nombre}<br>";
            }
        }
    }

    function masVendidos($articulos)
    {
        echo "<h1>Los más vendidos</h1>";

        usort($articulos, function ($a, $b) {
            return $b->cantidad - $a->cantidad;
        });

        for ($i = 0; $i < 3; $i++) {
            echo "{$articulos[$i]->nombre} - Vendidos : {$articulos[$i]->cantidad} unidades<br>";
        }
    }

    function mostrarLucrativos($articulos)
    {
        echo "<h1>¡Los más lucrativos!</h1>";

        usort($articulos, function ($a, $b) {
            $beneficio1 = ($a->precio - $a->coste) * $a->cantidad;
            $beneficio2 = ($b->precio - $b->coste) * $b->cantidad;

            return $beneficio2 - $beneficio1;
        });

        foreach ($articulos as $articulo) {
            $beneficio = ($articulo->precio - $articulo->coste) * $articulo->cantidad;
            echo "{$articulo->nombre} - Beneficio: {$beneficio}€<br>";
        }
    }

    ?>
</body>

</html>