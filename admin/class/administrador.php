<?php
class Administrador{
    private $id;
    private $nome;
    private $email;
    private $login;
    private $senha;
     // delclaração de métodos de acesso (Getters and Setters)
    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this->id = $value;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($value){
        $this->login = $value;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($value){
        $this->senha = $value;
    }
    public function loadById($_id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM administrador WHERE id = :id",array(':id'=>$_id));
        if (count($results)>0) {
            $this->setData($results[0]);
        }
    }
    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM administrador order by nome");
    }
    public static function search($nome_adm){
        $sql = new Sql();
        return $sql->select("SELECT * FROM administrador WHERE nome LIKE :nome",
            array(":nome"=>"%".$nome_adm."%"));
    }
    public function efetuarLogin($_login, $_senha){
        $sql = new Sql();
        $senha_cript = md5($_senha);
        $results = $sql->select("SELECT * FROM administrador WHERE login = :login AND senha = :senha",
        array(':login'=>$_login,":senha"=>$senha_cript));
        if (count($results)>0) {
            $this->setData($results[0]);
        }
    }
    public function setData($dados){ 
        $this->setId($dados['id']);
        $this->setNome($dados['nome']);
        $this->setEmail($dados['email']);
        $this->setLogin($dados['login']);
        $this->setSenha($dados['senha']);
    }
    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_adm_insert(:nome, :email, :login, :senha)",
            array(
                ":nome"=>$this->getNome(),
                ":email"=>$this->getEmail(),
                ":login"=>$this->getLogin(),
                ":senha"=>md5($this->getSenha())
            ));
        if (count($results)>0) {
            $this->setData($results[0]);
        }
    }
    public function update($_id, $_nome, $_email, $_login){
        $sql = new Sql();
        $sql->query("UPDATE administrador SET nome = :nome, email = :email, login= :login 
            WHERE id = :id",
            array(
                ":id"=>$_id,
                ":nome"=> $_nome,
                ":email"=>$_email,
                ":login"=>$_login
            ));
    }
    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM administrador WHERE id = :id",array(":id"=>$this->getId()));
    }
    public function __construct($_nome="",$_email="",$_login="",$_senha=""){
        $this->nome = $_nome;
        $this->email = $_email;
        $this->login = $_login;
        $this->senha = $_senha;
    }

}

?>