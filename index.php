<?php include('topo.php') ?>

<?php $result = file_get_contents('https://wsrestrletricocossumer.herokuapp.com/webresources/consumer/buscaeletro/2');
$result =  json_decode($result);
//print_r($result);
//die;

//print_r($result->id['130']);
//$result = array($result);
//echo($result("id"));

//print_r($result);
//die;
?>



  <table class="table">
    <thead>
      <tr>
        <th scope="col">Produto</th>
        <th scope="col">Marca</th>
        <th scope="col">Potência</th>
        <th scope="col">Tempo de uso</th>
        <th scope="col">Gasto por dia</th>
        <th scope="col">Gasto por mês</th>
        <th scope="col">Custo por dia</th>
        <th scope="col">Custo por mês</th>
        <th class="text-center">
          <i class="fas fa-cog"></i>
        </th>
        <th>
          <a href="form.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
        </th>
      </tr>
    </thead>
    <tbody>
    <?php if(is_array($result)){ ?>

      <?php foreach($result as $key => $value){
        ?>
        <tr>
          <td><?php echo $value->name; ?></td>
          <td><?php echo $value->marca; ?></td>
          <td><?php echo $value->potencia; ?></td>
          <td><?php echo $value->tempoUso; ?> Hrs</td>
          <td><?php echo $value->gastoDiaWatts; ?> KW</td>
          <td><?php echo $value->gastoMesWatts; ?> KW</td>
          <td>R$<?php echo $value->gastoDiaReais; ?></td>
          <td>R$<?php echo $value->gastoMesReais; ?></td>
          <td colspan="2">
            <a href="form.php?modo=alt&id=<?php echo $value->id; ?>" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <a href="manu.php?modo=del&id=<?php echo $value->id; ?>" id="btn-apagar" class="btn btn-danger">
              <i class="fas fa-times-circle"></i>
            </a>
          </td>
          <td>&nbsp;</td>
        </tr>
        <?php
        }  
      } else { ?>
        <tr>
          <td align="center" colspan="10"><?php echo $result ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php include('baixo.php') ?>