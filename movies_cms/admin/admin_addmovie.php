<?php

require_once '../load.php';
confirm_logged_in();

$genre_table = 'tbl_genre';
$genres = getAll($genre_table);

if(isset($_POST['submit'])) {
    $movie = array(
        'cover'  =>$_FILES['cover'],
        'title'  =>trim($_POST['title']),
        'year'   =>trim($_POST['year']),
        'run'    =>trim($_POST['run']),
        'story'  =>trim($_POST['story']),
        'trailer'=>trim($_POST['trailer']),
        'release'=>trim($_POST['release']),
        'genre'  =>trim($_POST['genList']),
    );

    $result = addMovie($movie);
    $mesage = $result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
</head>
<body>

<?php echo !empty($message) ? $message : ''; ?>
<form action="admin_addmovie.php" method ="post" enctype="multipart/form-data"> <!-- have to add enctype when using file upload - otherwise won't transfer to server-->
    <label>Cover Image:</label>
    <input type="file" name="cover" value=""><br></br>

    <label>Movie Title:</label>
    <input type="text" name="title" value=""><br></br>

    <label>Movie Year:</label>
    <input type="text" name="year" value=""><br></br>

    <label>Movie Runtime:</label>
    <input type="text" name="run" value=""><br></br>

    <label>Movie Release:</label>
    <input type="text" name="release" value=""><br></br>

    <label>Movie Trailer:</label>
    <input type="text" name="trailer" value=""><br></br>

    <label>Movie Storyline:</label>
    <textarea name="story"></textarea><br></br>

    <label>Movie Genre:</label>
    <select name="genList">
        <option>Please select a movie genre</option>
        <?php while($row = $genres->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $row['genre_id']?>"><?php echo $row['genre_name'];?></option>
        <?php endwhile;?>
    </select>
    <br></br>
    <button type="submit" name="submit">Add Movie</button>
</form>
    

</body>
</html>