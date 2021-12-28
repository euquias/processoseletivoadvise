<?php

class Usuario {

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $dtcadastro;

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
    public function getTelefone(){

        return $this->telefone;

    }

    public function setTelefone($value){

        $this->telefone = $value;

    }

    public function getDtcadastro(){

        return $this->dtcadastro;

    }

    public function setDtcadastro($value){

        $this->dtcadastro = $value;

    }

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE id = :ID", array(

            ":ID"=>$id

        ));

        if (count($results) > 0) {

            $this->setData($results[0]);
            
        }

    }
    public static function getList(){
        $sql = new sql();
       return $sql->select("SELECT * FROM tb_usuarios ORDER BY nome;");
    }

    public function setData($data){

            $this->setId($data['id']);
            $this->setNome($data['nome']);
            $this->setEmail($data['email']);
            $this->setTelefone($data['telefone']);
            $this->setDtcadastro(new DateTime($data['dtcadastro']));

    }

    public function insert(){

        $sql = new sql();

        $results = $sql->select("call sp_usuarios_insert(:nome, :email, :telefone", array

            ( ':nome'=>$this->getNome(),
              ':email'=>$this->getEmail(),
              ':telefone'=>$this->getTelefone()  

    ));
    }
         /* if (count($results) > 0) {
            $this->setData($results[0]);
        }
  
    }  */
    public function update($nome, $email, $telefone){

        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTelefone($telefone);

        $sql = new Sql();

        $sql->query("UPDATE tb_usuarios SET nome = :NOME, :email = :EMAIL, telefone = :TELEFONE WHERE id = :ID", array(

            ':NOME'=>$this->getNome(),
            ':EMAIL'=>$this->getEmail(),
            ':TELEFONE'=>$this->getTelefone(),
            ':ID'=>$this->getId()

        ));

    }


     public function __construct($nome = "", $email = "", $telefone = ""){

        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTelefone($telefone);

    }

    public function __toString(){

        return json_encode(array(

            "id"=>$this->getId(),
            "nome"=>$this->getNome(),
            "email"=>$this->getEmail(),
            "telefone"=>$this->getTelefone(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

        ));

    }

}

?>