<?php
    $connection = mysqli_connect("localhost", "root", "", "edu_db");
    if (isset($_GET['id'])) {
        $id = addslashes($_GET['id']);;
        $query = "SELECT * FROM comment_tbl WHERE id='$id'";
    } else {
        $query = "SELECT * FROM comment_tbl";        
    }
    $data = mysqli_query($connection, $query);
    while ($record = mysqli_fetch_assoc($data)) {
        echo "<pre>". $record['id'].". ";
        echo stripslashes(filter_var($record['comment'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        echo "</pre> <br/>";
    }
    
if (isset($_POST['comment'])) {
//     $comment = trim(htmlentities($_POST['comment']));
    $comment = htmlspecialchars(addslashes($_POST['comment']));

    $query = "INSERT INTO comment_tbl (comment) VALUES ('$comment')";
    mysqli_query($connection, $query);
}
?>

<html>
    <body>
    	<form method="post">
    		<textarea name="comment"></textarea>
    		<br/>
    		<input type="submit">
    	</form>
	</body>
</html>