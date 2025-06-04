<?php
/**
 * Esta función devuelve la lista de productos. En una primera versión, se genera directamente el array asociativo. En el futuro, será la función que conecte a la base de datos y extraiga los datos de allí.
 */
function getProductosData(){
    return 
        [
            [
                'id' => 1,
                'nombre' => 'The Legend of Zelda: Breath of the Wild',
                'precio' => 59.99,
                'categoria' => 'Aventura',
                'descripcion' => 'Explora el vasto mundo de Hyrule en esta épica aventura de mundo abierto.',
                'imagen' => 'zelda_breath_of_the_wild.jpg'
            ],
            [
                'id' => 2,
                'nombre' => 'Elden Ring',
                'precio' => 69.99,
                'categoria' => 'RPG',
                'descripcion' => 'Embárcate en una aventura llena de desafíos en un mundo oscuro y fantástico.',
                'imagen' => 'elden_ring.jpg'
            ],
            [
                'id' => 3,
                'nombre' => 'FIFA 24',
                'precio' => 49.99,
                'categoria' => 'Deportes',
                'descripcion' => 'El mejor simulador de fútbol con las últimas actualizaciones de equipos y jugadores.',
                'imagen' => 'fifa_24.jpg'
            ],
            [
                'id' => 4,
                'nombre' => 'Minecraft',
                'precio' => 19.99,
                'categoria' => 'Creativo',
                'descripcion' => 'Crea y explora mundos infinitos con posibilidades ilimitadas.',
                'imagen' => 'minecraft.jpg'
            ],
            [
                'id' => 5,
                'nombre' => 'Cyberpunk 2077',
                'precio' => 39.99,
                'categoria' => 'Acción',
                'descripcion' => 'Adéntrate en la futurista Night City en este juego de rol de acción.',
                'imagen' => 'cyberpunk_2077.jpg'
            ],
            [
                'id' => 6,
                'nombre' => 'Super Mario Odyssey',
                'precio' => 49.99,
                'categoria' => 'Plataformas',
                'descripcion' => 'Acompaña a Mario en una emocionante aventura para salvar el Reino Champiñón.',
                'imagen' => 'super_mario_odyssey.jpg'
            ],
            [
                'id' => 7,
                'nombre' => 'Call of Duty: Modern Warfare II',
                'precio' => 59.99,
                'categoria' => 'Shooter',
                'descripcion' => 'Acción trepidante y combates modernos en el nuevo capítulo de la franquicia.',
                'imagen' => 'cod_mw2.jpg'
            ],
            [
                'id' => 8,
                'nombre' => 'Animal Crossing: New Horizons',
                'precio' => 54.99,
                'categoria' => 'Simulación',
                'descripcion' => 'Crea y personaliza tu isla paradisíaca en este relajante simulador de vida.',
                'imagen' => 'animal_crossing.jpg'
            ]
        
    ];
}
/**
 * Esta función devuelve la cadena html de salida de una lista de productos que se pasa en productos
 */
function getProductosMarkup($productos){
    
    $output = '';
    $output .= '<table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th scope="col">&nbsp;</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>';
    foreach($productos as $producto){
        $output.='<tr>';
        //imagen
        $srcImg = file_exists('./resources/img/'.$producto['imagen'])?'./resources/img/'.$producto['imagen']:'./resources/img/portada_generica.jpg';
        $output.='<td><img width="50" src="'.$srcImg.'" /></td>';
        //nombre
        $output.='<td>'.($producto['nombre']??'<em>S.N</em>').'</td>';
        //precio
        $output.='<td>'.($producto['precio'].'$'??'<em>S.P</em>').'</td>';
        //cantidad
        $output.='<td>
            <div class="input-group">
                <input type="number" class="form-control" min="0" max="10" value="0" name="productos['.$producto['id'].']">                        
            </div></td>';
        //input control
        $output.='</tr>';
    }
    $output.='</tbody></table>';
    return $output;
}
/**
 * Función que obtiene los datos del carrito de la sesión
 */
function getCarritoData(){
    return $_SESSION['carrito']??[];
}
/**
 * Función que establece los datos del carrito en la sesión
 */
function setCarritoDataInSession($carrito){
    $_SESSION['carrito'] = $carrito;
}

/**Calcula el precio total de los productos en el carrito */
function getTotalPrice($carritoData, $productosData){
    $productosData = array_combine(array_column($productosData,'id'),$productosData);
    $price = 0;
    foreach($carritoData as $claveProducto => $numeroProducto){
        $price+=$numeroProducto* $productosData[$claveProducto]['precio'];
    }
    
    return $price;
}
/**
 * Esta función devuelve los artículos que hay en el carrito, de acuerdo a lo que se reciba en post.
 */
function setCarritoDataFromForm(&$carritoData){
    $productosEstablecidos = filter_input(INPUT_POST, 'productos', FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);
    if(isset($productosEstablecidos)&&(!empty($productosEstablecidos))){
        $carritoData = array_filter($productosEstablecidos, function ($valor,$clave){
            return ($valor>0);
        }, ARRAY_FILTER_USE_BOTH );
    }
}

/**
 * Si hay productos añadidos al carrito, se incluyen en él.
 */
function getProductosAnadidos(&$carritoData){
    $productosAnadidos = filter_input(INPUT_POST, 'productos', FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);
    if(isset($productosAnadidos)&&(!empty($productosAnadidos))){
        foreach($productosAnadidos as $idProductoAnadido => $cantidadProductoAnadido){
            if($cantidadProductoAnadido !=0){
                if(!isset($carritoData[$idProductoAnadido])){
                    $carritoData[$idProductoAnadido] = $cantidadProductoAnadido;
                }else{
                    $carritoData[$idProductoAnadido] += $cantidadProductoAnadido;
                }
            }
        }
    }
}
/**
 * Pinta el carrito a partir de los datos de carritoData
 */
function getCarritoMarkup($carritoData, $productosData){
    
    $productosData = array_combine(array_column($productosData,'id'),$productosData);
    
    if(empty($carritoData)){
        return '<p>El carrito está vacío.</p>';
    }
    $output = '<ul class="list-group mb-3">';
    
    foreach($carritoData as $carritoItemId => $cantidadItem){
        $output .= '<li class="list-group-item d-flex justify-content-between lh-sm">';
        $output .= '<div><h6 class="my-0">'.$productosData[$carritoItemId]['nombre'].'</h6><small class="text-muted">'.$productosData[$carritoItemId]['precio'].' $</small></div>';
        //El input de control de cantidad
        $output .= '<div><div class="input-group">
                <input type="number" class="form-control input-cantidad" min="0" max="10" value="'.$cantidadItem.'" name="productos['.$carritoItemId.']">                        
            </div></div>';
        //El precio del conjunto ese
        $output .= '<div class="precioTotalItem">'.($cantidadItem*$productosData[$carritoItemId]['precio']).'$</div>';
                            
                            /*<span class="text-muted">$12</span>*/
        $output .= '</li>';
    }
    
    $output .= '</ul>';
    $output .= '<div class="mb-3"><strong>Total: </strong>'.getTotalPrice($carritoData, $productosData).'$</div>';
    
    return $output;
    
    
}

function getNumeroProductosCarrito($carritoData){
    $num = 0;
    foreach($carritoData as $numeroProducto){
        $num+=$numeroProducto;
    }
    return ($num!=0) ? $num : '';
}
/**
 * Función para debuguear 
 * 
 * @param $var la variable a debuguear.
 * @return La cadena que será impresa.
*/

function dump($var){
    echo '<pre>'.print_r($var, true).'</pre>';
}