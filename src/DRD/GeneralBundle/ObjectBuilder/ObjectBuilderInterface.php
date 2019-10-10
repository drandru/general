<?php

namespace DRD\GeneralBundle\ObjectBuilder;

/**
 * Interface ObjectBuilderInterface
 * @package DRD\GeneralBundle\ObjectBuilder
 */
interface ObjectBuilderInterface
{
    /**
     * @param object $object
     * @param string $objectFormType
     * @param mixed[] $data
     * @return object
     */
    public function build($object, $objectFormType, array $data);
}
