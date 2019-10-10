<?php

namespace DRD\GeneralBundle\Exception\Factory;

use DRD\GeneralBundle\Exception\Transformer\TransformerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

/**
 * Interface FactoryInterface
 * @package DRD\GeneralBundle\Exception\Factory
 */
interface FactoryInterface
{
    /**
     * @param Exception $exception
     * @param SymfonyRequest $request
     * @return TransformerInterface
     * @throws Exception
     */
    public function getTransformer(Exception $exception, SymfonyRequest $request): TransformerInterface;
}
