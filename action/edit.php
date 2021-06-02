<?php
include_once "../vendor/autoload.php";

use databases\Database;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $conn = $database->connect();

    $id = $_POST["id"];
    $newCategoryName = $_POST["categoryName"];
    $newCategoryCode = $_POST["categoryCode"];

    $sql = "UPDATE `category` SET `categoryCode` = :code , `categoryName` = :name WHERE `categoryCode` = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":code", $newCategoryCode);
    $stmt->bindParam(":name", $newCategoryName);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}
header("location: ../view/categoryView.php");