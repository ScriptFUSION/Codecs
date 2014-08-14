<?php
namespace ScriptFUSION\Codec;

/**
 * Applies a list of Codecs in series. Codecs are applied in reverse order when decoding.
 */
class CodecList extends \SplDoublyLinkedList implements Codec {
    public function __construct(array $encoders = []) {
        foreach ($encoders as $encoder)
            $this->addEncoder($encoder);
    }

    public function addEncoder(Codec $codec) {
        $this->push($codec);
    }

    public function encode($data) {
        $this->setIteratorMode(self::IT_MODE_FIFO);

        /** @var Codec $encoder */
        foreach ($this as $encoder)
            $data = $encoder->encode($data);

        return $data;
    }

    public function decode($data) {
        $this->setIteratorMode(self::IT_MODE_LIFO);

        /** @var Codec $encoder */
        foreach ($this as $encoder)
            $data = $encoder->decode($data);

        return $data;
    }
}
