<?php

$iModo = (isset($_GET["modo"])) ? $_GET["modo"] : '' ;
$iID = (isset($_GET["id"])) ? $_GET["id"] : '' ;
//$iName = '';
//$iMarca = '';
//$iPotencia = "";
//$TempoDeUso = "";
//echo $iModo;
//die;
if(isset($iModo)){
    if ($iModo == 'alt') {
            $result = file_get_contents('https://wsrestrletricocossumer.herokuapp.com/webresources/consumer/buscaeletro/2');
            $result =  json_decode($result);
            //print_r($iID);
            //die;
            foreach($result as $key => $value){
                if ( $value->id == $iID ){
                    $iName = $value->name;
                    $iMarca = $value->marca;
                    $iPotencia = $value->potencia;
                    $TempoDeUso = $value->tempoUso;
                }
            }  
                 

    }
}






$iForm = '<form method="post" action="manu.php?modo=' . $iModo . '">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nome do eletrônico</label>
                        <input type="text" class="form-control" id="name" name="name" value="' . ( ( isset( $iName ) && $iName != '' ) ? $iName  : '' ) . '" placeholder="Ex: Ar-condicionado">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="' . ( ( isset( $iMarca ) && $iMarca != '' ) ? $iMarca  : '' ) . '" placeholder="Ex: Philips">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Potência</label>
                        <input type="text" class="form-control" id="potencia" name ="potencia" value="' . ( ( isset( $iPotencia ) && $iPotencia != '' ) ? $iPotencia  : '' ) . '" placeholder="Ex: 120">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tempo de uso</label>
                        <input type="text" class="form-control" id="tempoUso" name="tempoUso" value="' . ( ( isset( $TempoDeUso ) && $TempoDeUso != '' ) ? $TempoDeUso  : '' ) . '" placeholder="Ex: 8.00">
                    </div>
                </div>
            </div>
            <input type="hidden" id="pessoaIdFk" name="pessoaIdFk" value="2">
            <input type="hidden" id="id" name="id" value="' . $iID . '">
            <input type="hidden" id="modo" name="modo" value="' . $iModo . '">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>';
        if ($iModo == 'alt'){
            $iForm = '<div>
                        <h3>Alterar Produto</h3>
                    </div>' . $iForm; 
        } else {
            $iForm = '<div>
                            <h3>Adicionar um produto</h3>
                        </div>' . $iForm; 
        }


?>

<?php include('topo.php') ?>
<?php echo $iForm; ?>
<?php include('baixo.php') ?>




































