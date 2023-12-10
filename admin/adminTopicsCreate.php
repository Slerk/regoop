<?php session_start();

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

              <form  name="formTop" id="formTop" action="../include/adminIncludeTopic.php" method="post">
                <i class="fas fa-clone"></i>
                <!-- <i class="far fa-user"></i> -->
                   <h1 class="re h3 mt-4 fw-normal text-muted">Создать категорию</h1>

                     <div type="text" class="alert alert-danger mt-2" id="block"></div>

                <div class="form-floating  ">
             <input  class="form-control mt-5 col-auto" id="name_topic" name="name_topic" placeholder="name_topic">
             <label for="floatingInput">Категория</label>
           </div>



           <button class="btn btn-lg btn-primary col-12 mt-5" id="but_topic" name="but_topic" type="submit">Создать</button>



           <p class="podv mt-5  text-muted">© 2020–2021</p>
              </form>

  </div>
</div>

</div>

<!-- Бутстрап javaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>
</html> -->
