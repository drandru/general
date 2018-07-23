<?php

namespace DRD\DecoderBundle\Fake;

use DRD\DecoderBundle\Common\StringToArrayDecoderInterface;

class Decoder implements StringToArrayDecoderInterface
{
    /**
     * @var string|int
     */
    private $index;

    /**
     * Decoder constructor.
     * @param int $index
     */
    public function __construct($index = 0)
    {
        if (is_numeric($index) || is_string($index)) {
            $this->index = $index;
        } else {
            $this->index = 0;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function decode(string $data): array
    {
        return [$this->index = $data];
    }
}
