<?php

namespace Tests\DRD\GeneralBundle\ObjectBuilder;

use DRD\GeneralBundle\ObjectBuilder\ObjectBuilder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class ObjectBuilder
 * @package DRD\GeneralBundle\ObjectBuilder
 */
class ObjectBuilderTest extends WebTestCase
{
    const OBJECT_FORM_TYPE = 'object form type';

    const DATA = ['data'];

    const ANY_DATA = 'any data';

    /**
     * @test
     */
    public function build()
    {
        $builder = $this->createBuilder();

        $response = $builder->build($this->createObject(), self::OBJECT_FORM_TYPE, self::DATA);

        $this->assertEquals($this->createObject(), $response);
    }

    private function createBuilder()
    {
        return new ObjectBuilder($this->createFormFactoryMock());
    }

    /**
     * @return FormFactoryInterface
     */
    private function createFormFactoryMock(): FormFactoryInterface
    {
        $mock = $this->createMock(FormFactoryInterface::class);

        $mock
            ->expects($this->once())
            ->method('create')
            ->with(self::OBJECT_FORM_TYPE, $this->createObject())
            ->willReturn($this->createFormMock())
        ;

        /** @var FormFactoryInterface $mock */
        return $mock;
    }

    /**
     * @return object
     */
    private function createObject()
    {
        return
            new class(self::ANY_DATA) {
                public $var;
                public function __construct($var){$this->var = $var;}
            };
    }

    /**
     * @return FormInterface
     */
    private function createFormMock(): FormInterface
    {
        $mock = $this->createMock(FormInterface::class);

        $mock
            ->expects($this->once())
            ->method('submit')
            ->with(self::DATA)
        ;

        /** @var FormInterface $mock */
        return $mock;
    }
}
