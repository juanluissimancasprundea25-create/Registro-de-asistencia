<?php 
$accion = 'crear';
extract(compact('error')); 
?>
<h2>Registrar nueva asistencia</h2>
<?php if (!empty($error)): ?>
    <div class="error">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?accion=guardar">
    <label for="nombreAlumno">Nombre del alumno </label>
    <input 
        type="text" 
        name="nombreAlumno" 
        id="nombreAlumno" 
        required 
        maxlength="40"
        value="<?php echo htmlspecialchars($_POST['nombreAlumno'] ?? ''); ?>"
    >
    <label for="asiste">¿Hoy va a asistir?</label>
    <select name="asiste" id="asiste" required>
        <option value=""> Selecciona </option>
        <option value="si" <?php echo (($_POST['asiste'] ?? '') == 'si') ? 'selected' : ''; ?>>Si, asiste</option>
        <option value="no" <?php echo (($_POST['asiste'] ?? '') == 'no') ? 'selected' : ''; ?>>No asiste</option>
    </select>
    <button type="submit">Guardar asistencia</button>
    <a href="index.php?accion=listar">Cancelar</a>
</form>
</html>
