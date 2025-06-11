<?php 
namespace App; // APP para que //! Se incluya en el autoload
//Clase para atributos de propiedad

class Propiedad extends ActiveRecord {
    protected static $tabla      = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 
    'wc', 'estacionamiento', 'creado', 'vendedores_id'];

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

    public function __construct($args = []) 
            {  // $args permitir la inicialización flexible de las propiedades de la clase al momento de instanciarla.
    
                $this->id              = $args['id'] ?? null;   //! Para que si le de un valor      
                $this->titulo          = $args['titulo'] ?? '';
                $this->precio          = $args['precio'] ?? '';
                $this->imagen          = $args['imagen'] ?? ''; // Inicializar atributos de la clase
                $this->descripcion     = $args['descripcion'] ?? '';
                $this->habitaciones    = $args['habitaciones'] ?? '';
                $this->wc              = $args['wc'] ?? '';
                $this->estacionamiento = $args['estacionamiento'] ?? '';
                $this->creado          = date('Y/m/d');
                $this->vendedores_id   = $args['vendedores_id'] ?? ''; // !!!!!!!!!!!!!!! NO TOCAF ANADA
            }
    
            public function validar(){ 
                
                // Limpiar los errores antes de realizar nuevas validaciones
               
               if(!$this->titulo){
                   self::$errores[] = " ERROR: Debes añadir un título !";
                  }
                  if(!$this->precio){
                   self::$errores[] = " ERROR: El precio es obligatorio !";
                  }
                  if( strlen($this->descripcion) < 20){ 
                   self::$errores[] = " ERROR: La descripción es obligatoria y al menos 30 caracteres !";
                  }
                  if(!$this->habitaciones){
                   self::$errores[] = " ERROR: Debes especificar las habitaciones disponibles !";
                  }
                  if(!$this->wc){
                   self::$errores[] = " ERROR: Debes especificar los baños disponibles !";
                  }
                  if(!$this->estacionamiento){
                   self::$errores[] = " ERROR: Debes especificar los estacionamientos disponibles !";
                  }
                  if(!$this->vendedores_id){
                   self::$errores[] = " ERROR: Debes especificar el vendedor !";
                  }
                  // VALIDAR IMAGEN 
                  
                  /** YA NO SE HACE VALIDACION DE TAMAÑO POR QUE ESTÁ LA LIBRERIA DE INTERVENTION */

                  if(!$this->imagen) { //Validar imagen
                   self::$errores[] = " ERROR: Debes colocar una imagen de la propiedad !";
                  }
       
                  return self::$errores; 
           }


    
}