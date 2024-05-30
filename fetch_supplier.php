<?php
// Include database connection
include("cusconnection.php");

// Check if productName is set and not empty
if (isset($_GET['productName']) && !empty($_GET['productName'])) {
    // Get the product name from the GET request
    $productName = $_GET['productName'];

    // Query to fetch supplier name based on the selected product
    $query = "SELECT whosupply FROM pro WHERE pname = ?";
    
    // Prepare and execute the statement
    $statement = $connection->prepare($query);
    $statement->bind_param("s", $productName);
    $statement->execute();

    // Bind the result variables
    $statement->bind_result($supplierName);

    // Fetch the result
    $statement->fetch();

    // Close the statement
    $statement->close();

    // Return the supplier name
    echo $supplierName;
} else {
    // If productName is not set or empty, return an error message
    echo "Error: Product name not provided.";
}
?>
