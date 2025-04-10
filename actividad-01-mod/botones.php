<?php

//! TAREA 3:
//! Haz que se reciba que acción POST se envió desde el formulario
//* según la acción que se haya enviado, llamar a la función correspondiente

    if (isset($_POST["borrar"])) {
        borrarDatos();
    } else if (isset($_POST["rellenar"])) {
        rellenarDatos();
        
    }

function borrarDatos()
{

    $archivos = ["pedidos.csv", "productos.csv"];

    //! TAREA 4:
    //! recorre cada archivo y recupera las cabeceras en una variable
    //* despues de recuperarlas vuelve a abrir el archivo en modo escritura
    //* y escribe las cabeceras en el archivo (esto borra los registros)

        foreach ($archivos as $archivo) {
            $openArchivo = fopen($archivo, "r");
            $cabeceras = fgetcsv($openArchivo);
            fclose($openArchivo);

            $openArchivo = fopen($archivo, "w");
            fputcsv($openArchivo, $cabeceras);
            fclose($openArchivo);
        }

    //! TAREA 5:
    //! redirige al usuario a index.php
    header("Location: index.php");
}




function rellenarDatos()
{

    $archivoProductos = "productos.csv";
    $archivoPedidos = "pedidos.csv";

    $productos = [
        ["id_producto", "nombre", "categoria", "precio", "stock", "imagen"],
        [1, "Laptop HP", "Electrónica", 750.0, 10, "https://www.hp.com/es-es/shop/Html/Merch/Images/c06593122_1750x1285.jpg"],
        [2, "Teclado RGB", "Accesorios", 50.0, 25, "https://www.nerdytec.com/wp-content/uploads/2023/10/01_nerdytec_CYKEY_ISO_RGB.jpg"],
        [3, "Monitor 24", "Electrónica", 200.0, 15, "https://www.lg.com/content/dam/channel/wcms/es/images/monitores/24gn60r-b_beu_eees_es_c/gallery/large01.jpg"],
        [4, "Ratón Gamer", "Accesorios", 30.0, 40, "https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202307/19/00128635708523____7__1200x1200.jpg"],
        [5, "Silla Ergonómica", "Muebles", 180.0, 5, "https://mobiocasion.com/40824-thickbox_default/silla-ergonomica-de-oficina-new-ergostone-de-euromof.jpg"]
    ];


    $pedidos = [
        ["id_pedido", "id_producto", "cliente", "cantidad", "fecha"],
        [1, 2, "Juan Pérez", 1, "2025-03-10"],
        [2, 1, "María Gómez", 2, "2025-03-11"],
        [3, 5, "Carlos López", 1, "2025-03-12"],
        [4, 3, "Ana Ramírez", 2, "2025-03-13"],
        [5, 4, "Pedro Torres", 3, "2025-03-14"]
    ];

    //! TAREA 6:
    //! abre los archivos en modo escritura y rellenalos con los datos de los arrays
    //* al finalizar redirige al usuario a index.php

    $openArchivo = fopen($archivoProductos, "w");
    foreach ($productos as $producto) {
        fputcsv($openArchivo, $producto);
    }
    fclose($openArchivo);

    $openArchivo = fopen($archivoPedidos, "w");
    foreach ($pedidos as $pedido) {
        fputcsv($openArchivo, $pedido);
    }
    fclose($openArchivo);

    header("Location: index.php");

}
