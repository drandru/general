<?php

namespace DRD\DecoderBundle\Common;

interface StringToArrayDecoderInterface
{
    /**
     * @param string $data
     * @return array
     */
    public function decode(string $data): array;
}
