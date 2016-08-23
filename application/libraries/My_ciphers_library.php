<?php
//  encryption
    class My_ciphers_library{
        var $key = '';
        function __construct(){
            $this->key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a0123");
        }
        
        function encryption($str){
           $return = false;
            if(strlen($str)>0){
                $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key,$str, MCRYPT_MODE_CBC, DEC_IV);
                $ciphertext = DEC_IV . $ciphertext;
                $return = base64_encode($ciphertext);
            }
            return $return;
        }
        
        function decryption($str){
            $return = false;
            if(strlen($str)>0){
                $ciphertext_dec = base64_decode($str);
                $iv_dec = substr($ciphertext_dec, 0, DEC_IV_SIZE);
                $ciphertext_dec = substr($ciphertext_dec, DEC_IV_SIZE);
                $return = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
            }
            return $return;
        }
    }
?>
