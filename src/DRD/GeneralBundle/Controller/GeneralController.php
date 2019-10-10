<?php

namespace DRD\GeneralBundle\Controller;

use DRD\GeneralBundle\Action\ActionInterface;
use DRD\GeneralBundle\Request\Transformer\TransformerInterface as RequestTransformerInterface;
use DRD\GeneralBundle\Response\Transformer\TransformerInterface as ResponseTransformerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

/**
 * Class GeneralController
 * @package DRD\GeneralBundle\Controller
 */
class GeneralController extends AbstractController
{
    /**
     * @var RequestTransformerInterface
     */
    private $requestTransformer = null;

    /**
     * @var ActionInterface
     */
    private $action = null;

    /**
     * @var ResponseTransformerInterface
     */
    private $responseTransformer = null;

    /**
     * @param RequestTransformerInterface $requestTransformer
     * @param ActionInterface $action
     * @param ResponseTransformerInterface $responseTransformer
     */
    public function __construct(
        RequestTransformerInterface $requestTransformer,
        ActionInterface $action,
        ResponseTransformerInterface $responseTransformer
    ) {
        $this->requestTransformer = $requestTransformer;
        $this->action = $action;
        $this->responseTransformer = $responseTransformer;
    }

    /**
     * @param SymfonyRequest $symfonyRequest
     * @return SymfonyResponse
     */
    public function usualAction(SymfonyRequest $symfonyRequest): SymfonyResponse
    {
        $request = $this->requestTransformer->transform($symfonyRequest);
        $response = $this->action->makeAction($request);

        return $this->responseTransformer->transform($response);
    }
}
