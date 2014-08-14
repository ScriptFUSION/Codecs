<?php
namespace ScriptFUSION\Codec;

/**
 * Provides rot13 alphabet substitution.
 */
class Rot13Codec implements Codec {
    function encode($data) {
        return str_rot13($data);
    }

    function decode($data) {
        return $this->encode($data);
    }
}
