<?php

namespace DRD\DecoderBundle\Json;

use DRD\DecoderBundle\Common\StringToArrayDecoderInterface;

class Decoder implements StringToArrayDecoderInterface
{
    /**
     * {@inheritdoc}
     */
    public function decode(string $data): array
    {
        return (array) json_decode($data, true);
    }
}
