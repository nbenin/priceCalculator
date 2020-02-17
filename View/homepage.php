<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Becode - Boiler plate MVC</title>
</head>
<body>


    <?php require 'includes/header.php'?>
    <section>
        <h4>Hello <?php echo $customer->getName() ?>,</h4>
        <h4>Hello <?php echo $customer->getGroupId() ?>,</h4>
        <p>Put your content here.</p>
    </section>
    <form method="POST">

        <?php require "includes/custprod.php"?>
    </form>
    <?php require 'includes/footer.php'?>
</body>
</html>