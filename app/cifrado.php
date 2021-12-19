<?php
    function cifrar($text,$clave){
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted=openssl_encrypt($text, "aes-256-cbc", $clave, 0, $iv);
        return base64_encode($encrypted."::".$iv);
    }
    function desencriptar($text,$clave){
        list($encriptado, $iv) = explode('::', base64_decode($text), 2); #Se separa el numero de cuenta y el vector de iniciacion
        return openssl_decrypt($encriptado, 'aes-256-cbc', $clave, 0, $iv); #Se devuelve el texto descifrado
    }
?>