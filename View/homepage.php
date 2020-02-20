<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Price Calculator</title>
</head>
<body>
    <?php require 'includes/header.php'?>
    <br><br>

    <form class="text-center" method="POST">
        <?php require "includes/custprod.php"?>
    </form>

<!-- Login form, not implementing
    <form method="POST">
        <?php /*require 'includes/login.php' */?>
    </form>-->
    <br>
    <div class="container border border-dark">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){require 'includes/display.php';} ?>
    </div>

    <?php require 'includes/footer.php'?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>