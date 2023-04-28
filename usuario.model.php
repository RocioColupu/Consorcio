<?php
    class UsuarioModel{
        private $pdo;
        public function __CONSTRUCT()
        {
            try 
            {
                $this->pdo = new PDO('mysql:host=localhost;dbname=consorcio','root','');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Listar(){
            try
            {

              $result = array();
              $stm = $this->pdo->prepare("SELECT * FROM usuario");
              $stm->execute();
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                  $alm = new usuario();
                  $alm->__SET('idusuario', $r->idusuario);
                  $alm->__SET('usuario', $r->usuario);
                  $alm->__SET('correo', $r->correo);
                  $alm->__SET('clave', $r->clave);
                  $alm->__SET('reclave', $r->reclave);
                  $alm->__SET('descripcion', $r->descripcion);
                  
                  $result[] = $alm;
                }
                return $result;
            }
            catch(Exception $e)
            {
              die($e->getMessage());
            }
        }

        public function Actualizar(usuario $data)
        {
            try
            {

                $sql = "UPDATE usuario SET
                usuario = ?,
                correo = ?,
                clave = ?,
                reclave= ?,
                descripcion = ?
                WHERE idusuario = ?";
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('usuario'),
                $data->__GET('correo'),
                $data->__GET('clave'),                
                $data->__GET('reclave'),
                $data->__GET('descripcion'),
                $data->__GET('idusuario')
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
        public function Obtener($idusuario){
            try
            {
                $stm = $this->pdo
                ->prepare("SELECT * FROM usuario WHERE idusuario = ?");
                $stm->execute(array($idusuario));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                $alm = new usuario();
                $alm->__SET('idusuario', $r->idusuario);
                $alm->__SET('usuario', $r->usuario);
                $alm->__SET('correo', $r->correo);
                $alm->__SET('clave', $r->clave);
                $alm->__SET('reclave', $r->reclave);
                $alm->__SET('descripcion', $r->descripcion);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }         
        }
        public function Registrar(usuario $data)
        {
            try
            {
                $sql = "INSERT INTO usuario (usuario,correo,clave,reclave,descripcion) VALUES ( ?, ?, ?,?,?)";
                $this->pdo->prepare($sql)->execute(array(
                $data->__GET('usuario'),
                $data->__GET('correo'),
                $data->__GET('clave'),
                $data->__GET('reclave'),
                $data->__GET('descripcion'),
                )
                );
            }   
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }

    }



?>
