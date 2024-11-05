<?php
class Estagio {
private string $empresa;
private string $funcionario;
private string $data;
private string $horario;
private string $id;

public function getempresa() {
    return $this->empresa;
}

public function setempresa($empresa) {
    $this->empresa = $empresa;
}

public function getfuncionario() {
    return $this->funcionario;
}

public function setfuncionario($funcionario) {
    $this->funcionario = $funcionario;
}

public function getdata() {
    return $this->data;
}

public function setdata($data) {
    $this->data = $data;
}

public function gethorario(){
    return $this->horario;
}
public function sethorario($horario){
    return $this->horario=$horario;
} 

    // Método setId
    public function setId($id) {
        $this->id = $id;
    }

    // Método getId
    public function getId() {
        return $this->id;
    }
}


