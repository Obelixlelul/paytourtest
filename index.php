<?php 

    date_default_timezone_set ("America/Recife");
    session_start();

    require 'vendor/autoload.php';


    if (isset($_SESSION['error'])){
        // var_dump($_SESSION['error']);
        foreach($_SESSION['error'] as $error){
            echo '
                <div class="alert alert-danger" role="alert">
                    '.$error.'
                </div>
            ';
        }
        unset($_SESSION['error']);
    }else if(isset($_SESSION['success'])){
        echo '
            <div class="alert alert-success" role="alert">
                Currículo enviado com sucesso!
            </div>
        ';
        unset($_SESSION['inputs']);
        unset($_SESSION['success']);
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
        <img class="mt-4" src="./Public/assets/logo-paytour.svg" >
        <p class="Light link">Teste para  processo seletivo</p>
        <?= $_GET['url'] ?? ''    ?>
    </div>
    <div style="width: 300px; margin: 0 auto;">
        
        <form method="POST" action="./Controller/formController.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label  class="form-label" >Nome</label>
                <input type="text" class="form-control" name="name" 
                id="exampleInputEmail1" aria-describedby="emailHelp" required
                value="<?=$_SESSION['inputs']['nome'] ?? "";?>"
                >
            </div>
            <div class="mb-3">
                <label  class="form-label" >Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required 
                value="<?=$_SESSION['inputs']['email'] ?? "";?>">
            </div>
            <div class="mb-3">
                <label  class="form-label" >Telefone</label>
                <input type="tel" class="form-control" id="exampleInputPhone" name="phone" aria-describedby="emailHelp" required
                value="<?=$_SESSION['inputs']['telefone'] ?? "";?>">
            </div>
            <div class="mb-3">
                <label class="form-label" >Cargo Desejado</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="companyPosition" required ><?=$_SESSION['inputs']['cargo'] ?? "";?></textarea>
            </div>

            <div class="mb-3">
            <label class="form-label" >Nível de escolaridade</label>
                <select class="form-select" aria-label="Default select example" name="education" required value="<?=$_SESSION['inputs']['escolaridade'] ?? "";?>">
                    <option value="fundamental">Fundamental</option>
                    <option value="médio">Médio</option>
                    <option value="superior">Superior</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="customFile" >Insira o seu currículo</label>
                <input type="file" class="form-control" id="customFile" name="file" accept=".pdf,.doc,.docx" required/>
            </div>

            <div class="mb-3">
                <label class="form-label">Observacoes</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observations"><?=$_SESSION['inputs']['observations'] ?? "";?></textarea>
            </div>

            <input type="hidden" id="custId" name="ip" value="<?= $_SERVER['REMOTE_ADDR']; ?>">
            <input type="hidden" id="custId" name="time" value="<?= date('Y-m-d H:i:s'); ?>">


            <button type="submit" class="btn btn-primary" style="background-color: #9548E4;">Enviar</button>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>