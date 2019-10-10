<?php

namespace Tests\DRD\GeneralBundle\Controller;

use DRD\GeneralBundle\Action\ActionInterface;
use DRD\GeneralBundle\Controller\CatchableGeneralController;
use DRD\GeneralBundle\Exception\Factory\FactoryInterface;
use DRD\GeneralBundle\Exception\Transformer\TransformerInterface;
use DRD\GeneralBundle\Request\Transformer\TransformerInterface as RequestTransformerInterface;
use DRD\GeneralBundle\Response\Transformer\TransformerInterface as ResponseTransformerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

/**
 * Class CatchableGeneralControllerThowableTest
 * @package Tests\DRD\GeneralBundle\Controller
 */
class CatchableGeneralControllerThowableTest extends WebTestCase
{
    const REQUEST_CONTENT = 'Request content';
    const RESPONSE_CONTENT = 'Response content';
    const EXCEPTION_TEXT = 'Exception content';

    /**
     * @test
     * @throws Exception
     */
    public function usualAction()
    {
        $controller = $this->createController();

        $response = $controller->usualAction($this->createSymfonyRequest());

        $this->assertEquals($this->createSymfonyResponse(), $response);
    }

    /**
     * @return CatchableGeneralController
     */
    private function createController(): CatchableGeneralController
    {
        return
            new CatchableGeneralController(
                $this->createRequestTransformerMock()
                , $this->createActionMock()
                , $this->createResponseTransformerMock()
                , $this->createFactoryMock()
            );
    }

    /**
     * @return RequestTransformerInterface
     */
    private function createRequestTransformerMock(): RequestTransformerInterface
    {
        $mock = $this->createMock(RequestTransformerInterface::class);

        $mock
            ->expects($this->once())
            ->method('transform')
            ->with($this->createSymfonyRequest())
            ->willThrowException(new Exception(self::EXCEPTION_TEXT))
        ;

        /** @var RequestTransformerInterface $mock */
        return $mock;
    }

    /**
     * @return ActionInterface
     */
    private function createActionMock(): ActionInterface
    {
        $mock = $this->createMock(ActionInterface::class);

        $mock
            ->expects($this->never())
            ->method('makeAction')
        ;

        /** @var ActionInterface $mock */
        return $mock;
    }

    /**
     * @return ResponseTransformerInterface
     */
    private function createResponseTransformerMock(): ResponseTransformerInterface
    {
        $mock = $this->createMock(ResponseTransformerInterface::class);

        $mock
            ->expects($this->never())
            ->method('transform')
        ;

        /** @var ResponseTransformerInterface $mock */
        return $mock;
    }

    /**
     * @return FactoryInterface
     */
    private function createFactoryMock(): FactoryInterface
    {
        $mock = $this->createMock(FactoryInterface::class);

        $mock
            ->expects($this->once())
            ->method('getTransformer')
            ->with(new Exception(self::EXCEPTION_TEXT), $this->createSymfonyRequest())
            ->willReturn($this->createTransformerMock())
        ;

        /** @var FactoryInterface $mock */
        return $mock;
    }

    /**
     * @return SymfonyRequest
     */
    private function createSymfonyRequest(): SymfonyRequest
    {
        return new SymfonyRequest([self::REQUEST_CONTENT]);
    }

    /**
     * @return SymfonyResponse
     */
    private function createSymfonyResponse(): SymfonyResponse
    {
        return new SymfonyResponse(self::REQUEST_CONTENT);
    }

    /**
     * @return TransformerInterface
     */
    private function createTransformerMock(): TransformerInterface
    {
        $mock = $this->createMock(TransformerInterface::class);

        $mock
            ->expects($this->once())
            ->method('transform')
            ->with(new Exception(self::EXCEPTION_TEXT), $this->createSymfonyRequest())
            ->willReturn($this->createSymfonyResponse())
        ;

        /** @var TransformerInterface $mock */
        return $mock;
    }

}
