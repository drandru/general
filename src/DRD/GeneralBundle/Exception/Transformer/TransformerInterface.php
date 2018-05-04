<?php

namespace DRD\GeneralBundle\Exception\Transformer;

use Exception;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

interface TransformerInterface
{
    /**
     * @param Exception $exception
     * @param SymfonyRequest $request
     * @return SymfonyResponse
     * @throws Exception
     */
    public function transform(Exception $exception, SymfonyRequest $request): SymfonyResponse;
}
