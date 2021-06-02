<?php
include_once "../vendor/autoload.php";
use databases\Database;


$database = new Database();
$conn = $database->connect();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $newCategoryName = $_POST["categoryName"];
    $newCategoryCode = $_POST["categoryCode"];

    $sql = "INSERT INTO `category`(`categoryCode`,`categoryName`) VALUE (:categoryCode , :categoryName)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":categoryName", $newCategoryName);
    $stmt->bindParam(":categoryCode", $newCategoryCode);

    $stmt->execute();
}
header("location: ../view/categoryView.php");


