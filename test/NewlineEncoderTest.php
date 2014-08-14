<?php
use ScriptFUSION\Codec\Encoder\NewlineEncoder;

/**
 * Tests NewlineEncoder.
 */
class NewlineEncoderTest extends PHPUnit_Framework_TestCase {
    /** @dataProvider provideLineEndings */
    public function testCrEncoding($ending, $name) {
        $this->assertSame(NewlineEncoder::CR, (new NewlineEncoder(NewlineEncoder::CR))->encode($ending), $name);
    }

    /** @dataProvider provideLineEndings */
    public function testLfEncoding($ending, $name) {
        $this->assertSame(NewlineEncoder::LF, (new NewlineEncoder(NewlineEncoder::LF))->encode($ending), $name);
    }

    /** @dataProvider provideLineEndings */
    public function testCrlfEncoding($ending, $name) {
        $this->assertSame(NewlineEncoder::CRLF, (new NewlineEncoder(NewlineEncoder::CRLF))->encode($ending), $name);
    }

    /**
     * @return array [[line_ending, line_ending_name] ...]
     */
    public function provideLineEndings() {
        return [
            ["\r", 'CR'], ["\n", 'LF'], ["\r\n", 'CRLF']
        ];
    }
}
