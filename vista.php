<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de la Pizzería</title>
</head>

<body>

    <h1>Bienvenido a Mamma mía!</h1>

    <?php
    function mostrarMenu($articulos)
    {
        echo "<h2>Nuestro menú</h2>";

        echo "<h3>Pizzas</h3>";
        foreach ($articulos as $articulo) {
            if ($articulo instanceof Pizza) {
                echo "{$articulo->nombre}<br>";
            }
        }

        echo "<h3>Bebidas</h3>";
        foreach ($articulos as $articulo) {
            if ($articulo instanceof Bebida) {
                echo "{$articulo->nombre}<br>";
            }
        }

        echo "<h3>Otros</h3>";
        foreach ($articulos as $articulo) {
            if (!($articulo instanceof Pizza) && !($articulo instanceof Bebida)) {
                echo "{$articulo->nombre}<br>";
            }
        }
    }

    function mostrarMasVendidos($articulos)
    {
        echo "<h2>Los más vendidos</h2>";

        usort($articulos, function ($a, $b) {
            return $b->contador - $a->contador;
        });

        for ($i = 0; $i < 3; $i++) {
            echo "{$articulos[$i]->nombre} - Vendidos : {$articulos[$i]->contador} unidades<br>";
        }
    }

    function mostrarMasLucrativos($articulos)
    {
        echo "<h2>¡Los más lucrativos!</h2>";

        usort($articulos, function ($a, $b) {
            $beneficioA = ($a->precio - $a->coste) * $a->contador;
            $beneficioB = ($b->precio - $b->coste) * $b->contador;

            return $beneficioB - $beneficioA;
        });

        foreach ($articulos as $articulo) {
            $beneficio = ($articulo->precio - $articulo->coste) * $articulo->contador;
            echo "{$articulo->nombre} - Beneficio: {$beneficio}€<br>";
        }
    }

    ?>
</body>

</html>