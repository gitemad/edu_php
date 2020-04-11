<?php
    $connection = mysqli_connect("localhost", "root", "", "edu_db");
    $query = "SELECT * FROM comment_tbl";
    $data = mysqli_query($connection, $query);
    while ($record = mysqli_fetch_assoc($data)) {
        echo $record['id'].". ";
        echo filter_var($record['comment'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo "<br/>";
    }
    
if (isset($_POST['comment'])) {
//     $comment = trim(htmlentities($_POST['comment']));
    $comment = htmlspecialchars($_POST['comment']);

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