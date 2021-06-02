<?php
include_once "../vendor/autoload.php";
use databases\Database;

$categoryCode = $_REQUEST["id"];
$database = new Database();
$conn = $database->connect();

$sql = "DELETE FROM `category` WHERE `categoryCode` = :code";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":code", $categoryCode);

$stmt->execute();
header("location: ../view/categoryView.php");

