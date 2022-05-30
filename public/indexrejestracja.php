<?php
  session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../view/css/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
            <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="#">Studencik</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <?php
                      if(isset($_SESSION["uzytkownikemail"])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="indexdodajstudenta.php">Dodaj studenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="indexlistastudentow.php">Lista studentów</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="indexwyslijemail.php">Wyślij email</a>
                    </li>
                    <?php
                      }
                    ?>
                    </ul>
                      <ul class="navbar-nav  mb-2 mb-md-0">
                      <?php
                      if(isset($_SESSION["uzytkownikemail"])){
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Witaj, <?php echo $_SESSION["uzytkownikemail"]?></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="../controller/wyloguj.php">Wyloguj</a>
                        </li>
                      <?php 
                        } else{
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="indexlogowanie.php">Zaloguj</a>
                        </li>
                      <?php
                        }
                      ?>
                        </ul>
                </div>
            </nav>
            <section class="background-radial-gradient overflow-hidden h-100">
            <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
              <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                  <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Studencik <br />
                    <span style="color: hsl(218, 81%, 75%)">Apka do zarządzania studentami</span>
                  </h1>
                  <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Stworzona przez: Jakub Kowalski
                  </p>
                </div>
          
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                  <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                  <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
          
                  <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                      <form action="../controller/rejestracja.php" method="post">
                        <!-- 2 column grid layout with text inputs for the email and uid -->
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <input type="text" name="uid" class="form-control" />
                              <label class="form-label">Nazwa użytkownika</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <input type="text" name="email" class="form-control" />
                              <label class="form-label">Adres email</label>
                            </div>
                          </div>
                        </div>
          
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                          <input type="password" name="haslo" class="form-control" />
                          <label class="form-label">Hasło</label>
                        </div>

                        <!-- Password repeat input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="powtorzHaslo" class="form-control" />
                            <label class="form-label">Powtórz hasło</label>
                          </div>
          
                        <!-- Submit buttons -->
                        <?php
                          if(isset($_SESSION["uzytkownikemail"])){
                        ?>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block mb-4 w-100" disabled>
                                    Zarejestruj się
                                  </button>
                            </div>
                            <div class="col-md-6 mb-4">
                                <a class="btn btn-lg btn-primary btn-block mb-4 w-100 disabled" href="indexlogowanie.php">
                                    Posiadasz konto?
                                </a>
                            </div>
                        </div>
                        <?php
                          }else{
                        ?>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <button type="submit" name="submitrejestracja" class="btn btn-lg btn-primary btn-block mb-4 w-100">
                                    Zarejestruj się
                                  </button>
                            </div>
                            <div class="col-md-6 mb-4">
                                <a class="btn btn-lg btn-primary btn-block mb-4 w-100" href="indexlogowanie.php">
                                    Posiadasz konto?
                                </a>
                            </div>
                        </div>
                        <?php
                          } 
                        ?> 
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


    </body>
    <footer>

    </footer>
</html>