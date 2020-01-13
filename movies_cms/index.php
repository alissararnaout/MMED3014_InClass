<?php  # making sure to load the database and connection
require_once 'config/database.php';
require_once 'admin/scripts/read.php';

$movie_table = 'tbl_movies';
$getMovies = getAll($movie_table);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the Movie CMS!</title>
</head>
<body>
    
    <?php while($row = $getMovies->Fetch(PDO::FETCH_ASSOC)):?>
    <div class="movie-item">
        <img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title'];?>">
        <h2><?php echo $row['movies_title'];?></h2>
        <h4>Movie Released: <?php echo $row['movies_year'];?></h4>
    </div>
    <?php endwhile;?>
</body>
</html>