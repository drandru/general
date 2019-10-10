<?php

namespace Tests\DRD\GeneralBundle\DependencyInjection;

use DRD\GeneralBundle\DependencyInjection\GeneralExtension;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class GeneralExtensionConstTest
 * @package Tests\DRD\GeneralBundle\DependencyInjection
 */
class GeneralExtensionConstTest extends WebTestCase
{
    /**
     * @test
     */
    public function constTest()
    {
        $this->assertStringEndsWith('/../Resources/config/auto', GeneralExtension::CONFIG_DIRECTORY);
    }
}
