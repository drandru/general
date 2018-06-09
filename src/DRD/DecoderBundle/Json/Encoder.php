<?php

namespace DRD\DecoderBundle\Json;

use DRD\DecoderBundle\Common\ArrayToStringCoderInterface;

class Encoder implements ArrayToStringCoderInterface
{
    /**
     * {@inheritdoc}
     */
    public function encode(array $data): string
    {
        return json_encode($data);
    }
}
