<html>
	<body>
		<form action="login.php">
			<input type="text" name="username">
			<br/>
			<select name="birth">
				<?php 
				    for ($i = 1299; $i < 1400; $i++) {
				        echo "<option ";
				        if ($i == 1375) {
				            echo "selected"; 
				        }
				        echo "> $i";
				        echo "</option>";
				    }
				            
				?>
			</select>
		</form>
	</body>
</html>