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
            <?php
                if(isset($_SESSION["uzytkownikemail"])){
            ?>
            <section class="background-radial-gradient overflow-hidden h-100">
            <div class="container px-4 py-2 px-md-5 text-center text-lg-start my-5">
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
                      <form action="../controller/dodajstudenta.php" method="post" enctype="multipart/form-data">
                        <!-- 2 column grid layout with text inputs for the email and uid -->
                        <div class="row">
                          <div class="col-md-4 mb-4">
                            <div class="form-outline">
                              <input type="text" name="imie" class="form-control" placeholder="Jan"/>
                              <label class="form-label" style="color: rgb(232, 54, 54);">Imię</label>
                            </div>
                          </div>
                          <div class="col-md-4 mb-4">
                            <div class="form-outline">
                              <input type="text" name="nazwisko" class="form-control" placeholder="Kowalski"/>
                              <label class="form-label" style="color: rgb(232, 54, 54);">Nazwisko</label>
                            </div>
                          </div>
                          <div class="col-md-4 mb-2">
                            <select class="form-select" name="stanowisko"  aria-label="Default select example">
                              <option selected>-</option>
                              <option value="tester">Tester</option>
                              <option value="programista">Programista</option>
                              <option value="kierownik">Kierownik</option>
                              <option value="productowner">Product owner</option>
                            </select>
                            <label class="form-label select-label">Wybierz stanowisko</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <input type="text" name="email" class="form-control" placeholder="student@example.com"/>
                              <label class="form-label" style="color: rgb(232, 54, 54);">Email studenta</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-2">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="plec" id="mezczyzna" value="mezczyzna">
                              <label class="form-check-label" for="flexRadioDefault1" style="color: rgb(232, 54, 54);">
                                Mężczyzna
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="plec" id="kobieta" value="kobieta">
                              <label class="form-check-label" for="flexRadioDefault1" style="color: rgb(232, 54, 54);">
                                Kobieta
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 mb-2">
                            <div class="form-label">
                               
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="hobby[]" value="Sport" id="sport">
                              <label class="form-check-label" for="sport">
                                Sport
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="hobby[]" value="Kino" id="kino">
                              <label class="form-check-label" for="kino">
                                Kino
                              </label>
                            </div>
                            <div class="form-label" style="color: rgb(232, 54, 54);">
                              Hobby
                            </div>
                          </div>
                          <div class="col-md-2 mb-2">
                            <div class="form-label">
                               
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="hobby[]" value="Teatr" id="teatr">
                              <label class="form-check-label" for="teatr">
                                Teatr
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="hobby[]" value="Muzyka" id="muzyka">
                              <label class="form-check-label" for="muzyka">
                                Muzyka
                              </label>
                            </div>
                            <div class="form-label">
                               
                            </div>
                          </div>
                          <div class="col-md-2 mb-2">
                          </div>
                          <div class="col-md-6 mb-2">
                            <select class="form-select" name="jezykprogramowania"  aria-label="Default select example" multiple>
                              <option value="php">PHP</option>
                              <option value="java">Java</option>
                              <option value="c+">C++</option>
                              <option value="c#">C#</option>
                              <option value="python">Python</option>
                              <option value="javascript">JavaScript</option>
                            </select>
                            <label class="form-label select-label">Wybierz jęz. programowania</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-2">
                            <div class="form-group">
                              <textarea class="form-control" name="zainteresowania" id="zain" row-2></textarea>
                              <label for="zain">Opisz swoje zainteresowania</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-2">
                            <div class="mb-3">
                              <input class="form-control" type="file" name="CV" id="plik" disabled>
                              <label for="plik" class="form-label">Wyślij CV</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-4">
                            <button type="submit" name="submitstudent" class="btn btn-primary w-100">
                              Dodaj
                            </button>
                          </div>
                          <div class="col-md-4">
                            <button type="reset" name="wyczysc" class="btn btn-primary w-100">
                              Resetuj dane
                            </button>
                          </div>
                          <div class="col-md-2">
                          </div>
                        </div>
                        <div class="row text-end text-muted my-4">
                            <p>pola z podpisem zaznaczonym na czerwono są <b>wymagane</b></p>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
            <?php
                }else{
                    header("location: ../public/indexlogowanie.php");
                }
            ?>
    </body>
    <footer>

    </footer>
</html>