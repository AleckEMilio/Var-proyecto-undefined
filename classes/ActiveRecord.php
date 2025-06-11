<?php 
namespace App; // APP para que //! Se incluya en el autoload

//Clase para incluir vendedores y evitar código duplicado con //& HERENCIA
//! TODO LO QUE : CON DB SE CAMBIA A STATIC ? SE DEJA EN SELF::
// Static: hereda y crea

class ActiveRecord {
   
       //DB
        protected static $db;
        protected static $columnasDB = []; //Existe pero se HEREDA en propiedad.php
        protected static $tabla   = '';
        protected static $errores = []; // Se heredan a propiedad como a vendedor y manejar independientemente 
       
        //^ Propiedades de db
        public $id;
        public $titulo; // Declaración de una variable pública
        public $precio;
        public $imagen;
        public $descripcion;
        public $habitaciones;
        public $wc;
        public $estacionamiento;
        public $creado;
        public $vendedores_id;

        public $nombre;
        public $apellido;
        public $telefono;
        
        // DEFINIR LA NUEVA CONEXIÓN A LA DB
           public static function setDB($database){
            self::$db = $database;// --> "::" y Para hacer referencia a un atributos ESTÁTICO
                                  //! NO se cambia a static por ser la clase PADRE y que todas hacen referencia a esta
           }

        //Constructor
            
            public function guardar(){
                if(!is_null($this->id)){ // Para actualizar NO debe estar en null
                    // Actualizando 
                    $this->actualizar(); 
                } else {                 // Y si lo está; crea
                    // Creando nuevo registro
                    $this->crear();

                }
            }

            public function crear(){ 
                

                // SANITIZAR ENTRADA DE DATOS
                $atributos = $this->sanitizarAtributos();
            
                // INSERTAR EN LA DB
           
                $query = " INSERT INTO ". static::$tabla  . "( ";
                $query.= join(', ', array_keys($atributos));
                $query.= " ) VALUES ('" ; 
                $query.= join("', '", array_values($atributos));
                $query.= " ') "; 
               

                        $resultado = self::$db->query($query); //Siempre hay que hacer referencia a esto al usar DB
                        
                        if($resultado){
                            //Redireccionar al usuario
                            header('Location: /admin?resultado=1'); //! ESTO REDIRECCIONA AL USUARIO UNA VEZ CREADA LA PROPIEDAD
                            exit;
                          }   
            }


            public function actualizar(){
                // SANITIZAR ENTRADA DE DATOS
                $atributos = $this->sanitizarAtributos(); //* SIEMPRE QUE SE INTERACTUA CON DB SE SANITIZA
                $valores = []; // Ir a memoria y unir valores

                foreach($atributos as $key => $value){
                    $valores[] = "{$key}='{$value}'"; //
                }
                $query  = " UPDATE " . static::$tabla . " SET ";
                $query .=   join(', ', $valores);
                $query .= " WHERE id = '". self::$db->escape_string($this->id). "'"; //! WHERE OBLIGATORIO EN UPDATE
                // Se recomienda un limit
                $query .= " LIMIT 1"; 
                
                $resultado = self::$db->query($query);
                if($resultado){
                    /*Redireccionar al usuario para que no haya confusiones a la hora de mandar no se quede con
                    la duda si se mando o no*/
                    header('Location: /admin?resultado=2');
        
            }
        }
            //! Eliminar un registro 
            public function eliminar() {
                $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
                $resultado = self::$db->query($query);

                if($resultado){ // Si SI se pudo se redirecciona a header
                    $this->borrarImagen();
                    header('location: /admin?resultado=3');
                }
            }

           // 1
            public function setImagen($imagen){
                // Si hay una imagen previa LA ELIMINA
                
                if(!is_null($this->id)){
                    $this->borrarImagen();
                    }
            // Asignar un atributo al nombre de la imagen
                if($imagen){
                    $this->imagen = $imagen;
                }
            }
            // 2
            //Eliminar el archivo
            public function borrarImagen() {
        
                    //Comprobar si existe el archivo
                    $existeArchivo = file_exists((CARPETA_IMAGENES . $this->imagen));
                    // Si existe
                    if ($existeArchivo) {
                        unlink(CARPETA_IMAGENES . $this->imagen);
                    }
            }
            
