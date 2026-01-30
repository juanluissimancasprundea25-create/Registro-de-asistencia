<?php 
$accion = 'listar';
extract(compact('asistencias', 'errores')); 
?>

<h2>Listado de asistencias</h2>

<?php if (!empty($errores)): ?>
    <div class="error">
        <strong>Los errores son estos:</strong>
        <ul style="margin-top: 8px; margin-left: 20px;">
            <?php foreach ($errores as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<p style="margin-bottom: 20px;">
    <a href="index.php?accion=crear" class="btn">Registrar nueva asistencia</a>
</p>

<?php if (count($asistencias) == 0): ?>
    <div class="empty">
        <p>No hay nadie registrado</p>
        <p style="margin-top: 10px;">
            <a href="index.php?accion=crear" class="btn">Registrar primera asistencia</a>
        </p>
    </div>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Nombre alumno</th>
                <th>Fecha</th>
                <th>Asiste</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asistencias as $asistencia): ?>
            <tr>
                <td><?php echo htmlspecialchars($asistencia->getNombreAlumno()); ?></td>
                <td><?php echo $asistencia->getFecha(); ?></td>
                <td>
                    <?php if ($asistencia->getAsiste() == 'si'): ?>
                        <span class="asiste-si">si</span>
                    <?php else: ?>
                        <span class="asiste-no">no</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

        </main>
    </div>
</body>
</html>
