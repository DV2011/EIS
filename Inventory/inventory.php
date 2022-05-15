<?php
include_once('../Database/config.php');
session_start();
$sql = "SELECT * FROM inventory";
$result = $mysqli->query($sql);
$rows = [];
if ($result) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}
//check session status
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    $message =  $_SESSION['status'];
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['status']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../assets/css/font.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="navbar-brand" href="home.php">Hanu Library</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-table"></i> Inventory</a>
                </li>
            </ul>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link disabled"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['username']; ?></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../User/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="border-bottom mt-3 mb-2 pb-3">Book List</h1>
        <a class="btn btn-primary mt-3 mb-2" href="create.php"><i class="fas fa-plus-circle"></i> Create new book</a>
        <table class="table table-striped" id="books">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Classify</th>
                    <th>Author</th>
                    <th>Publication Date</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                <?php if (count($rows) == 0) : ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No records</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['isbn'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['classify'] ?></td>
                            <td><?php echo $row['author'] ?></td>
                            <td><?php echo $row['publication_date'] ?></td>
                            <td>
                                <a class="btn btn-info" href="view.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" onclick="return confirmation(<?php echo $row['id'] ?>)"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        //data table plug-in
        $(function() {
            $('#books').DataTable();
        });
        //Delete confirmation
        function confirmation(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    location.href = "delete.php?id=" + id
                }

            })
        }
    </script>
</body>

</html>