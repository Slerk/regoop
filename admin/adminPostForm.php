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
<!-- Верхняя менюшка -->


<div class="row ">
  <?php require_once 'aSide.php'  ?>



<div class="col-md-8">

    <div class="d-flex justify-content-center align-items-center container ">

              <form  class="col-8"  name="formPost" id="formPost" action="../include/admPostinclude.php" method="post" enctype="multipart/form-data" >
                <div class="icon">
                <i class="fas fa-clone"></i>
              </div>
                <!-- <i class="far fa-user"></i> -->
                <div class="zag" >
                   <h1 class="re h3 mt-4 fw-normal text-muted">Создать пост</h1>
                  </div>
                     <div type="text" class="alert alert-danger mt-2" id="block"></div>

                <div class="form-floating  ">
             <input  type="text" name="title" class="form-control mt-5 col-auto" id="title" placeholder="title">
             <label for="floatingInput">Заглавие</label>
           </div>

           <div class="input-group">
             <span class="input-group-text">With textarea</span>
             <textarea type="text" name="content" class="form-control" id="content"  aria-label="With textarea"></textarea>
           </div>

           <div class="input-group">
             <input name="img" type="file" class="form-control" id="img" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
<!--             <button class="btn btn-outline-secondary" type="button" id="but_img">Button</button>-->
           </div>

  <div class="form-floating  ">
             <input  type="text" name="price" class="form-control mt-5 col-auto" id="price" placeholder="price">
             <label for="floatingInput">Цена</label>
           </div>

           <select name="topic" id="topic" class="form-select mb-2" aria-label="Default select example">
             <option selected>Выберите категорию</option>

                    <?php $s = new AdminPostCreateModel();
                            $s->infoSelect();

                    ?>


           </select>


           <button class="btn btn-lg btn-primary col-12 mt-5" id="but_post" name="but_post" type="submit">Создать</button>



           <p class="podv mt-5  text-muted">© 2020–2021</p>
              </form>


  </div>
</div>

</div>


<!-- Бутстрап javaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
