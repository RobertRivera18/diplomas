<?php
    class Inspeccion extends Conectar{
        

        /*TODO: Funcion para insertar usuario */
        public function insert_inspeccion($nombre_cliente,$direccion,$sistema_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_inspeccion (id_inspeccion,nombre_cliente,direccion,sistema_id) VALUES (NULL,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_cliente);
            $sql->bindValue(2, $direccion);
            $sql->bindValue(3, $sistema_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Funcion para actualizar usuario */
        public function update_inspeccion($id_inspeccion,$nombre_cliente,$direccion,$sistema_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_inspeccion
                SET
                    nombre_cliente = ?,
                    direccion = ?,
                    sistema_id = ?
                WHERE
                    id_inspeccion = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_cliente);
            $sql->bindValue(2, $direccion);
            $sql->bindValue(3, $sistema_id);
            $sql->bindValue(4, $id_inspeccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Eliminar cambiar de estado a la categoria */
        public function delete_usuario($usu_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_usuario
                SET
                    est = 0
                WHERE
                    usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
        public function get_inspeccion(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_inspeccion";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
        public function get_usuario_modal($cur_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario 
                WHERE est = 1
                AND usu_id not in (select usu_id from td_curso_usuario where cur_id=? AND est=1)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cur_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>