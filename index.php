<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Dinâmico UC12</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  
    <div id="estrutura">
        <div id="topo"></div>
        <div id="menu">
            <ul>
                <li><a href="index.php?link=1">Home</a></li>
                <li><a href="index.php?link=">Serviços</a></li>
                <li><a href="index.php?link=">Produtos</a></li>
                <li><a href="index.php?link=">Contatos</a></li>
            </ul>        
        </div>
        <div id="banner" class="banner"></div>
        <div id="corpo">
            <div id="esquerda" class="esquerda">
                <h1>Produtos</h1>
                <li><a href="index.php?link=5">Produto 1</a></li>
                <li><a href="index.php?link=">Produto 2</a></li>
                <li><a href="index.php?link=">Produto 3</a></li>
                <li><a href="index.php?link=">Produto 4</a></li>
            </div>
            <div id="centro">
                <?php
                   $link = $_GET['link'];
                   $pag[1] = "home.php";
                   $pag[5] = "produto.php";
                   if (!empty($link)){
                       if(file_exists($pag[$link])){
                            include($pag[$link]);
                       }
                       else{
                            include($pag[1]); // mostre o home
                       }
                    }
                    else{
                        include($pag[1]); // mostre o home
                    }

                ?>
            </div>
            <div id="direita">
                <div id="noticias">
                    <h3>Imagem notícia</h3>
                    <div id="itens-noticias">
                        <span>08/09/2018</span>
                        <a href="index.php?link=">Lançamento do curso criando um site</a>
                    </div>
                    <div id="itens-noticias">
                        <span>13/10/2018</span>
                        <a href="index.php?link=">Lançamento do curso criando um site</a>
                    </div>
                    <div id="itens-noticias">
                        <span>25/01/2019</span>
                        <a href="index.php?link=">Lançamento do curso criando um site</a>
                    </div>
                </div>
                <div>
                    Área do Administrador
                    <a href="admin/index.php">Acesso à área Administrativa</a>
                </div>
                <div id="rodape">
                    &copy; - Todos os direitos reservados
                </div>
            </div>
        </div>


    </div>
</body>
</html>