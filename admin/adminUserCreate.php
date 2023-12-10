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



<div class="row ">
  <?php require_once 'aSide.php'  ?>


<div class="col-md-8">

    <div class="d-flex justify-content-center align-items-center container ">

              <form  name="form" id="form" action="../include/admIncludeUser.php" method="post">
                <i class="far fa-user"></i>
                   <h1 class="re h3 mt-4 fw-normal text-muted">Зарегать юзера или админа</h1>

                     <div class="alert alert-danger mt-2" id="block"></div>

                <div class="form-floating  ">
             <input type="login" class="form-control mt-5 col-auto" id="login" name="login" >
             <label for="floatingInput">Login</label>
           </div>
           <div class="form-floating ">
             <input type="email" class="form-control" id="email" name="email" >
             <label for="floatingPassword">Email</label>
           </div>
           <div class="form-floating ">
             <input type="password" class="form-control" id="password" name="password" >
             <label for="floatingPassword">Password</label>
           </div>

           <div class="form-check">

             <input class="form-check-input"  type="checkbox"   id="admin"  name="admin"  >

             <label class="form-check-label" for="flexCheckDefault">
               Права администратора
             </label>
           </div>

           <button class="btn btn-lg btn-primary col-12 mt-5" id="but_regAdmin" name="but_regAdmin" type="submit">Регистрация</button>


                  <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                  if (strpos($fullUrl,"error=emptyinput") ==true){
                      echo "<p class='error'>Все поля должны быть заполнены</p>";
                      exit();
                  }
                  elseif (strpos($fullUrl,"?error=invalidlogin") ==true){
                      echo "<p class='error'>Поле Login  не может содержать символы</p>";
                      exit();
                  }
                  elseif (strpos($fullUrl,"error=invalidmail") ==true){
                      echo "<p class='error'>Введите корректный адрес почты</p>";
                      exit();
                  }
                  elseif (strpos($fullUrl,"error=logintaken") ==true){
                      echo "<p class='error'>Логин занят</p>";
                      exit();
                  }
                  elseif (strpos($fullUrl,"error=mailtaken") ==true){
                      echo "<p class='error'>Такая почта уже зарегистрирована</p>";
                      exit();
                  }
                  elseif (strpos($fullUrl,"error=logcountfalse") ==true){
                      echo "<p class='error'>Логин должен быть больше пяти символов</p>";
                      exit();
                  }
                  elseif (strpos($fullUrl,"error=pascountfalse") ==true){
                      echo "<p class='error'>Пароль должен быть больше пяти символов</p>";
                      exit();
                  }
                  elseif (strpos($fullUrl,"error=none") ==true){
                      echo "<p class='good'>Вы зарегистрированы</p>";
                      exit();
                  }

                  ?>
           <p class="podv mt-5  text-muted">© 2020–2022</p>
              </form>

  </div>
</div>

</div>

</body>
</html>
