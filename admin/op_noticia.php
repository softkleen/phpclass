<?php

require_once('../config.php');
$not = new Noticia();
if (isset($_POST['inserir'])){
    $not->idCategoria = $_POST['idcategoria']; 
    $not->tituloNoticia = $_POST['titulo']; 
    $not->imgNoticia = $_POST['img']; 
    $not->noticiaAtivo =  isset($_POST['ativo'])?1:0; 
    $not->dataNoticia = date('Y-m-d',strtotime($_POST['data'])); 
    $not->noticia =  $_POST['txtnoticia']; 
    $noticia_inserida = $not->insert();
    if($noticia_inserida['id_noticia']!=null){
       print "<script type='text/javascript'>location.href='principal.php?link=5'</script>";
   }
}


?>