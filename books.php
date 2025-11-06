<?php
// Database connection settings
$servername = "mi-linux.wlv.ac.uk";
$username = "2449059";  // your MySQL username
$password = "m3428c";  // your MySQL password
$dbname = "db2449059";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve books data
$sql = "SELECT Book_name, Genre, Price, Date_of_release FROM books";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Start table
    echo "<table border='1'>
            <tr>
                <th>Book Name</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Date of Release</th>
            </tr>";
    // Output each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Book_name"] . "</td>
                <td>" . $row["Genre"] . "</td>
                <td>£" . number_format($row["Price"], 2) . "</td>
                <td>" . $row["Date_of_release"] . "</td>
              </tr>";
    }
    // Close table
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
