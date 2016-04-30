<html>
<head>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		
		$dbname = "myDBA"
 

		// sql to create table
		 $sql = "CREATE TABLE MyGuests (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		reg_date TIMESTAMP
		)";

		if ($conn->query($sql) === TRUE) {
		    echo "Table MyGuests created successfully";
		} else {
		    echo "Error creating table: " . $conn->error;
		}

		$sql = "INSERT INTO MyGuests (firstname, lastname, email)
		VALUES ('John', 'Doe', 'john@example.com')";

		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql = "SELECT id, firstname, lastname FROM MyGuests";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		    }
		} else {
		    echo "0 results";
		}



		$conn->close();
	?>