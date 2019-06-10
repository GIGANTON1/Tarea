<?php 
function validar($data){
    $archivo = explode('.', $_FILES['imagen']['name']);
    $nombre = '';
    $extencion = $archivo[count($archivo)-1];
    for ($i = 0; $i<(count($archivo)-1); $i++){
        $nombre = $nombre . $archivo[$i] . '.';
    }
    $ultimo_nombre = $nombre . time() . '-' . mt_rand(1000,9999) . '.' . $extencion;
    $urlimg = 'imagenes/'.$ultimo_nombre;
    $imagen = $data['imagen'] ?? '';
    $ver_tipo = explode('/', $_FILES['imagen']['type']);

/*if(!empty($_POST)){
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    $contador = count($_FILES['imagen']['name']);
    for($i=0; $i< $contador; $i++){
        $archivo = explode('.',$_FILES['imagen']['name'][$i]);
        $extension = $archivo[1];
        $nombre = time() . mt_rand(1, 1000) . '.' . $extension;
        if(move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $nombre)){
            echo 'Se subió el archivo con exito';
        }else{
            echo 'Algo salio mal';
        }
 }*/
    $numero_cuenta = $_POST['numero_cuenta'] ?? '' ;
    $primer_nombre = $_POST['primer_nombre'] ?? '' ;
    $apellido = $_POST['apellido'] ?? '' ;
    $correo = $_POST['correo'] ?? '' ;
    $dia = $_POST['dia'] ?? '' ;
    $mes = $_POST['mes'] ?? '' ;
    $year = $_POST['year'] ?? '' ;

    $errores = [];
    if(empty($numero_cuenta) || mb_strlen($numero_cuenta) !=13){
        $errores[] = "El numero de cuenta debe contener exactamente 13 caracteres";
    }

    if(empty($primer_nombre) || mb_strlen($primer_nombre) > 20){
        $errores[] = "El primer nombre no debe estar vacio y debe ser menor a 20 caracteres";
    }

    if(empty($apellido) || mb_strlen($apellido) > 20){
        $errores[] = "El apellido no debe estar vacio y debe ser menor de 20 caracteres";
    }

    if(empty($correo) || mb_strlen($correo) > 100){
        $errores[] = "El correo no debe estar vacio y debe ser menor a 100 caracteres";
    }
    if(empty($imagen) || $ver_tipo[0] != 'image'){
        $errores[] = "El campo imagen es Obligatorio o el archivo no es una imagen";
    }else{
        move_uploaded_file($_FILES['imagen']['tmp_name'], $urlimg);
    }

    $fecha = $year . "-" . $mes. "-" . $dia;
    if (count($errores) === 0){
    try{
        $pdo = new PDO('mysql:dbname:matricula;host=127.0.0.1', 'root', 'orel199719');
        $stmt = $pdo->prepare("INSERT INTO estudiantes (numero_cuenta, primer_nombre, apellido, 
        fecha_nacimiento, correo, imagen)
        VALUES(?, ?, ?, ?, ?, ?)");
        $stmt ->bindValue(1, $numero_cuenta);
        $stmt ->bindValue(2, $primer_nombre);
        $stmt ->bindValue(3, $apellido);
        $stmt ->bindValue(4, $fecha);
        $stmt ->bindValue(5, $correo);

        $stmt -> execute();
        echo "Guardado";

    }catch(PDOException $e){
        echo $e->getMessage();
    }
    }else{
    for ($i=0; $i<count($errores);$i++){
        echo $errores[$i] . '<br>';
    }
    
}
}