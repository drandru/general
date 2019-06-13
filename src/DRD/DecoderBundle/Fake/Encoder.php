<?php

namespace DRD\DecoderBundle\Fake;

use DRD\DecoderBundle\Common\ArrayToStringEncoderInterface;

class Encoder implements ArrayToStringEncoderInterface
{
    /**
     * @var string|int
     */
    private $index;

    /**
     * Encoder constructor.
     * @param int $index
     */
    public function __construct($index = 0)
    {
        if (is_numeric($index) || is_string($index)) {
            $this->index = $index;
        } else {
            $this->index = null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function encode(array $data): string
    {
        if ($this->index && isset($data[$this->index])) {
            return $data[$this->index];
        }

        return reset($data);
    }
}
