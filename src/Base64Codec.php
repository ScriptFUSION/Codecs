<?php
namespace ScriptFUSION\Codec;

/**
 * Provides MIME base64 encoding.
 */
class Base64Codec implements Codec {
    public function encode($data) {
        return chop(base64_encode($data), '=');
    }

    public function decode($data) {
        return base64_decode($data);
    }
}
