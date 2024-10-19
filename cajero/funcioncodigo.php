<?php
function generarcodigo($length = 10) {
    // Caracteres permitidos en el codigo
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
    // Obtener un identificador de tiempo único
    $uniqueId = uniqid();
    
    // Mezclar el identificador de tiempo con los caracteres permitidos
    $combinedChars = $uniqueId . $chars;
    
    // Obtener la longitud total de caracteres permitidos
    $totalChars = strlen($combinedChars);
    
    // Generar el codigo única
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        // Obtener un índice aleatorio
        $randomIndex = mt_rand(0, $totalChars - 1);
        
        // Agregar el carácter correspondiente al índice aleatorio al cidogo
        $password .= $combinedChars[$randomIndex];
    }
    
    return $password;
}

?>
