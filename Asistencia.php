<?php
class Asistencia {
    private $id;
    private $nombreAlumno;
    private $fecha;
    private $asiste;
    
    public function __construct($id = null, $nombreAlumno = '', $fecha = null, $asiste = 'NO') {
        $this->id = $id;
        $this->nombreAlumno = $nombreAlumno;
        $this->fecha = $fecha ?? date('Y-m-d H:i:s');
        $this->asiste = $asiste;
    }
    
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getNombreAlumno() { return $this->nombreAlumno; }
    public function setNombreAlumno($nombre) { $this->nombreAlumno = $nombre; }
    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }
    public function getAsiste() { return $this->asiste; }
    public function setAsiste($asiste) { $this->asiste = $asiste; }
}
