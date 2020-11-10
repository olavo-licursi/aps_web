<?php 

session_start();?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/65d6082f0d.js" crossorigin="anonymous"></script>
    <style>
      .container {
        margin-top: 20px;
      }
    </style>

    <title>APS - Unip</title>
  </head>
  <body>
<div class="container">
  <div align="center">
    <h1>Calculadora de Gastos</h1>
    <p class="lead">Gerencie seus equipamentos eletrônicos para saber seu gasto mensal e diário de cada equipamento.</p>
  </div>
<?php
  if( isset($_SESSION['erro']) ){ ?>
    <div class="alert alert-danger" role="alert">
      <?php foreach ($_SESSION['erro'] as $key => $value) {
        echo $value . '<br>';
      } ?>
    </div>
    <?php unset($_SESSION['erro']); 
  }
  if( isset($_GET['sucesso']) && $_GET['sucesso'] == '1' ){ ?>
    <div class="alert alert-success" role="alert">
      <b>Operação realizada com sucesso.</b>
    </div>
  <?php  
  }
  ?>

    







