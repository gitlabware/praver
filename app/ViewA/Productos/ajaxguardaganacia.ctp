<?php
//debug($datosProducto);
    $porcentaje = $datosProducto['Producto']['porcentaje_ganancia'];
    $porcentajeMuestra = $porcentaje*100;
    echo $porcentajeMuestra.' % ';
    $precio = $datosProducto['Producto']['precio_venta'];
    $precioTotal = $precio * $porcentaje;
    echo '('.$precioTotal.')';
?>