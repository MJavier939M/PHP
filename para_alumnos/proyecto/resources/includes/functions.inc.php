<?php

function getMovies($credenciales){
		
	//TO DO: Está función debe conectar a la base de datos, y traer todos las películas

	try {
		$dbname = trim($credenciales['database'],"'");

		$conn = new PDO("mysql:host={$credenciales['host']};dbname={$dbname}", trim($credenciales['username'],"'"), trim($credenciales['password'],"'"));
		$stmt = $conn->prepare("SELECT * FROM movies");
		$stmt->execute();

		$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $movies;

	}catch(PDOException $e) {
		header("Location: error.html");
	}

}

function getMovie($credenciales, $id){
	//TO DO: Está función debe conectar a la base de datos, y traer los datos de la película con $id
	try {
		$dbname = trim($credenciales['database'],"'");

		$conn = new PDO("mysql:host={$credenciales['host']};dbname={$dbname}", trim($credenciales['username'],"'"), trim($credenciales['password'],"'"));
		$stmt = $conn->prepare("SELECT * FROM movies where id=:id");
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();

		$movie = $stmt->fetch(PDO::FETCH_ASSOC);

		return $movie;
	}catch(PDOException $e) {
		header("Location: error.html");
	}
	
	
}



function getMoviesMarkup($movies){

	$output = '<div  class="slick-multiItemSlider">';

	foreach ($movies as $movie) {
		
	    		$output .= '<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="./resources/images/uploads/'.$movie['image_path'].'" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<h6><a href="update.php?id='.$movie['id'].'">'.$movie['title'].'</a></h6>
	    				<p><i class="ion-android-star"></i><span>'.$movie['rating'].'</span> /10</p>
	    			</div>
	    		</div>';
	}
	$output .= "</div>";

	return $output;
}
function getMovieFormMarkup($movie){

	return '<form action="./update.php?id='.$movie['id'].'" method="post">
                    <input type="text" name="title" class="title" value="'.$movie['title'].'">
					    <div class="movie-rate">
						    <div class="rate">
							    <i class="ion-android-star"></i>
							    <p><span>'.$movie['rating'].'</span><br>
								
							    </p>
						    </div>
					    </div>
					    <div class="movie-tabs">
					    	<div class="tabs">
					    		<ul class="tab-links tabs-mv">
					    			<li class="active"><a href="#overview">Description</a></li>
							    </ul>
						        <div class="tab-content">
						            <div id="overview" class="tab active">
						                <div class="row">
						             	    <div class="col-md-8 col-sm-12 col-xs-12">
						            		    <textarea name="description" class="description">'.$movie['description'].'</textarea>
                                                <p><button value="valor" type="submit" class="btn">Actualizar</button></p>
						            	</div>
						            </div>
						        </div>
						    </div>
						</div>
					</div>
                </form>';
}
function dump($vars){
	echo '<pre>'.print_r($vars,true).'</pre>';
}