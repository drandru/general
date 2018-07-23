<?php

namespace DRD\DecoderBundle\Json;

use DRD\DecoderBundle\Common\ArrayToStringEncoderInterface;

class Encoder implements ArrayToStringEncoderInterface
{
    /**
     * {@inheritdoc}
     */
    public function encode(array $data): string
    {
        return json_encode($data);
    }
}
