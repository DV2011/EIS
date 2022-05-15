<?php
include_once('../Database/config.php');
//Get data and display
$id = $_GET['id'];
$sql = "SELECT * FROM inventory WHERE id = $id";
$result = $mysqli->query($sql);
$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/font.css">
    <style>
    .wrapper {
        width: 600px;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="border-bottom mt-3 mb-2 pb-3">View Book Information</h1>

                    <div class="form-group">
                        <label for="isbn" class="fw-bold fs-4">ISBN</label>
                        <p class="fs-5"><?php echo $book['isbn']; ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="title" class="fw-bold fs-4">Title</label>
                        <p class="fs-5"><?php echo $book['title']; ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="classify" class="fw-bold fs-4">Classify</label>
                        <p class="fs-5"><?php echo $book['classify']; ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="author" class="fw-bold fs-4">Author</label>
                        <p class="fs-5"><?php echo $book['author']; ?> </p>
                    </div>

                    <div class="form-group">
                        <label for="publication_date" class="fw-bold fs-4">Publication Date</label>
                        <p class="fs-5"><?php echo $book['publication_date']; ?> </p>
                    </div>

                    <a class="btn btn-primary" href="inventory.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>