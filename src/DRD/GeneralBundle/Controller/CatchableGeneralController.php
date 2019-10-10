<?php

namespace DRD\GeneralBundle\Controller;

use DRD\GeneralBundle\Action\ActionInterface;
use DRD\GeneralBundle\Exception\Factory\FactoryInterface;
use DRD\GeneralBundle\Request\Transformer\TransformerInterface as RequestTransformerInterface;
use DRD\GeneralBundle\Response\Transformer\TransformerInterface as ResponseTransformerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

/**
 * Class CatchableGeneralController
 * @package DRD\GeneralBundle\Controller
 */
class CatchableGeneralController extends GeneralController
{
    /**
     * @var FactoryInterface
     */
    private $exceptionFactory;

    /**
     * {@inheritdoc}
     * @param FactoryInterface $responseFactory
     */
    public function __construct(
        RequestTransformerInterface $requestTransformer,
        ActionInterface $action,
        ResponseTransformerInterface $responseTransformer,
        FactoryInterface $factory
    ) {
        parent::__construct($requestTransformer, $action, $responseTransformer);

        $this->exceptionFactory = $factory;
    }

    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function usualAction(SymfonyRequest $symfonyRequest): SymfonyResponse
    {
        try {
            return parent::usualAction($symfonyRequest);
        } catch (Exception $exception) {
            return
                $this
                    ->exceptionFactory
                    ->getTransformer($exception, $symfonyRequest)
                    ->transform($exception, $symfonyRequest)
                ;
        }
    }
}
