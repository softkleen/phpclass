<?php
require_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Dinâmico</title>
    <link rel="stylesheet" href="css/style_admin.css">
</head>
<body>
    <div id="box-cadastro">
        <div id="formulario-menor">
            <form id="frmnoticia" name="frmnoticia" action="op_noticia.php" method="post">
                <fieldset>
                    <legend>Cadastro Noticia</legend>
                    <span>Categoria da Noticia</span> 
                    <?php 
                        require_once("../config.php");
                        $categorias = Categoria::getList();
                    ?>
                    <select name="idcategoria" id="idcategoria">
                        <?php 
                            foreach ($categorias as $cat) {
                        ?> 
                            <option value="<?php echo $cat['id_categoria'].'">'.$cat['id_categoria']."-".$cat['categoria'];?></option>
                        <?php }?>
                    </select>
                    <label for="">
                        <span>Titulo da Noticia</span> 
                        <input type="text" name="titulo" id="titulo" value="">
                    </label>
                    <label for="">
                        <span>Imagem da Noticia</span> 
                        <input type="text" name="img" id="img" value="">
                    </label>
                    <label for="">
                        <span>Data da Noticia</span> 
                        <input type="date" name="data" id="data" value="">
                    </label>
                    <label for="">
                        <span>Ativo</span>
                        <input type="checkbox" name="ativo" id="ativo" value="">
                    </label>
                    <label for="">
                        <span>Texto da Noticia</span>
                        <textarea name="txtnoticia" id="txtnoticia" cols="30" rows="10"></textarea>
                    </label>
                    <br>
                    <input type="submit" value="Gravar" name="inserir" class="botao">
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>