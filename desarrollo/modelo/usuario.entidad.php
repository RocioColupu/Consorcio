<?php
    class Usuario
    {
        private $idusuario;    
        private $usuario;
        private $correo;
        private $clave;
        private $reclave;
        private $descripcion;

        public function __GET($k){
            return $this->$k;
        }
        public function __SET($k,$v){
            return $this->$k = $v;
        }

    }
?>