<?php
namespace Model;

class Profesional extends ActiveRecord {
    protected static $tabla = 'profesionales';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'especialidad'];

    public $id;
    public $nombre;
    public $apellido;
    public $especialidad;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->especialidad = $args['especialidad'] ?? '';
    }
}