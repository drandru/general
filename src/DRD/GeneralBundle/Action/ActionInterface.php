<?php

namespace DRD\GeneralBundle\Action;

use DRD\GeneralBundle\Request\RequestInterface;
use DRD\GeneralBundle\Response\ResponseInterface;

/**
 * Interface ActionInterface
 * @package MosRu\GeneralBundle\Action
 */
interface ActionInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function makeAction(RequestInterface $request):ResponseInterface;
}
