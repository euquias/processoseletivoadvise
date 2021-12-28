<?php

class Usuario {

    private $id;
    private $nome;
    private $email;
    //private $telefone;
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

            $row = $results[0];

            $this->setId($row['id']);
            $this->setNome($row['nome']);
            $this->setEmail($row['email']);
            $this->setTelefone($row['telefone']);
            $this->setDtcadastro(new DateTime($row['dtcadastro']));

        }

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