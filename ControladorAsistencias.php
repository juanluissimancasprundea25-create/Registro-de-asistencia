<?php
require_once __DIR__ . '/../Modelos/Asistencia.php';
require_once __DIR__ . '/../Modelos/RepositorioAsistencias.php';
require_once __DIR__ . '/../Vistas/layout.php';

class ControladorAsistencias {
    private $repo;
    
    public function __construct() {
        $this->repo = new RepositorioAsistencias();
    }
    
    public function listar() {
        $asistencias = $this->repo->obtenerTodas();
        $errores = $this->repo->getErrores();
        require_once __DIR__ . '/../Vistas/asistencias/listar.php';
    }
    
    public function crear() {
        $error = $_SESSION['error'] ?? '';
        unset($_SESSION['error']);
        require_once __DIR__ . '/../Vistas/asistencias/crear.php';
    }
    
    public function guardar() {
        try {
            $nombreAlumno = trim($_POST['nombreAlumno'] ?? '');
            $asiste = $_POST['asiste'] ?? '';
            
            // Comprobamos el nombre nombre
            if (empty($nombreAlumno)) {
                throw new Exception('Pon el nombre , es obligatorio :)');
            }
            if (strlen($nombreAlumno) < 3) {
                throw new Exception('Minimo ponle un nombre que supere las 3 letras XDD');
            }
            if (strlen($nombreAlumno) > 40) {
                throw new Exception('Bro , era nombre , no todo su linaje , no mas de 40 letras');
            }
    
            // Comprobar la asistencia
            if (!in_array($asiste, ['si', 'no'])) {
                throw new Exception('Tiene que ser si o no , aclarate');
            }
            $this->repo->guardar($nombreAlumno, $asiste);
            header('Location: index.php?accion=listar');
            exit;
        } catch (Exception $e) {
            error_log("ERROR: " . $e->getMessage() . "\n", 3, __DIR__ . '/../../../storage/errores.log');
            $_SESSION['error'] = $e->getMessage();
            header('Location: index.php?accion=crear');
            exit;
        }
    }
}
