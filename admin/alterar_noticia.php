<?php
$idnot= filter_input(INPUT_GET,'idnot');
$titulonot= filter_input(INPUT_GET,'titulonot');
$datanot= filter_input(INPUT_GET,'datanot');
$noticia= filter_input(INPUT_GET,'noticia');
$imgnot= filter_input(INPUT_GET,'imgnot');
$idcat= filter_input(INPUT_GET,'idcat');
$visitanot= filter_input(INPUT_GET,'visitanot');
$notativo= filter_input(INPUT_GET,'notativo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alteração de administrador</title>
</head>
<body>
    <form action="op_administrador.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Alteração de administrador</legend>
            <div>
                <input type="hidden" name="id" value="<?php echo $idnot; ?>">
            </div>
            <div>
            <?php 
                        require_once("../config.php");
                        $categorias = Categoria::getList();
                    ?>
                <label for="">Categoria</label>
                <select name="idcategoria" id="idcategoria" >
                        <?php 
                            foreach ($categorias as $cat) {
                        ?> 
                            <option value="<?php echo $cat['id_categoria'].'">'.$cat['id_categoria']."-".$cat['categoria'];?></option>
                        <?php }?>
                </select>
                
                <input type="text" name="categotia" value="<?php echo $idcat; ?>">
            </div>
            <div>
                <label for="">Título Notícia</label>
                <input type="text" name="email" value="<?php echo $titulonot; ?>">
            </div>
            <div>
                <label for="">imagem</label>
                <input type="text" name="img_atual" value="<?php echo $imgnot; ?>">
                <input type="file" name="img_alterado" value="">
            </div>
            <div>
                <label for="">Texto Notícia</label>
                <textarea name="txtnoticia" id="txtnoticia" cols="30" rows="10"><?php echo $noticia; ?></textarea>
            </div>
            <div>
                <label for="">Data Notícia</label>
                <input type="date" name="email" value="<?php echo $datanot; ?>">
            </div>
            <div>
                <label for="">Visitas Notícia</label>
                <input type="text" name="email" value="<?php echo $visitanot; ?>">
            </div>
            <div>
                <label for="">Ativo Notícia</label>
                <input type="checkbox" name="email" <?php echo $notativo==1?'checked':''; ?>>
            </div>
            <div>
                <input type="submit" name="alterar" value="Registrar Alteração">
            </div>
        </fieldset>
    </form>
</body>
</html>