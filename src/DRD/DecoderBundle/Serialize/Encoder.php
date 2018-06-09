<?php

namespace DRD\DecoderBundle\Serialize;

use DRD\DecoderBundle\Common\ArrayToStringCoderInterface;

class Encoder implements ArrayToStringCoderInterface
{
    /**
     * {@inheritdoc}
     */
    public function encode(array $data): string
    {
        return serialize($data);
    }
}
