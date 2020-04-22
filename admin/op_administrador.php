<?php

require_once('../config.php');//mata! Aqui tem corage.
// Inserir administrador
if (isset($_POST['cadastro'])){
    $adm = new Administrador(
        $_POST['nome'],
        $_POST['email'],
        $_POST['login'],
        $_POST['senha']
    );
    $adm->insert();
    if($adm->getId()!=null){
        header('location:principal.php?link=9&msg=ok');
    }
}
// excluir/deletar Administrador
$id = filter_input(INPUT_GET,'id');
$excluir = filter_input(INPUT_GET,'excluir');

if(isset($id) && $excluir==1){
    if ($id==$_SESSION['id_adm']){
        header('location:principal.php?link=10&msg=Você não pode excluir seu usuário estando logado.');
    }
    $admin = new Administrador();
    $admin->setId($id);
    $admin->delete();
    header('location:principal.php?link=9&msg=ok');
}
//Alterar o Administrador
if (isset($_POST['alterar'])){
    $adm = new Administrador();
    $adm->update($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['login']);
    header('location:principal.php?link=9&msg=ok');    
}
// Login Adm
if(isset($_POST['txt_login'])){
    $txt_login = isset($_POST['txt_login'])?$_POST['txt_login']:'';
    $txt_senha = isset($_POST['txt_senha'])?$_POST['txt_senha']:'';
    
    if (empty($txt_login) || empty($txt_senha)){
       // echo 'Preencha os dados de Usuário';
        header('Location: index.php?msg=Preencha os dados de Usuário');
        exit;
    }
    $adm = new Administrador();

    $adm->efetuarLogin($txt_login,$txt_senha);
    if (($adm->getId()==null)) {
        echo $adm->getId();
        //echo 'Usuário ou Senha incorretos';
        header('Location: index.php?msg=Usuário ou Senha incorretos');
        exit;
    }
    //registrando sessão do usuário
    $_SESSION['logado'] = true;
    $_SESSION['id_adm'] = $adm->getId();
    $_SESSION['nome_adm'] = $adm->getNome();
    $_SESSION['login_adm'] = $adm->getLogin();
    //registro de log
    header('Location: principal.php?link=1');
 
    //print_r($_SESSION);
    //print "<script type='text/javascript'>location.href='principal.php'</script>";
    //print_r($adm);
}
//encerrando sessão de usuário
if($_GET['sair']){
    $_SESSION['logado'] = false;
    $_SESSION['id_adm'] = null;
    $_SESSION['nome_adm'] = null;
    $_SESSION['login_adm'] = null;
    //registro de log
    header('Location: index.php');
}


?>