<?php

  require "db.php";

    $objDb = new db();
    $link = $objDb->mysqlConnect();

        $selectSedes = "SELECT idSede,nome FROM sedes ORDER BY nome";
        $idSede = "idSede";
        $Nome= "nome";

        $RSelectSedes = mysqli_query($link,$selectSedes);

        $selectEnd = "SELECT idEndereco,cep FROM endereços ORDER BY cep";
        $idEndereco = "idEndereco";
        $CEP= "cep";

        $RSelectEnd = mysqli_query($link,$selectEnd);
        $RSelectEnd2 = mysqli_query($link,$selectEnd);
 ?>
 <!DOCTYPE html>
 <html lang="pt-br">
   <head>
         <!-- Meta tags Obrigatórias -->
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <!-- Bootstrap CSS -->
         <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

         <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
         <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
         <script type="text/javascript" src="js/bootstrap.min.js"></script>

         <title>Bate Volta | Logística</title>
         <link rel="shortcut icon" type="image/icon" href="src/icon.ico" />
     </head>
     <body>
           <div class="bg-info">
               <div class="container">
                   <nav class="navbar navbar-expand-lg navbar-dark bg-info">
                       <img style="padding-right: 25px; width: 155px;" src="src/logo.png"/>
                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                           <span class="navbar-toggler-icon"></span>
                       </button>
                       <div class="collapse navbar-collapse" id="navbarNavDropdown">
                           <ul class="navbar-nav">
                           <li class="nav-item">
                               <a class="nav-link" href="#">Rotas</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="#">Encomenda</a>
                           </li>
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Cadastrar
                               </a>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                               <a class="dropdown-item" href="#">Funcionario</a>
                               <a class="dropdown-item" href="#">Sede</a>
                               <a class="dropdown-item" href="#">Preço</a>
                               </div>
                           </li>
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Consultar
                               </a>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                               <a class="dropdown-item" href="#">Funcionario</a>
                               <a class="dropdown-item" href="#">Sede</a>
                               <a class="dropdown-item" href="#">Rotas</a>
                               <a class="dropdown-item" href="#">Encomenda</a>
                               </div>
                           </li>
                           </ul>
                       </div>
                   </nav>
               </div>
           </div>
         <div class="container">

                  <div class="col-md">
                    <br>
                    <h4 class="mb-3">Cadastro de Encomendas</h4>
                    <br>
                     <form class="needs-validation" action="cadastrar.php" method="post">
                     <fieldset>
                       <div class="row g-5">
                                 <div class="col-sm-6">
                                   <a class="my-4">Codigo de Rastreio:</a><br>
                                   <input class="form-control" placeholder="--------------" type="text" name="codRastreio"><br>
                                 </div>
                                 <div class="col-sm-6">
                                   <a class="my-4">Peso:</a><br>
                                   <input class="form-control" placeholder="--------------" type="text" name="peso"><br>
                                 </div>
                                 <div class="col-sm-6">
                                   <a class="my-4">Comprimento:</a><br>
                                   <input class="form-control" placeholder="--------------" type="text" name="comprimento"><br>
                                 </div>
                                 <div class="col-sm-6">
                                   <a class="my-4">Largura:</a><br>
                                   <input class="form-control" placeholder="--------------" type="text" name="largura"><br>
                                 </div>
                                 <div class="col-sm-6">
                                   <a class="my-4">Altura:</a><br>
                                   <input class="form-control" placeholder="--------------" type="text" name="altura"><br>
                                 </div>
                                 <div class="col-sm-6">
                                   <a class="my-4">Volume:</a><br>
                                   <input class="form-control" placeholder="--------------" type="text" name="volume"><br>
                                 </div>
                       </div>

                               <!-- Calculo do frete
                                    Fazer form separado-->
                               <div class="row g-5">
                                 <div class="col-sm-9">
                                   <a class="my-4">Valor Entrega:</a><br>
                                   <input class="form-control" placeholder="--------------" type="text" name="valorEntrega"><br>
                                 </div>

                                 <div class="col-sm-3">
                                    <br>
                                    <input class="w-100 btn btn-primary btn-info" type="" value="Calcular"><br>
                                 </div>

                               </div>


                               <a class="my-4">Data Postagem:</a><br>
                               <input class="form-control" type="datetime-local" name="dataPostagem"><br>

                               <div class="">
                                 <a class="my-4">Endereço de Remetente:</a><br>
                                 <select class="form-control" name="idEndereco1" id="remetente">
                                             <option>Escolha...</option>
                                             <?php while ($result = mysqli_fetch_array($RSelectEnd)) {?>
                                               <option value="<?php echo $result[$idEndereco]?>">
                                                 <?php echo $result[$CEP]?>
                                               </option>
                                             <?php }?>
                                 </select><br>
                               </div>

                               <div class="">
                                 <a class="my-4">Endereço de Destino:</a><br>
                                 <select class="form-control" name="idEndereco2" id="destino">
                                         <option>Escolha...</option>
                                         <?php while ($result = mysqli_fetch_array($RSelectEnd2)) {?>
                                           <option value="<?php echo $result[$idEndereco]?>">
                                             <?php echo $result[$CEP]?>
                                           </option>
                                         <?php }?>
                                 </select><br>
                               </div>

                               <div class="">
                                 <a class="my-4">Endereço da Sede:</a><br>
                                   <select class="form-control" name="idSede" id="sede">
                                           <option>Escolha...</option>
                                           <?php while ($result = mysqli_fetch_array($RSelectSedes)) {?>
                                             <option value="<?php echo $result[$idSede]?>">
                                               <?php echo $result[$Nome]?>
                                             </option>
                                           <?php }?>
                                   </select>
                               </div><br>

                               <input class="w-100 btn btn-primary btn-info" type="submit" value="Cadastrar"><br><br>
                     </fieldset>
                     </form>

                  </div>

         </div>
         <footer style="" class="navbar-fixed-bottom text-white bg-info text-center">
             <div style="padding: 20px 0px 20px 0px;" class="container">
               <p>Desenvolvidor por <a href="https://getbootstrap.com/">##</a></p>
             </div>
         </footer>
     </body>
 </html>
