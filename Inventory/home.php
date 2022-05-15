<?php
include_once("../User/auth_session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {
            display: none;
        }

        @font-face {
            font-family: "BeVietnamPro-Medium";
            src: url(../assets/fonts/BeVietnamPro-Medium.tff);
        }

        h1 {
            text-align: center;
            font-family: "BeVietnamPro-Medium";
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="navbar-brand" href="#">Hanu Library</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="inventory.php"><i class="fas fa-table"></i> Inventory</a>
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
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <div class="w3-content w3-section">
            <img class="mySlides w3-animate-fading img-fluid" src="../assets/images/lib.jpg">
            <img class="mySlides w3-animate-opacity img-fluid" src="../assets/images/hoinghibanhoc.jpeg">
            <img class="mySlides w3-animate-left img-fluid" src="../assets/images/club.jpeg">
            <img class="mySlides w3-animate-right img-fluid" src="../assets/images/noel_lib.jpeg">
            <img class="mySlides w3-animate-zoom img-fluid" src="../assets/images/60_nam.jpeg">
        </div>
    </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }
    </script>
</body>

</html>