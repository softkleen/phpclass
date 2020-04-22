<?php
class Noticia{
   
    public $id;
    public $idCategoria;
    public $tituloNoticia;
    public $imgNoticia;
    public $visitaNoticia;
    public $dataNoticia;
    public $noticiaAtivo;
    public $noticia;
  

    public static function loadById($id_noticia){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM noticias WHERE id_noticia = :id",
        array(":id"=>$id_noticia));
        if (count($results)>0){
            return $results[0];
        }
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM noticias ORDER BY id_noticia");
    }

    public static function search($titulo){
        $sql = new Sql();
        return $sql->select("SELECT * FROM noticias WHERE titulo_noticia LIKE :titulo",
                array(":titulo"=>"%".$titulo."%"));
    }

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_noticia_insert(:idCategoria, :tituloNoticia, :imgNoticia, :visitaNoticia, :dataNoticia, :noticiaAtivo, :noticia)",
        array(
            ":idCategoria"=>$this->idCategoria,
            ":tituloNoticia"=>$this->tituloNoticia,
            ":imgNoticia"=>$this->imgNoticia,
            ":visitaNoticia"=>0,
            ":dataNoticia"=>$this->dataNoticia,
            ":noticiaAtivo"=>$this->noticiaAtivo,
            ":noticia"=>$this->noticia
        ));
        if (count($results)>0){
            return $results[0];
        }
    }

    public function update($id, $idCategoria, $tituloNoticia, $imgNoticia, $visitaNoticia, $dataNoticia, $noticiaAtivo, $noticia){
        $sql = new Sql();
        $sql->query("UPDATE noticias SET 
        id_categoria = :idCategoria, 
        titulo_noticia = :tituloNoticia, 
        img_noticia = :imgNoticia, 
        visita_noticia = :visitaNoticia, 
        data_noticia = :dataNoticia, 
        noticia_ativo = :noticiaAtivo, 
        noticia = :noticia WHERE id_noticia = :id",
        array(
            ":id"=>$id,
            ":idCategoria"=>$idCategoria,
            ":tituloNoticia"=>$tituloNoticia,
            ":imgNoticia"=>$imgNoticia,
            ":visitaNoticia"=>$visitaNoticia,
            ":dataNoticia"=>$dataNoticia,
            ":noticiaAtivo"=>$noticiaAtivo,
            ":noticia"=>$noticia        
        ));
        
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM noticias WHERE id_noticia = :id",
        array(":id"=>$this->getId()));
    }

    public function __construct($idCategoria="", $tituloNoticia="", $imgNoticia="", $visitaNoticia="", $dataNoticia="", $noticiaAtivo="", $noticia=""){       
        
        $this->idCategoria=$idCategoria;
        $this->tituloNoticia=$tituloNoticia;
        $this->imgNoticia=$imgNoticia;
        $this->visitaNoticia=$visitaNoticia;
        $this->dataNoticia=$dataNoticia;
        $this->noticiaAtivo=$noticiaAtivo;
        $this->noticia=$noticia;
    }

    public function __toString(){
        return json_encode(array(
            "idCategoria"=>$this->idCategoria,
            "tituloNoticia"=>$this->tituloNoticia,
            "imgNoticia"=>$this->imgNoticia,
            "visitaNoticia"=>$this->visitaNoticia,
            "dataNoticia"=>$this->dataNoticia,
            "noticiaAtivo"=>$this->noticiaAtivo,
            "noticia"=>$this->noticia
        ));
    }


    // delimiter $$
    // CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_noticia_insert`(
    //  idCategoria  int(11),
    //  tituloNoticia varchar(255),
    //  imgNoticia varchar(100),
    //  visitaNoticia INT(11),
    //  dataNoticia DATE,
    //  noticiaAtivo varchar(1),
    //  noticia TEXT
    // )
    // BEGIN 
    // 	INSERT INTO noticias (id_categoria, titulo_noticia, img_noticia, visita_noticia, data_noticia, noticia_ativo, noticia) 
    //     VALUES (idCategoria, tituloNoticia, imgNoticia, visitaNoticia , dataNoticia, noticiaAtivo, noticia);
    //     SELECT * FROM noticias WHERE id_noticia = (Select @@identity);
    // END $$

}

?>