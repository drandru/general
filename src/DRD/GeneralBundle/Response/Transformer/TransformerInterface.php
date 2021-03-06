<?php

namespace DRD\GeneralBundle\Response\Transformer;

use DRD\GeneralBundle\Response\ResponseInterface;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

interface TransformerInterface
{
    /**
     * @param ResponseInterface $response
     * @param int $status
     * @param array $headers
     * @return SymfonyResponse
     */
    public function transform(ResponseInterface $response, $status = 200, $headers = array()): SymfonyResponse;
}
