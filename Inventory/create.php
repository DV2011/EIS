<?php
include_once('../Database/config.php');
session_start();
// When form submitted, insert values into the database.
if (isset($_POST['save'])) {
    $ISBN = $_POST['isbn'];
    $title = $_POST['title'];
    $classify = $_POST['classify'];
    $author = $_POST['author'];
    $publication_date = $_POST['publication_date'];

    $sql = "INSERT INTO inventory(isbn, title, classify, author, publication_date) VALUES ('$ISBN', '$title', '$classify', '$author', '$publication_date')";
    $result = $mysqli->query($sql);
    //create status session
    if ($result) {
        $_SESSION['status'] = "Create successfully.";
        header('location: inventory.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/font.css">
    <style>
        .error {
            color: red;
        }

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
                    <h1 class="border-bottom mt-3 mb-2 pb-3">Create Book</h1>

                    <form method="POST" action="#">
                        <div class="form-group">
                            <label class="fw-bold fs-5" for="isbn">ISBN</label>
                            <input class="form-control" id="isbn" name="isbn" />
                            <p class="error" id="error-isbn"></p>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold fs-5" for="title">Title</label>
                            <input class="form-control" id="title" name="title" />
                            <p class="error" id="error-title"></p>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold fs-5" for="classify">Classify</label>
                            <input class="form-control" id="classify" name="classify" />
                            <p class="error" id="error-classify"></p>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold fs-5" for="author">Author</label>
                            <input class="form-control" id="author" name="author" />
                            <p class="error" id="error-author"></p>
                        </div>

                        <div class="form-group">
                            <label class="fw-bold fs-5" for="publication_date">Publication date</label>
                            <input class="form-control" id="publication_date" name="publication_date" type="date" />
                        </div>

                        <button type="submit" class="btn btn-primary mt-3" name="save">Save</button>
                        <a class="btn btn-primary mt-3" href="inventory.php">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        //check error when submit form
        $(function() {
            $("form").submit(function(e) {
                let isbn = $("[name='isbn']").val();
                let title = $("[name='title']").val();
                let classify = $("[name='classify']").val();
                let author = $("[name='author']").val();
                let publication_date = $("[name='pubication_date']").val();
                let hasError = false;
                if (isbn === "") {
                    e.preventDefault();
                    $("#error-isbn").text('Please input');
                    hasError = true;
                }

                if (title === "") {
                    e.preventDefault();
                    $("#error-title").text('Please input');
                    hasError = true;
                }

                if (classify === "") {
                    e.preventDefault();
                    $("#error-classify").text('Please input');
                    hasError = true;
                }

                if (author === "") {
                    e.preventDefault();
                    $("#error-author").text('Please input');
                    hasError = true;
                }

                if (!hasError) {
                    //remove error then submit
                    $(this).unbind();
                    $(this).submit();
                }
            })
        })
    </script>
</body>

</html>