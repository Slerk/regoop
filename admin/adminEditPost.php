<?php session_start();
require '../classes/DbhClass.php';
include '../classes/AdminPostCreateModel.php';

?>

<!DOCTYPE html>
<html lang="ru" >
  <head>
    <!-- Бутстрап цсс -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='../css1/style.css'>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>WoW книги </title>
  </head>


<body>


<div class="row ">
  <?php require_once 'aSide.php'  ?>



<div class="col-md-8">

    <div class="d-flex justify-content-center align-items-center container ">

              <form enctype="multipart/form-data" class="col-8"  name="formEdit" id="formEdit" action="../include/adminIncludePostEdit.php" method="post" >
                <div class="icon">
                <i class="fas fa-clone"></i>
              </div>
                <!-- <i class="far fa-user"></i> -->
                <div class="zag" >
                   <h1 class="re h3 mt-4 fw-normal text-muted">Редактировать пост</h1>
                  </div>

                  <?php

                  $viewPostEdit = new AdminPostCreateModel();
                  $viewPostEdit->getParamPost();

                  ?>

  <div class="input-group">
             <input   name="img" type="file" class="form-control" id="img" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
             <button class="btn btn-outline-secondary" type="button" id="but_img">Button</button>
           </div>

           <select name="topic" id="topic" class="form-select mb-2" aria-label="Default select example">

               <?php

               $opt = new AdminPostCreateModel();
               $opt->infoSelect();

               ?>

           </select>

           <button class="btn btn-lg btn-primary col-12 mt-5" name="edit_post"  type="submit">Сохранить</button>

           <p class="podv mt-5  text-muted">© 2020–2021</p>
              </form>

  </div>
</div>

</div>

<!-- Бутстрап javaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>
</html>
