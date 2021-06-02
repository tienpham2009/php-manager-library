<?php
include_once "../vendor/autoload.php";

use App\Category\Category;
use databases\Database;

$categoryCode = $_REQUEST["id"];
$database = new Database();
$conn = $database->connect();
$sql = "SELECT * FROM `category` WHERE `categoryCode` = :code";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":code", $categoryCode);
$stmt->execute();
$result = $stmt->fetchAll();

foreach ($result as $key => $item) {
    $category = new Category($item);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <title>Edit Category</title>
</head>
<body>
<form class="row g-3 needs-validation" novalidate action="../action/edit.php" method="post">
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label"> Category Code</label>
        <input type="text" class="form-control" id="validationCustom01" name="categoryCode"
               value="<?php echo $category->categoryCode ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="validationCustom02" name="categoryName"
               value="<?php echo $category->categoryName ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <input type="hidden" name="id" value="<?php echo $category->categoryCode ?>">
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Edit</button>
    </div>
    <div>
        <a href="../view/categoryView.php">
            <button class="btn btn-primary" type="submit">Exit</button>
        </a>
    </div>
</form>
<!--<form  action="../action/edit.php" method="post">-->
<!--    Category Name :-->
<!--    <input type="text" name="categoryName" value="--><?php //echo $category->categoryCode?><!--">-->
<!--    <br>-->
<!--    Category Code :-->
<!--    <input type="text" name="categoryCode" value="--><?php //echo $category->categoryName?><!--">-->
<!--    -->
<!--    <input type="submit" value="Edit">-->
<!--</form>-->
<!--<a href="../view/categoryView.php"><button>Exit</button></a>-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>

</body>
</html>
