<?php
require_once("../config.php");


//$adm = new Administrador('Edinho', 'edinho@mobi.le','edinho','123456');
//$adm->insert();

$admins = Administrador::getList();
foreach ($admins as $admin){
    echo $admin['id']." - ".$admin['nome']." - ".$admin['senha']."<br>";
}

$adm = new Administrador();
$adm->efetuarLogin('edinho','123456');
echo $adm->getNome();



?>