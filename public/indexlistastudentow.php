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
            <div class="h-100">
                       <!-- logika gołs hier -->
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">ID Studenta</th>
                              <th scope="col">Imię</th>
                              <th scope="col">Nazwisko</th>
                              <th scope="col">Stanowisko</th>
                              <th scope="col">Email</th>
                              <th scope="col">Płeć</th>
                              <th scope="col">Hobby</th>
                              <th scope="col">Ulub. Język</th>
                              <th scope="col">Zainteresowania</th>
                              <th></th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <form action="../model/edytujModel.php" method="post">
                            <?php
                              $nt=1;
                              include "../model/edytujModel.php";
                              $db = new edycja();
                              $lista = $db->view('studenci');
                              foreach ($lista as $key => $value){
                            ?>
                              <tr>
                                <th scope="row"><?php echo $value['student_id'];?></th>
                                <td><?php echo $value['student_imie']??'-';?></td>
                                <td><?php echo $value['student_nazwisko']??'-';?></td>
                                <td><?php echo $value['student_stanowisko']??'-';?></td>
                                <td><?php echo $value['student_email']??'-';?></td>
                                <td><?php echo $value['student_plec']??'-';?></td>
                                <td><?php echo $value['student_hobby']??'-';?></td>
                                <td><?php echo $value['student_jezykprogramowania']??'-';?></td>
                                <td><?php echo $value['student_zainteresowania']??'-';?></td>
                                <td>
                                <a href="indexedytuj.php?edit_id=<?php echo $value['student_id']; ?>" class="btn btn-small btn-primary btn-block mb-4 w-100" disabled>
                                    Edytuj
                                </a>
                              </td>
                              <td>
                              <a onclick="return confirm('Jesteś pewien, że chcesz usunąć wybrane dane? (Nie będzie można ich wrócić.')" href="?usun_id=<?php echo $value['student_id']; ?>" class="btn btn-small btn-primary btn-block mb-4 w-100" disabled>
                                    Usuń
                                </a>
                              </td>
                              <td>
                                <a href="indexwyslijemail.php?email_id=<?php echo $value['student_id']; ?>" class="btn btn-small btn-primary btn-block mb-4 w-100" disabled>
                                    Email
                                </a>
                              </tr>
                              </td>
                            <?php
                            }
                            ?>
                            <?php 
                            if(isset($_GET['usun_id'])){
                              $usunid = $_GET['usun_id'];
                              $tabela = "studenci";
                              $where = array(
                                "student_id" => $usunid
                              );
                              $usun = $db->delete($tabela,$where);
                              if($usun){
                                echo "<script>alert('Dane zosały usunięte.')</script>";
                                exit();
                              }else{
                                echo "<script>alert('Nie udało się usunąć.')</script>";
                              }
                              header("location: ../public/indexlistastudentow.php");
                              echo "<meta http-equiv='refresh' content='2, url='indexlistastudentow.php'>";
                            }
                            ?>
                            </tbody>
                            </table>
                            </form>
                            <?php
                            }else{
                            ?>
                            <p class="fs-1">Najpierw dodaj studentów</p>
                            </tbody>
                            </table>
                            <div class="text-end">
                                <a href="indexedytuj.php?edit_id=<?php echo $value['student_id']; ?>" class="btn btn-primary btn-block mb-4" disabled>
                                    Edytuj
                                </a>
                                <button type="submit" name="submitusun" class="btn btn-primary btn-block mb-4" disabled>
                                    Usuń
                                </button>
                                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4" disabled>
                                    Wyślij email
                                </button>
                            </div>
                            <?php
                              }
                            ?>
            </div>
            <?php
                if(!isset($_SESSION["uzytkownikemail"])){
                    header("location: ../public/indexlogowanie.php");
                }
            ?>
    </body>
    <footer>

    </footer>
</html>