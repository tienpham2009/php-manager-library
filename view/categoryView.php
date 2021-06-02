<?php
include_once "../vendor/autoload.php";

use databases\Database;
use App\Category\Category;

$database = new Database();
$conn = $database->connect();
$sql = "SELECT * FROM `category`";
$stmt = $conn->query($sql);
$result = $stmt->fetchAll();
$categorys = [];

foreach ($result as $key => $item) {
    $category = new Category($item);
    $categorys[] = $category;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/myCss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Category</title>
</head>
<body>
<div>
    <a href="../Add/addCategory.php"><button type="button" class="btn btn-primary">Add new category</button></a>
    <a href="../index.php"><button type="button" class="btn btn-primary">Home Page</button></a>
</div>
<p></p>
<div>
    <table class="table table-success table-striped">
        <tr>
            <th>Category Code</th>
            <th>Category Name</th>
            <th></th>
        </tr>
        <?php foreach ($categorys as $key => $category): ?>
            <tr>
                <td><?php echo $category->categoryCode ?></td>
                <td><?php echo $category->categoryName ?></td>
                <td>
                    <a href="../Add/editCategory.php?id=<?php echo $category->categoryCode?>">
                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                    </a>
                    <a href="../action/deleteCategory.php?id=<?php echo $category->categoryCode?>">
                        <button onclick="return confirm('Are you sure ?')" type="button" class="btn btn-primary btn-sm" style="background: red">Delete</button>
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
