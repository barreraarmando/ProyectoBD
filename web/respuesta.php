<?php


if(strlen($_POST['Nombre'])>0 && $_POST['Nombre']!='dump'){
    $crudoconsulta = $_POST['Nombre'];
    
    $consulta=base64_encode($crudoconsulta);
    $post = [
    'query' => $consulta
    ];
    $ch = curl_init('https://www.eversql.com/api/checkSqlSyntax');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);

    //echo $response;
    curl_close($ch);

    $arreglo = json_decode($response);
    if($arreglo->optimization_recs_count==1){
        echo "Se acepto la consulta!";
    }else{
        echo "Tu consulta tiene un error bro :c, pero no te preocupes, aqui esta la descripcion:<br><br>";
        echo $arreglo->error_desc;
    }

    
}
    
$_POST['Nombre']=='dump';
    
    ?>
