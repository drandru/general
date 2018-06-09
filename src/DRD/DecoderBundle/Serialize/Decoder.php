<?php

namespace DRD\DecoderBundle\Serialize;

use DRD\DecoderBundle\Common\StringToArrayDecoderInterface;

class Decoder implements StringToArrayDecoderInterface
{
    /**
     * {@inheritdoc}
     */
    public function decode(string $data): array
    {
        return (array) unserialize($data);
    }
}
