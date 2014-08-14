<?php
namespace ScriptFUSION\Codec;

/**
 * Returns input unmodified.
 */
class TransparentCodec implements Codec {
    function encode($data) {
        return $data;
    }

    function decode($data) {
        return $data;
    }
}
