<?php 
namespace App;
class Vendedor extends ActiveRecord {

    protected static $tabla   = 'vendedores'; //Nombre de la tabla NOO de la clase "vendendores_id"
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'email'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;

    public function __construct($args = []) 
            {  // $args permitir la inicialización flexible de las propiedades de la clase al momento de instanciarla.
    
                $this->id                = $args['id']       ?? null;   //! Para que si le de un valor      
                $this->nombre            = $args['nombre']   ?? '';
                $this->apellido          = $args['apellido'] ?? '';
                $this->telefono          = $args['telefono'] ?? ''; // Inicializar atributos de la clase
                $this->email             = $args['email']    ?? ''; // Inicializar atributos de la clase
                
            }
            //! Se hereda gracias a ACTIVE RECORD
            public function validar(){ 
                // Limpiar los errores antes de realizar nuevas validaciones
               
               if(!$this->nombre){
                   self::$errores[] = " ERROR: Debes añadir un Nombre";
                  }
               if(!$this->apellido){
               self::$errores[] = " ERROR: Debes añadir un Apellido";
               }
               if(!$this->email){
                self::$errores[] = " ERROR: Debes añadir un Email Válido";
                }
                if(!$this->telefono){
                    self::$errores[] = " ERROR: Debes añadir un Teléfono Válido";
                    }

                // VALIDAR QUE EL TELÉFONO SEA POR NÚMERO
                //! EXPRESIÓN REEEEGUUUULAAAAR
                if(!preg_match('/[0-9]{10}/', $this->telefono)) {
                // EXPRESIÓN REGULAR: BUSCA UN PATRÓN POR DENTRO DE UN TEXTO
                // '/[0-9]{10}/': Expresión FIJA, ACEPTA SOLO 1-9 y LIMITE de 10
                self::$errores[] = " ERROR: Formato NO Válido";
            }
                return self::$errores;
}


}
?>