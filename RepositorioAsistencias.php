<?php
require_once __DIR__ . '/Asistencia.php';

class RepositorioAsistencias {
    private $archivo;
    private $errores = [];
    
    public function __construct() {
        $this->archivo = __DIR__ . '/../../storage/asistencias.txt';
    }
    
    public function getErrores() {
        return $this->errores;
    }
    
    public function obtenerTodas() {
        $asistencias = [];
        if (!file_exists($this->archivo)) {
            return $asistencias;
        }
        $lineas = file($this->archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $numLinea => $linea) {
            $datos = explode('|', $linea);
            
            // Comprobar que tiene 4 campos
            if (count($datos) !== 4) {
                $error = "Esta linea " . ($numLinea + 1) . " esta corrupta: " . $linea;
                $this->errores[] = $error;
                error_log("ERROR: " . $error . "\n", 3, __DIR__ . '/../../storage/errores.log');
                continue;
            }
            
            // Comprobar asistencias
            if (!in_array($datos[3], ['si', 'no'])) {
                $error = "En esta linea " . ($numLinea + 1) . " el valor no vale :( : " . $datos[3];
                $this->errores[] = $error;
                error_log("MAL: " . $error . "\n", 3, __DIR__ . '/../../storage/errores.log');
                continue;
            }
            $asistencias[] = new Asistencia($datos[0], $datos[1], $datos[2], $datos[3]);
        }
        return $asistencias;
    }
    
    public function guardar($nombreAlumno, $asiste) {
        $asistencias = $this->obtenerTodas();
        $nuevoId = 1;
        foreach ($asistencias as $a) {
            if ($a->getId() >= $nuevoId) {
                $nuevoId = $a->getId() + 1;
            }
        }
        $asistencia = new Asistencia($nuevoId, $nombreAlumno, null, $asiste);
        $asistencias[] = $asistencia;
        $this->guardarEnArchivo($asistencias);
    }
    
    private function guardarEnArchivo($asistencias) {
        $contenido = '';
        foreach ($asistencias as $asistencia) {
            $contenido .= $asistencia->getId() . '|' . 
                          $asistencia->getNombreAlumno() . '|' . 
                          $asistencia->getFecha() . '|' . 
                          $asistencia->getAsiste() . "\n";
        }
        if (file_put_contents($this->archivo, $contenido) === false) {
            throw new Exception('No lo hemos podido guardar , sorry :(');
        }
    }
}
