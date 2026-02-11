<?php include('layouts/header.php'); ?>

<style>
body {
background: linear-gradient(135deg, #000f2b 0%, #13576e 50%, #489bcf 100%);
background-attachment: fixed; /* Mantém o fundo estático ao rolar */
color: white; /* Garante legibilidade em fundos escuros [4] */
min-height: 100vh;
margin: 0;
display: flex;
align-items: center;
justify-content:center;
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.main-container {
    max-width: 400px; 
    width: 90%;
    padding: 30px;
    border: 2px solid rgba(255, 255, 255 0.2);
    border-radius: 10px;
    background: rgba(0, 0, 0, 0.2);
}

header, form{
   width: 100%;
   text-align:center;
}

.linha{
    border: 0;
    border-top: 1px dashed #ffffff; /* Ajustado para branco para aparecer no fundo azul */
    width: 100%;
    margin: 20px 0;
    opacity: 0.7;
}

.mb-3 {
    margin-bottom: 25px !important;
}


form label{
    font-size: 20px;
    display: block;
    text-align: center; /* Centraliza o texto do label */
    width: 100%;

}

.form-control {
    width: 100%;
    box-sizing: border-box; /* Evita que o padding "estoure" a largura */
    height: 40px;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    font-size: 18px;
    margin-top: 15px;
    cursor: pointer;
}


</style>



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
        <button type="submit" class="btn btn-success w-100">Descobrir</button>
    </div>

 </form>


 </div> <!--  fim div container-->
 </body>
