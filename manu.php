
<?php

session_start();


$iID = (isset($_POST['id'])) ? $_POST['id'] : $_GET['id'];
$iModo = ( ( isset($_GET["modo"]) && $_GET["modo"] != '' ) ? $_GET["modo"] : '' );


if($iModo == 'del'){
    
    $url = "https://wsrestrletricocossumer.herokuapp.com/webresources/consumer/deletaeletro/" . $iID;

    $iniciar = curl_init();
    
    curl_setopt($iniciar, CURLOPT_URL, $url);
    curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, false);
    curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, "DELETE");
    
    
    curl_exec($iniciar);
    
    
    if($errno = curl_errno($iniciar)) {
        $error_message = curl_strerror($errno);
        echo "cURL error ({$errno}):\n {$error_message}";
    }
    
    
    curl_close($iniciar);
    header("Location: /aps?sucesso=1");
    exit;

} else {

    $iName = $_POST['name'];
    $iMarca = $_POST['marca'];
    $iPotencia = $_POST['potencia'];
    $iTempoDeUso = $_POST['tempoUso'];
    $iModo = (isset($_POST["modo"])) ? $_POST["modo"] : '' ;
    $iID = (isset($_POST['id'])) ? $_POST['id'] : $_GET['id'] ;
    $iErro = array();

    if ($iName == '') { $iErro['iName'] = "Nome do produto não poder ser vazio";}
    if ($iMarca == '') { $iErro['iMarca'] = "A marca do produto não pode ser vazio";}
    if ($iPotencia == '') { $iErro['iPotencia'] = "A potência do produto não poder ser vazia";}
    if ($iTempoDeUso == '') { $iErro['iTempoDeUso'] = "Tempo de uso não pode ser vazio"; }

    switch ($iModo) {
        case 'alt':
            
            if( !empty($iErro) ){
                
                $_SESSION['erro'] = $iErro;
                
                header("Location: /aps/form.php?modo=alt&id=" . $iID);
                exit;
            } else {
                
                $url = "https://wsrestrletricocossumer.herokuapp.com/webresources/consumer/editaeletro";
    
                $iniciar = curl_init();
                
                curl_setopt($iniciar, CURLOPT_URL, $url);
                curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, false);
                
                $dados = array(
                    'id' => $iID,
                    'name' => $iName,
                    'marca' => $iMarca,
                    'potencia' => $iPotencia,
                    'tempoUso' => $iTempoDeUso,
                    'pessoaIdFk' => '2'
                );
                
                $dados = json_encode($dados);
                $headers = [
                    "Content-Type: application/json",
                    "X-Content-Type-Options:nosniff",
                    "Accept:application/json",
                    "Cache-Control:no-cache"
                ];
                curl_setopt($iniciar, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($iniciar, CURLOPT_POSTFIELDS, $dados);
                curl_setopt($iniciar, CURLOPT_HTTPHEADER, $headers);
                
                
                curl_exec($iniciar);
                
                
                if($errno = curl_errno($iniciar)) {
                    $error_message = curl_strerror($errno);
                    echo "cURL error ({$errno}):\n {$error_message}";
                }
                
                
                curl_close($iniciar);
                header("Location: /aps?sucesso=1");
                exit;
            }
                
            break;
        
        default:
            if( !empty($iErro) ){
                $_SESSION['erro'] = $iErro;
                
                header("Location: /aps/form.php");
                exit;
            } else {
                
                $url = "https://wsrestrletricocossumer.herokuapp.com/webresources/consumer/cadastrareletro";
    
                $iniciar = curl_init();
                
                curl_setopt($iniciar, CURLOPT_URL, $url);
                curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, false);
                
                $dados = array(
                    'name' => $iName,
                    'marca' => $iMarca,
                    'potencia' => $iPotencia,
                    'tempoUso' => $iTempoDeUso,
                    'pessoaIdFk' => '2'
                );
                
                $dados = json_encode($dados);
                $headers = [
                    "Content-Type: application/json",
                    "X-Content-Type-Options:nosniff",
                    "Accept:application/json",
                    "Cache-Control:no-cache"
                ];
                curl_setopt($iniciar, CURLOPT_POST, true);
                curl_setopt($iniciar, CURLOPT_POSTFIELDS, $dados);
                curl_setopt($iniciar, CURLOPT_HTTPHEADER, $headers);
                
                
                curl_exec($iniciar);
                
                
                if($errno = curl_errno($iniciar)) {
                    $error_message = curl_strerror($errno);
                    echo "cURL error ({$errno}):\n {$error_message}";
                }
                
                
                curl_close($iniciar);
    
                header("Location: /aps?sucesso=1");
                exit;
    
            }
    
    }

}
?>