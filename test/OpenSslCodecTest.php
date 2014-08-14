<?php
use ScriptFUSION\Codec\OpenSslCodec;

/**
 * Tests OpenSslCodec.
 */
class OpenSslCodecTest extends \PHPUnit_Framework_TestCase {
    /** @dataProvider provideRoundTripCiphers */
    public function testCipherRoundTrip($cipher, $cipherName) {
        $encoder = new OpenSslCodec($cipher, uniqid());
        $data = uniqid();

        $this->assertNotEquals($data, $encoded = $encoder->encode($data), "$cipherName encode");
        $this->assertSame($data, $encoder->decode($encoded), "$cipherName decode");
    }

    public function provideRoundTripCiphers() {
        return [
            ['bf', 'Blowfish'],
            ['aes-256-cbc', 'AES-256'],
            ['aes-256-cfb', 'AES-256 CFB'],
            ['aes-256-ofb', 'AES-256 OFB']
        ];
    }
}
