<?php

namespace DRD\GeneralBundle\Request\Transformer;

use DRD\GeneralBundle\Request\RequestInterface;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

interface TransformerInterface
{
    /**
     * @param SymfonyRequest $request
     * @return RequestInterface
     */
    public function transform(SymfonyRequest $request): RequestInterface;
}
