<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>prodects</title>
</head>

<body>
    <h2>

        <?php echo $title ?>

    </h2>

    <ul>
        <?php foreach ($products as $key => $value) : ?>

            <li>
                  <!-- herf is some route in wep file -->
                <a href="/prodects/{category}/<?php echo $key ?>"> 
                
                <?php echo $value?>

                <?php endforeach ?>
                
            </li>

            <!-- <li>product 1 </li>
    <li>product 2</li>
    <li>product 3</li> -->
    </ul>
</body>

</html>