<?php session_start();
include 'classes/DbhClass.php';
include 'classes/AddCartModel.php';

    $dellProd = new AddCartModel();
    $dellProd->delProd();


    $addCart = new AddCartModel();
    $addCart->addToBasket();

?>

<!DOCTYPE html>
<html lang="ru" >
<head>
    <!-- Бутстрап цсс -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='css1/style.css'>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>WoW книги </title>
</head>


<body>

    <div class="container marketing">

    <div class="col-md-12">


        <h2>Section title</h2>
        <!-- col-md-6 -->
        <div class="us  table-responsive">
            <table class="striped">


            </table>
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Превью</th>
                    <th>Раздел</th>
                    <th>Цена</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tr>
                <tr>
                    <?php

                    $viewProd = new AddCartModel();
                    $products = $viewProd->viewProd();

                    ?>


                    <?php foreach ($products as $key) :?>
                <tr>
                    <td><img class="imProd" src="img/<?=$key['img'];?>"  alt="post"></td>

                    <td><?php echo $key['title'];?></td>
                    <td><?php echo $key['price'];?></td>
                    <td><?php ?><a href="productsBuy.php?deleteProd_id=<?=$key['id'];?>" class="btn btn-danger">Удалить</a></td>

                </tr>
                <?php endforeach; ?>
                <?php
//
//                $sum = array_sum(array_map(function($product_row) {
//                    return $product_row['price'];
//                }, $cartUser));
//
//                print_r($sum);

                ?>

                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Бутстрап javaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>
</html>
