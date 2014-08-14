<?php
namespace ScriptFUSION\Codec;

use ScriptFUSION\Codec\Decoder\Decoder;
use ScriptFUSION\Codec\Encoder\Encoder;

/**
 * Provides data encoding and decoding.
 */
interface Codec extends Encoder, Decoder {}
