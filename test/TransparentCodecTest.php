<?php
use ScriptFUSION\Codec\TransparentCodec;

/**
 * Tests TransparentCodec.
 */
class TransparentCodecTest extends PHPUnit_Framework_TestCase {
    public function testEncode() {
        $encoder = new TransparentCodec;
        $data = uniqid();

        $this->assertSame($data, $encoder->encode($data));
    }

    public function testDecode() {
        $encoder = new TransparentCodec;
        $data = uniqid();

        $this->assertSame($data, $encoder->decode($data));
    }
}
