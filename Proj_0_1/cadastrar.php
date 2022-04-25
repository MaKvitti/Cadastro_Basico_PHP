<?php


    require('db.php');

    $codRastreio = $_POST['codRastreio'];
    $peso = $_POST['peso'];
    $comprimento  =$_POST['comprimento'];
    $largura = $_POST['largura'];
    $altura = $_POST['altura'];
    $volume = $_POST['volume'];
    $valorEntrega = $_POST['valorEntrega'];
    $dataPostagem = $_POST['dataPostagem'];
    $idEndereco1 = $_POST['idEndereco1'];
    $idEndereco2 = $_POST['idEndereco2'];
    $idSede = $_POST['idSede'];

    $objDB = new db();
    $linkDeConexao = $objDB->mysqlConnect();

    $queryStatement  = $linkDeConexao->
    prepare("INSERT INTO Encomendas(codRastreio,peso,comprimento,largura,altura,volume,valorEntrega,dataPostagem,FK_enderecoDestinatario,FK_enderecoRemetente,FK_enderecoSede)
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?);");

    $queryStatement->bind_param("sidddddsiii", $codRastreio,$peso,$comprimento,$largura,$altura,$volume,$valorEntrega,$dataPostagem,$idEndereco1,$idEndereco2,$idSede);


    $runQuery = $queryStatement->execute();

    //Verificar erro
    if($runQuery){
    }
    else
    {
    }


?>
