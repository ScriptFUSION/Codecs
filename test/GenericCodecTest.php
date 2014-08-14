<?php
use ScriptFUSION\Codec\Base64Codec;
use ScriptFUSION\Codec\Codec;
use ScriptFUSION\Codec\CodecList;
use ScriptFUSION\Codec\Rot13Codec;

/**
 * Tests Codecs with non-specific requirements.
 */
class GenericCodecTest extends PHPUnit_Framework_TestCase {
    /** @dataProvider provideEncoders */
    public function testRoundTrip(Codec $codec) {
        $data = uniqid();

        $this->assertNotEquals($data, $encodedData = $codec->encode($data), get_class($codec) . ' encode');
        $this->assertSame($data, $codec->decode($encodedData), get_class($codec) . ' decode');
    }

    public function provideEncoders() {
        return [
            [new Base64Codec],
            [new Rot13Codec],
            [new CodecList([new Rot13Codec, new Base64Codec])],
        ];
    }
}
