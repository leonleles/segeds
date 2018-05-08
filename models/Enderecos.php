<?php

class Enderecos extends Model {
    public function selecionarId ($id) {

        $c = new CRUD();

        $res = $c->Selecionar('*', 'endereco', ' WHERE id='.$id);

        return $res;

    }
}