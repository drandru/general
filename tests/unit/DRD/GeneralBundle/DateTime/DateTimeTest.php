<?php

namespace Tests\DRD\GeneralBundle\DateTime;

use DRD\GeneralBundle\DateTime\DateTime;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DateTimeTest
 * @package Tests\DRD\GeneralBundle\DateTime
 */
class DateTimeTest  extends WebTestCase
{
    /**
     * @test
     */
    public function constTest()
    {
        $this->assertEquals('Y-m-d H:i:s', DateTime::FORMAT_DATETIME);
        $this->assertEquals('YmdHis', DateTime::FORMAT_DATETIME_SIMPLE);
        $this->assertEquals(60, DateTime::MINUTE_TIMESATMP);
        $this->assertEquals(60 * 60, DateTime::HOUR_TIMESATMP);
        $this->assertEquals(24 * 60 * 60, DateTime::DAY_TIMESATMP);
        $this->assertEquals(7 * 24 * 60 * 60, DateTime::WEEK_TIMESATMP);
        $this->assertEquals(30 * 24 * 60 * 60, DateTime::MONTH_TIMESATMP);
        $this->assertEquals(31 * 24 * 60 * 60, DateTime::MONTH_31_TIMESATMP);
        $this->assertEquals(28 * 24 * 60 * 60, DateTime::MONTH_28_TIMESATMP);
        $this->assertEquals(29 * 24 * 60 * 60, DateTime::MONTH_29_TIMESATMP);
        $this->assertEquals(365 * 24 * 60 * 60, DateTime::YEAR_TIMESATMP);
        $this->assertEquals(366 * 24 * 60 * 60, DateTime::YEAR_HIGH_TIMESATMP);
    }
}