            // IDENTIFICAR Y UNIR ATRIBUTOS DE LA DB
            // 1.1 .-
                public function atributos() {   //Iterar sobre "columnasDB"
                $atributos = [];
                foreach(static::$columnasDB as $columna) {
                    // Evitar problemas con los id
                    if($columna === 'id')continue;
                    $atributos[$columna] = $this->$columna; // Variable por eso ambos tienen '$'
                }
                return $atributos;
            }

            
            //! SANITIZAR EN POO 
                // 1.2.-
                // Método 
                public function sanitizarAtributos(){ // Sanitiza cada atributo/dato
                $atributos =  $this->atributos();
                $sanitizado = [];
                foreach($atributos as $key => $value){ // ARREGLO ASOCIATIVO 
                    $sanitizado[$key] = self::$db->escape_string($value); //Escapar datos a value
                }
                return $sanitizado;
                }

            // Validación 
            public static function getErrores(){ 
                return static::$errores; // Va a heredar clases con static al ser la clase hijo
            } 
            // Errores
            public function validar(){ 
                
                //? Todo está en propiedad.php

                   static::$errores = []; //Limpiar arreglo
                   return self::$errores; 
            }


            //**                                  SEPARACIÓN                             */
            //** Se va a retornar un arreglo asociativo, con los sig metodos se pasa de un arreglo
            //*  A un objeto para ACTIVE RECORD
            

           
            // &Método para lista todas las propiedades 
            //  $propiedades = Propiedad::all();
            public static function all() {       // Consultar DB (registros)
                $query = "SELECT * FROM " . static::$tabla; //Static hereda ese método y busca esa clase en el método que se esté heredando
            
                $resultado = self::consultarSQL($query); 
                
                return $resultado;

                //? EN ACTIVE RECORD SE DEBEN OBTENER OBJETOS
                // debugear($resultado->fetch_assoc()); Este crea arreglos
            }

            //& Método para definir el límite de propiedades ne INDEX
            public static function get($cantidad) {       // Consultar DB (registros)
                $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad; //Static hereda ese método y busca esa clase en el método que se esté heredando
            
                $resultado = self::consultarSQL($query); 
                
                
                return $resultado;

            }

            //Método para buscar un registro por su ID (ACTIVE RECORD)
            public static function find($id){ // Public por que accedo desde aquí
                $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";

                $resultado = self::consultarSQL($query);
                return(array_shift( $resultado));
                
            }
            
            //Método para crear OBJETOS
            public static function consultarSQL($query) {
                // Consultar la DB
                    $resultado = self::$db->query($query);
                // Iterar los resultados
                    $array = [];
                    while($registro = $resultado->fetch_assoc()){
                        $array[] = static::crearObjeto($registro);        
                    }
                
                // Liberar la memoria //! CON ESTO YA NO ES NECESARIO CERRAR LAS CONEXIONES SQL
                    $resultado->free();
                // Retornar los resultados
                    return $array;
            }
                // Método para asignar valores del arreglo a un objeto
            protected static function crearObjeto($registro){
                $objeto = new static ;

                //? CREAR OBJETOS EN MEMORIA IGUALES A DB PARA MAPEARLOS CON ACTIVE RECORD
                foreach ($registro as $key => $value){
                    if(property_exists($objeto, $key)) {// ESTE CÓDIGO MAPEA LA FORMA Y COMPORBANDO 

                    // LLenar y crear un objeto
                    $objeto->$key=$value;
                }}
                    return($objeto);
            }  
                //Método para sincronizar actualizar y propiedad (Cambios con objeto en memoria)
                //! Este código ITERA, MAPEA las propiedades del objeto con llaves del arreglo y las sincroniza 
            public function sincronizar($args = []) {
                // Ir comparando los datos y en diferente se cambia
                
                // Reescribir objetos en memoria
                foreach($args as $key => $value) {
                    if (property_exists($this, $key) && !is_null($value)) { // Comparar con el que tenemos en //* FIND Y POST
                        $this->$key = $value; // Iterar variable una por una
                }
            }
            
}
}
