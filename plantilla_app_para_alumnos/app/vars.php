<?php

//Lista de los eventos asociados a los cursos que deben mostrarse y que podrán ser reservados. La clave de cada evento se corresponde con la clave primaria en la tabla de eventos, en caso de que estuviéramos obteniendo este array desde una base de datos, y por tanto se puede considerar única.
$events = array(
    342=> array(
        'name'=> 'UI Best practices',
        'date_timestamp' => 2086785000, //timestamp
        'duration' => 22, //In hours
        'price' => 120, //In dolars
        'category' => 'Web Design',
        'img_url' => './assets/images/event-01.jpg',
    ),
    343=> array(
        'name'=> 'New Design Trend',
        'date_timestamp' => 2087478000, //timestamp
        'duration' => 30, //In hours
        'price' => 320, //In dolars
        'category' => 'Front End',
        'img_url' => './assets/images/event-02.jpg',
    ),
    350=> array(
        'name'=> 'Web Programming',
        'date_timestamp' => 2088946800, //timestamp
        'duration' => 48, //In hours
        'price' => 440, //In dolars
        'category' => 'Full Stack',
        'img_url' => './assets/images/event-03.jpg',
    ),
);

//Lista de usuarios válidos, con sus claves válidas encriptadas. La clave del array es única para cada usuario de la plataforma, y sería la clave primaria de la tabla de usuarios, en caso de que estuviéramos obteniendo este array desde una base de datos.
//
$users = array(
    2 => array(
        'user_name' => 'Pedrito Navaja',
        'email' => 'pedrito@mail.com',
        'hashed_password' => '8459aeab2bc599f7cfcf6ec5720be81e27909a785a49d8fc49feff904bf90748', //hash en sha256 de pedrito
    ),
    6 => array(
        'user_name' => 'Juanito Alimaña',
        'email' => 'juanito@mail.com',
        'hashed_password' => '46b2150accc75b4ae7b461fe4f5dde39512d2e034ee4d91df9c09b9bd0e090c9',//hash en sha256 de juanito
    ),
);