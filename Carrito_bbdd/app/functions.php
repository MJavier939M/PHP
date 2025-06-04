<?php

function getProductos() {

    //funcion para obtener los productos de la base de datos
    $conexion = require "bbdd/config.php";
    $stmt = $conexion->prepare("SELECT * FROM productos");
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;

}
?>
<?php
function mostrarProductos($productos) {

    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                 <tr>
                     <td><?php echo $producto["nombre"]; ?></td>
                     <td><?php echo $producto["precio"]; ?></td>
                     <td>
                         <input type="number" disabled id="<?php echo $producto['id']; ?>" value="0" min="0" max="10">
                         <button onclick="restar(<?php echo $producto['id']; ?>)">-</button>
                         <button onclick="sumar(<?php echo $producto['id']; ?>)">+</button>
                     </td>
                     <td>
                         <form action="productos.php" method="post">
                             <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                             <input type="hidden" name="cantidad" value="0">
                             <button type="submit">Añadir al carrito</button>
                         </form>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>

    <script>
        function sumar(id) {
            let input = document.getElementById(id);
            input.value = parseInt(input.value) + 1;
        }
            
        function restar(id) {
            let input = document.getElementById(id);
            if (input.value > 0) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
<?php

    }
?>