<html>
<head>
<title>Formulario para Agregar Estudiantes</title>
</head>
<style>
input:not([type="submit"]){
    border: 0;
    border-bottom: 1px solid #000;
    padding: 5px;
    font-size: 20px;
}
input: focus{
    border: 0;
}
select{
    margin-top: 20px;
    padding: 5px;
    font-size: 16px;
}
.input-group{
    display: flex;
    flex-direction: column;
    margin-top: 25px;
}
</style>
<body>
    <form action="guardar.php" method="POST" enctype="multipart/form-data">
        <div class="">
            <label for="numero_cuenta">Numero de Cuenta</label>
            <br>
            <input type="text" maxlenght="13" name="numero_cuenta" id="numero_cuenta">
        </div>
        <div style="display-flex">
            <div class="input_group">
                <label for="primer_nombre">Primer Nombre</label>
                <br>
                <input type="text" maxlenght="20" name="primer_nombre" id="primer_nombre">
            </div>
            <div class="input_group">
                <label for="apellido">Apellido</label>
                <br>
                <input type="text" maxlenght="20" name="apellido" id="apellido">
            </div>
        </div>
        <div class="input_group">
                <label for="correo">Correo Electronico</label>
                <br>
                <input type="text" maxlenght="100" name="correo" id="correo">
        </div>

        <div style="display-flex">
            <select name="dia">
                <option>Día</option>
                <?php for($i=1; $i <= 31; $i++):?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
            <select name="mes">
                <option>Mes</option>
                <?php for($i=1; $i <= 12; $i++):?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
            <select name="year">
                <option>Año</option>
                <?php for($i=1980; $i <= 2000; $i++):?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="input_group">
                <label for="imagen">Foto de Perfil</label>
                <br>
                <input type="file"  name="imagen[]" id="imagen" accept="image/*"
                    multiple>
        </div>

    <input type="submit" value="Enviar" >

    </form>
</body>
</html>