<?php

class Files extends Model
{

    public function saveFiles()
    {
        if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

            $permitidos = array('image/jpeg', 'image/jpg', 'image/png', 'audio/mpeg', 'audio/mp3');

            if (in_array($_FILES['arquivo']['type'], $permitidos)) {

                switch ($_FILES['arquivo']['type']) {
                    case "image/jpeg":

                        $type = "jpg";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/imagens/' . $url);

                        break;
                    case "image/jpg":

                        $type = "jpg";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/imagens/' . $url);

                        break;
                    case "image/png":

                        $type = "png";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/imagens/' . $url);

                        break;
                    case "audio/mpeg":

                        $type = "mp3";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/audios/' . $url);

                        break;
                    case "audio/mp3":

                        $type = "mp3";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/audios/' . $url);

                        break;
                    default:
                        $type = "mp3";
                        break;
                }

                $categoria = '';
                if (isset($_POST['categoria']) && $_POST['categoria'] != '') {
                    $categoria = $_POST['categoria'];
                    $titulo = addslashes($_POST['titulo']);
                    $texto_english = addslashes($_POST['texto_english']);
                    $texto_portugues = addslashes($_POST['texto_portugues']);
                    $texto_livre = $_POST['texto_livre'];
                }

                $camps_values[] = $categoria;
                $camps_values[] = $titulo;
                $camps_values[] = $texto_english;
                $camps_values[] = $texto_portugues;
                $camps_values[] = $texto_livre;
                $camps_values[] = $type;
                $camps_values[] = $url;
                $camps_values[] = date('Y-m-d H:i:s');

                $sql = "INSERT INTO files SET id_categoria = ?, titulo = ?, texto_english = ?, texto_portugues = ?, 
                texto_livre = ?, tipo = ?, url = ?, data_upload = ?";
                $sql = $this->db->prepare($sql);
                $sql->execute($camps_values);

                if ($sql->rowCount() > 0) {
                    $msg = "Arquivo Salvo com Sucesso!";
                } else {
                    $msg = "Erro ao Salvar";
                }

            } else {
                $msg = "Formato não permitido";
            }
        } else {
            $msg = "Selecione um arquivo";
        }
        return $msg;
    }

    public function getFiles($id_categoria = null)
    {
        $array = array();
        $where_values = array();

        $sql = "SELECT * FROM files";

        if (!empty($id_categoria)) {
            $sql .= " WHERE id_categoria = ?";
            $where_values[] = $id_categoria;
        }

        $sql .= " ORDER BY id_categoria DESC, titulo DESC";

        $sql = $this->db->prepare($sql);
        $sql->execute($where_values);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getFile($id)
    {
        $array = array();
        $where_values = array();

        $sql = "SELECT * FROM files WHERE id = ?";
        $sql = $this->db->prepare($sql);

        $where_values[] = $id;

        $sql->execute($where_values);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getAllFiles()
    {
        $array = array();

        $sql = "SELECT ";
        $sql .= "f.id,";
        $sql .= "f.titulo,";
        $sql .= "f.tipo as tipo_file,";
        $sql .= "c.nome as categoria,";
        $sql .= "c.tipo as tipo_categoria ";
        $sql .= "FROM files f ";
        $sql .= "LEFT JOIN categorias c ON f.id_categoria = c.id ORDER BY id_categoria DESC, titulo DESC";

        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function deletar($id)
    {

        $file = $this->getFile($id);

        //deleta midia no diretorio imagens
        if ($file['tipo'] == 'mp3') {
            unlink("assets/midias/audios/" . $file['url']);
        } else {
            unlink("assets/midias/imagens/" . $file['url']);
        }

        $sql = "DELETE FROM files WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute([$id]);

    }

    public function update($id)
    {
        $file = $this->getFile($id);

        if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name']) && !empty($_POST['categoria']) && !empty($_POST['titulo'])) {

            //deleta midia no diretorio imagens
            if ($file['tipo'] == 'mp3') {
                unlink("assets/midias/audios/" . $file['url']);
            } else {
                unlink("assets/midias/imagens/" . $file['url']);
            }

            $permitidos = array('image/jpeg', 'image/jpg', 'image/png', 'audio/mpeg', 'audio/mp3');

            if (in_array($_FILES['arquivo']['type'], $permitidos)) {

                switch ($_FILES['arquivo']['type']) {
                    case "image/jpeg":

                        $type = "jpg";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/imagens/' . $url);

                        break;
                    case "image/jpg":

                        $type = "jpg";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/imagens/' . $url);

                        break;
                    case "image/png":

                        $type = "png";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/imagens/' . $url);

                        break;
                    case "audio/mpeg":

                        $type = "mp3";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/audios/' . $url);

                        break;
                    case "audio/mp3":

                        $type = "mp3";
                        $url = md5(time() . rand(0, 999)) . '.' . $type;
                        move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/midias/audios/' . $url);

                        break;
                    default:
                        $type = "mp3";
                        break;
                }

            } else {
                echo "Formato não permitido";
                exit;
            }
        }

        if (isset($_POST['categoria']) && $_POST['categoria'] != '') {
            $categoria = $_POST['categoria'];
            $titulo = addslashes($_POST['titulo']);
            $texto_english = addslashes($_POST['texto_english']);
            $texto_portugues = addslashes($_POST['texto_portugues']);
            $texto_livre = $_POST['texto_livre'];
            $camps_values[] = $categoria;
            $camps_values[] = $titulo;
            $camps_values[] = $texto_english;
            $camps_values[] = $texto_portugues;
            $camps_values[] = $texto_livre;
            $camps_values[] = !empty($type) ? $type : $file['tipo'];
            $camps_values[] = !empty($url) ? $url : $file['url'];
            $camps_values[] = $file['data_upload'];
            $camps_values[] = $id;

            $sql = "UPDATE files SET id_categoria = ?, titulo = ?, texto_english = ?, texto_portugues = ?, 
                texto_livre = ?, tipo = ?, url = ?, data_upload = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->execute($camps_values);

            if ($sql->rowCount() > 0) {
                $msg = "Arquivo Salvo com Sucesso!";
            } else {
                $msg = "Erro ao Salvar";
            }
        }else{
            $msg = "Preencha todos os campos";
        }
        return $msg;
    }


}