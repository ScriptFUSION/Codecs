<?php
namespace ScriptFUSION\Codec;

/**
 * Provides OpenSSL encryption.
 */
class OpenSslCodec implements Codec {
    private
        $cipher,
        $password
    ;

    public function __construct($cipher, $password) {
        $this->cipher = $cipher;
        $this->password = $password;
    }


    public function encode($data) {
        $iv = $this->generateIv();

        return $iv . openssl_encrypt($data, $this->cipher, $this->password, OPENSSL_RAW_DATA, $iv);
    }

    public function decode($data) {
        $ivLength = openssl_cipher_iv_length($this->cipher);
        $iv = substr($data, 0, $ivLength);
        $data = substr($data, $ivLength);

        return openssl_decrypt($data, $this->cipher, $this->password, OPENSSL_RAW_DATA, $iv);
    }

    private function generateIv() {
        return openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
    }
}
