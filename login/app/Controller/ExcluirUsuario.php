<?php
use UserBanco;

class ExcluirUsuario{
    public function retornar(){
      $usuarios = (new UserBanco())->excluirUsuario($_GET['id']);       

    }
}