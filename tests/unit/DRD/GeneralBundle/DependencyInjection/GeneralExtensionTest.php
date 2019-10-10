<?php

namespace Tests\DRD\GeneralBundle\DependencyInjection;

include ('GeneralExtension.php');

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class GeneralExtensionTest
 * @package Tests\DRD\GeneralBundle\DependencyInjection
 */
class GeneralExtensionTest extends WebTestCase
{
    /**
     * @test
     */
    public function load()
    {
        $loader = $this->createLoader();

        $loader->load([], $this->createContainerMock());
    }

    /**
     * @return GeneralExtension
     */
    private function createLoader(): GeneralExtension
    {
        return new GeneralExtension();
    }

    /**
     * @return ContainerBuilder
     */
    private function createContainerMock(): ContainerBuilder
    {
        $mock = $this->createMock(ContainerBuilder::class);

        $mock
            ->expects($this->exactly(2))
            ->method('fileExists')
            ->withConsecutive(
                ['/usr/www/html/tests/unit/DRD/GeneralBundle/DependencyInjection/test/service_1.yaml']
                , ['/usr/www/html/tests/unit/DRD/GeneralBundle/DependencyInjection/test/service_2.yaml']
            )
        ;

        $mock
            ->expects($this->exactly(1))
            ->method('setParameter')
            ->with('param1', 'value1')
        ;

        /** @var ContainerBuilder $mock */
        return $mock;
    }
}
