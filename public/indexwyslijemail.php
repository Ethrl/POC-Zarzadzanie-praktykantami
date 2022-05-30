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
                        <a class="nav-link active" aria-current="page" href="indexdodajstudenta.php">Dodaj studetna</a>
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
                <div class="container pt-5">
                    <div class="container shadow p-3 mb-5 bg-body rounded w-75">
                      <div class="container">
                      <div class="row">
                        <div class="col-md-8" style="margin:0 auto; float:none;">
                        <p class="text-center fs-1">Wyślij email studentom</p>
                        <br />
                        <?php
                        include "../model/emailModel.php";
                        $db = new emailer();
                        if (isset($_GET['email_id'])) {
                          $id = $_GET['email_id'];
                          $where = array(
                            "student_id" => $id
                          );
                          $studentData = $db->selectWhere('studenci',$where);
                          foreach ($studentData as $key => $value) {
                        ?>
                        <form action="../controller/emailController.php" method="post">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Imie studenta:</label>
                                <input type="text" name="imie" placeholder="Jan" class="form-control" value="<?php echo $value['student_imie']; ?>" disabled/>
                              </div>
                                <div class="col-md-8">
                                  <label>Do:</label>
                                  <input type="text" name="email" class="form-control" placeholder="student@example.com" value="<?php echo $value['student_email']; ?>" />
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                          <label>Temat:</label>
                          <input type="text" name="temat" class="form-control" placeholder="Tu temat" />
                          </div>
                          <div class="form-group">
                          <label>Treść</label>
                          <textarea name="wiadomosc" class="form-control" placeholder="Tu treść"></textarea>
                          </div>
                          <div class="form-group">
                          <label>Plik</label>
                          <input type="file" name="plik" class="form-control" disabled>
                          </div>
                          <div class="form-group my-3 text-center">
                            <button type="submit" name="submitemail" class="btn btn-primary" disabled>
                              Wyślij email
                            </button>
                          </div>
                        </form>
                        <?php
                          }
                        }else{
                        ?>
                        <form action="../controller/emailController.php" method="post">
                        <div class="form-group">
                            <label>Do:</label>
                            <input type="text" name="email" class="form-control" placeholder="student@example.com" />
                          </div>
                          <div class="form-group">
                          <label>Temat:</label>
                          <input type="text" name="temat" class="form-control" placeholder="Tu temat" />
                          </div>
                          <div class="form-group">
                          <label>Treść:</label>
                          <textarea name="wiadomosc" class="form-control" placeholder="Tu treść"></textarea>
                          </div>
                          <div class="form-group">
                          <label>Plik</label>
                          <input type="file" name="plik" class="form-control" disabled>
                          </div>
                          <div class="form-group my-3 text-center">
                            <button type="submit" name="submitemail" class="btn btn-primary" disabled>
                              Wyślij email
                            </button>
                          </div>
                        </form>
                        <?php
                        }
                        ?>
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