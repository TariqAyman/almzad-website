<?php

namespace App\Helpers;

class AlrajhiPaymentEncryption
{
    function encryptAES($str, $key)
    {
        $str = urlencode($str);
        $str = $this->pkcs5_pad($str);
        $ivlen = openssl_cipher_iv_length($cipher = "aes-256-cbc");
        $iv = "PGKEYENCDECIVSPC";
        $encrypted = openssl_encrypt($str, "aes-256-cbc", $key, OPENSSL_ZERO_PADDING, $iv);
        $encrypted = base64_decode($encrypted);
        $encrypted = unpack('C*', ($encrypted));
        $encrypted = $this->byteArray2Hex($encrypted);
        return $encrypted;
    }

    function pkcs5_pad($text)
    {
        $blocksize = 16;
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    function byteArray2Hex($byteArray)
    {
        $chars = array_map("chr", $byteArray);
        $bin = join($chars);
        return bin2hex($bin);
    }


    function decryptData($code, $key)
    {
        $code = $this->hex2ByteArray(trim($code));
        $code = $this->byteArray2String($code);
        $iv = "PGKEYENCDECIVSPC";
        $code = base64_encode($code);
        $decrypted = openssl_decrypt($code, 'AES-256-CBC', $key, OPENSSL_ZERO_PADDING, $iv);

        $len = strlen($decrypted);
        $pad = ord($decrypted[$len-1]);

        $decrypted = substr($decrypted, 0, strlen($decrypted) - $pad);

        return urldecode($decrypted);
    }


    function hex2ByteArray($hexString)
    {
        $string = hex2bin($hexString);
        return unpack('C*', $string);
    }

    function byteArray2String($byteArray)
    {
        $chars = array_map("chr", $byteArray);
        return join($chars);
    }
}
