<?php
include('connect.php');
// // Perform the database search based on the query
// $query = $_POST['query'];

// // Replace the following code with your actual database query logic
// // Here, we assume the result is an array of names retrieved from the database
// $result = [
//     'John Doe',
//     'Jane Smith',
//     'Robert Johnson',
//     'Lisa Thompson',
// ];

// // Filter the names based on the query
// $filteredResult = array_filter($result, function($name) use ($query) {
//     return strpos(strtolower($name), strtolower($query)) !== false;
// });

// // Return the filtered names as JSON response
// echo json_encode($filteredResult);

$name = $_POST['query'];
$comname = $_POST['comname'];

$sql = "SELECT `name` FROM `user` WHERE `community`='$comname' AND `name` LIKE '$name%'";
$result = $conn->query($sql);

// Fetch the names from the database
$names = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $names[] = $row['name'];
    }
}

// Return the names as JSON response
echo json_encode($names);

// Close the database connection
$conn->close();
?>
