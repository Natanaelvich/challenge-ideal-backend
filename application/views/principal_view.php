<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Teste</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body> 		
                
	<?php
    foreach($atividades as $at){
    ?>
        <li><?=$at->getDescricao()?> [<?=$at->getIdProjeto()->getDescricao()?>]</li>              	
    <? } ?>
             
</body>
</html>
