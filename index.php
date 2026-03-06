<?php  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Signos</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="container-fluid main-container d-flex flex-column align-items-center gap-3">   
  
<header class="text-center mb-4">
            <h1>Descubra seu signo:</h1>
        </header>
<hr class="linha">

 <form id="form-signo" method="POST" action="show_zodiac_sign.php">  
  
 <div class="mb-2">       
   <label for="data_nascimento" class="form-label">Data de Nascimento</label> <br>      
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"  required>   
  </div>   


  <div class="mt-4"> <!-- mt-4 adiciona margem superior no botão -->


    <button type="submit" class="btn btn-success w-100">
    <span id="texto-girar">Descobrir</span>
</button>

    </div>

 </form>


 </div> <!--  fim div container-->
 </body>
