<?php

namespace DRD\DecoderBundle\Serialize;

use DRD\DecoderBundle\Common\ArrayToStringEncoderInterface;

class Encoder implements ArrayToStringEncoderInterface
{
    /**
     * {@inheritdoc}
     */
    public function encode(array $data): string
    {
        return serialize($data);
    }
}
