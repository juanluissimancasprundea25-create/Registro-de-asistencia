<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Asistencias</title>
    <style>
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.2); }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        form input[type="text"] { width: 100%; padding: 10px; margin-bottom: 15px; }
        form select { width: 100%; padding: 10px; margin-bottom: 20px;   }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Registro de asistencias</h1>
            <p>Control de asistencia a clase</p>
        </header>
        <nav>
            <a href="index.php?accion=listar" class="<?php echo ($accion ?? 'listar') == 'listar' ? 'active' : ''; ?>">Listar asistencias</a>
            <a href="index.php?accion=crear" class="<?php echo ($accion ?? '') == 'crear' ? 'active' : ''; ?>">Registrar asistencia</a>
        </nav>
</body>
