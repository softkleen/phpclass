<?php
    class Categoria{
        public $id_categoria;
        public $categoria;
        public $cat_ativo;

        public function __construct($categoria="", $cat_ativo =""){
            $this->categoria=$categoria;
            $this->cat_ativo=$cat_ativo;
        }

        public static function loadById($id_categoria){
            $sql = new SQL();
            $resultado = $sql->select("select * from categoria where id_categoria = :id", array(":id"=>$id_categoria));
            if (count($resultado)>0) {
                return $resultado[0];
            }
        }
        
        public static function getList(){
            $sql = new SQL();
            return $sql->select("select * from categoria order by categoria");
        }
    
        public static function search($adm){
            $sql = new SQL();
            return $sql->select("select * from categoria where categoria like :categoria", array(":categoria"=>"%".$adm."%"));
        }
    
        public static function setData($data){
            $id_categoria = ($data['id_categoria']);
            $categoria = ($data['categoria']);
            $cat_ativo = ($data['cat_ativo']);
        }
    
        public function insert(){
            $sql = new SQL();
            $resultado = $sql->select("call sp_categoria_insert(:categoria, :cat_ativo)", 
            array(
                ":categoria"=>$this->categoria,
                ":cat_ativo"=>$this->cat_ativo
            ));
            if (count($resultado) > 0) {
                //$this->setData($resultado[0]);
                return $resultado[0];
            }
        }
    
        public function update($_id_categoria,$_categoria,$_cat_ativo){
            // $this->nome = $_nome;
            // $this->senha = $_senha;
            $sql = new SQL();
            $sql->query("UPDATE categoria SET categoria = :categoria, cat_ativo = :ativo WHERE id_categoria = :id_categoria", 
            array(
                ":id_categoria"=>$_id_categoria,
                ":categoria"=>$_categoria,
                ":cat_ativo"=>$_cat_ativo
            ));
        }
    
        public function delete(){
            $sql = new SQL();
            $sql->query("DELETE FROM categoria WHERE id_categoria = :id_categoria",
            array(":id_categoria"=>$this->id_categoria));
        }
    }
    // delimiter $$
    // CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categoria_insert`(
    //     _categoria varchar(150), 
    //     _cat_ativo varchar(1)
    //     )
    //     BEGIN
    //         insert into categoria (categoria, cat_ativo)
    //         values (_categoria, _cat_ativo);
    //         select * from categoria where id_categoria = (select @@identity);    
    //     END $$
?>