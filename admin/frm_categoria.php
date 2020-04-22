<div id="box-cadastro">
    <div id="formulario-menor">
        <form id="frmcategoria" name="frmcategoria" action="op_categoria.php" method="POST">
            <fieldset>
                <legend>Cadastro de Categoria</legend>
                <label>
                    <span>Categoria</span>
                    <input type="text" name="txt_categoria" id="txt_categoria" value="" required>
                </label>
                  <div>
                    <p id="p_ativo">Ativo <input type="checkbox" name="check_ativo" id="check_ativo" checked> </p>
                  </div>
                  <br>
                  <input type="submit" value="Cadastrar" class="botao" name="btn_cadastrar">
                  <span><?php echo (isset($_GET['msg']))?"Sucesso":''; ?></span>
               
            </fieldset>
        </form>
    </div>
</div>