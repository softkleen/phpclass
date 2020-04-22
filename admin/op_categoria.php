<?php
if(isset($_POST['txt_categoria'])){
    // require_once('conexao.php');
    $categoria = $_POST['txt_categoria'];
    $ativo = isset($_POST['check_ativo'])?'1':'0';
    $cmd = $cn->prepare("INSERT INTO categoria (categoria, cat_ativo) 
    VALUES (:cat, :ativ)");
    $cmd->execute(array(
        ':cat'=>$categoria,
        ':ativ'=>$ativo
    ));
    header('location:principal.php?link=2&msg=ok');
}

// function listar_categoria(){
//     require_once('conexao.php');
//     $query = "select * from categoria";
//     $cmd = $cn->prepare($query); //PDO
//     $cmd->execute();
//     return $cmd->fetchAll(PDO::FETCH_ASSOC);
// }

// function deletar_categoria($id){
//     require_once('conexao.php');
//     $cmd = $cn->exec("delete from categoria where id_categoria = :id"); //PDO
//     $cmd->bindParam(array(':id'=>$id));
//     $cmd->execute();
//     }
?>