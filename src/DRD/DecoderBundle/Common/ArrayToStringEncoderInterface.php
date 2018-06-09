<?php

namespace DRD\DecoderBundle\Common;

interface ArrayToStringEncoderInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function encode(array $data): string;
}
