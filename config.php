<?php

//inicializar a sessão de usuário
if (!isset($_SESSION)){
    session_start();
}

//definindo padrão de Zona GMT (TimeZone) -3,00
date_default_timezone_set('America/Sao_Paulo');

//inicia carregamento das classes do projeto
spl_autoload_register(function($nome_classe){
    $nome_arquivo = "class".DIRECTORY_SEPARATOR.$nome_classe.".php";
    if(file_exists($nome_arquivo)){
        require_once($nome_arquivo);
    }
});

//Criar constantes do servidor de banco de dados
define ('IP_SERVER_DB', '127.0.0.1');
define ('HOSTNAME','ITQ0626028W10-1');
define ('NOME_BANCO','dinamico85db');
define ('USER_DB','root');
define ('PASS_DB','');
define ('LARGURA_IMG',640);
?>