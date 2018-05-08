<?php

class Categorias extends Model
{

    public function getCategorias()
    {
        $array = array();

        $sql = "SELECT * FROM categorias ORDER BY tipo ASC, nome DESC";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getTipo($id)
    {
        $array = array();
        $array['tipo'] = "";

        $sql = "SELECT tipo FROM categorias WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute([$id]);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array['tipo'];
    }

    public function adicionar($dados = array())
    {
        $retorno = array();

        $sql = "INSERT INTO categorias (nome, tipo) VALUES (?,?)";
        $sql = $this->db->prepare($sql);
        $sql->execute([$dados['nome'], $dados['tipo']]);

        if ($sql->rowCount() > 0) {
            $retorno['t'] = 1;
            $retorno['msg'] = "Galeria Salva Com Sucesso!";
        } else {
            $retorno['t'] = 3;
            $retorno['msg'] = "Erro ao Salvar Galeria!";
        }

        return $retorno;
    }

    public function deletar($id)
    {

        $sql = "DELETE FROM categorias WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute([$id]);
    }

    public function getCategoria($id)
    {
        $array = array();

        $sql = "SELECT * FROM categorias WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute([$id]);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function update($dados){
        $sql = "UPDATE categorias SET nome = ?, tipo = ? WHERE id = ?";
        $sql = $this->db->prepare($sql);

        $values = [$dados['nome']];
        $values[] = $dados['tipo'];
        $values[] = $dados['id'];

        $sql->execute($values);

        if($sql->rowCount() > 0){
            $retorno['t'] = 1;
            $retorno['msg'] = "Galeria Atualizada Com Sucesso!";
        }else{
            $retorno['t'] = 3;
            $retorno['msg'] = "Erro ao Atualizar Galeria!";
        }
        return $retorno;
    }

}