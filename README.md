Codecs
======

A collection of codecs for encoding and decoding data. Encoders encode, decoders decode; codecs do both. Codecs inherit
from the `Codec` interface.

Codecs and encoders list
------------------------

The following codecs and encoders are available.

 - `Base64Codec` &ndash; [Base64](http://php.net/manual/en/function.base64-encode.php) encoding.
 - `CodecList` &ndash; Applies a list of codecs in series.
 - `NewlineEncoder` &ndash; Converts line endings.
 - `OpenSslCodec` &ndash; [OpenSSL](http://php.net/manual/en/book.openssl.php) encryption.
 - `Rot13Codec` &ndash; [Rot13](http://php.net/manual/en/function.str-rot13.php) encoding.
 - `TransparentCodec` &ndash; No encoding.
