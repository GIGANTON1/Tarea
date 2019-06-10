<?php 
$nombre;
$edades;
setcookie("id", "0101199701105", time() + 3600, "/"); 
if(!empty($_POST)){
    $nombre = $_POST['nombre'] ?? [];
    $edades = $_POST['edades'] ?? [];
    if(count($nombre) != count($edades) ){
        echo 'La cantidad de Nombres no coinciden con la cantidad de edades.';
    } else {   
        for($i = 0; $i < count($_POST['nombre']); $i++){
            echo $_POST['nombre'][$i]. ' -> ' . $_POST['edades'][$i] . '<br>';
        }
    }
    /*$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $usuario = $_POST['usuario'] ?? '--';
    echo 'Hay datos dentro del POST';*/
}
/*if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
    echo 'Se registro al usuario ' . $usuario;
}*/
?>
<html>

<head>
<title>Negocios Web</title>
</head>
<body>
    <form action="guardar.php" method="POST">
        <!--<input type="text" name="nombre_completo" placeholder="Nombre Completo">
        <br>
        <br>
        <div>
            <input type="checkbox" name="intereses[]" value="programacion" id="programacion">
            <label for="programacion">Programacion</label>
        </div>
        
        <div>
            <input type="checkbox" name="intereses[]" value="deportes" id="deportes">
            <label for="deportes">Deportes</label>
        </div>
        <div>
            <input type="checkbox" name="intereses[]" value="musica" id="musica">
            <label for="musica">Musica</label>
        </div>
        <br>
        <br>-->
        <button id="agregar_estudiante" onclick="agregarEstudiante(event)">Agregar Estudiante</button>
        <br>
        <br>
        <div id="lista_estudiantes">
        <div>
            <input type="text" maxlenght="20" name="nombre[]">
            <input type="number" name="edades[]" min="18">
            <br>
            <br>
            <?php
            for($i = 0; $i < count($_POST['nombre']); $i++){
                echo  '<input type="text" maxlenght="20" name="nombre[]" value="'.$nombre[$i].'">';
                echo '<input type="number" name="edades[]" min="18" value="'.$edades[$i].'">';
            }
            ?>
        </div>
        </div>
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>

<script>
function agregarEstudiante(e) {
    e.preventDefault();
    let contenedor = document.createElement('div');
    let nombre = document.createElement('input');
    nombre.name = "nombre[]";
    nombre.type = "text";
    let edad = document.createElement('input');
    edad.name = "edades[]";
    edad.type = "number";
    edad.min = "18";
    contenedor.appendChild(nombre); 
    contenedor.appendChild(edad);

    let lista = document.getElementById('lista_estudiantes')
    lista.appendChild(contenedor);

}
</script>
</body>
</html>