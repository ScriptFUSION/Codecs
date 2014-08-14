<?php
namespace ScriptFUSION\Codec\Encoder;

/**
 * Converts CR, LF and CRLF line endings to the specified line ending.
 */
class NewlineEncoder implements Encoder {
    const
        CR = "\r",
        LF = "\n",
        CRLF = "\r\n"
    ;

    private $ending;

    public function __construct($lineEnding) {
        $this->ending = $lineEnding;
    }

    function encode($data) {
        return preg_replace(
            // When converting to CRLF...
            $this->ending === self::CRLF
                // replace line feeds not preceded by carriage returns or carriage returns not proceeded by line feeds.
                ? '[(?<!\r)\n|\r(?!\n)]'
                /*
                 * Otherwise, replace line feeds optionally preceded by a carriage return or single occurrences of
                 * carriage returns.
                 */
                : '[\r?\n|\r]',
            $this->ending,
            $data
        );
    }
}
