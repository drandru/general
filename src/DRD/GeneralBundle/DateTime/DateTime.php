<?php

namespace DRD\GeneralBundle\DateTime;

use DateTime as WithinDateTime;

class DateTime extends WithinDateTime
{
    const FORMAT_DATETIME = 'Y-m-d H:i:s';

    const MINUTE_TIMESATMP = 60; // 60
    const HOUR_TIMESATMP = 3600; // 60*60
    const DAY_TIMESATMP = 86400; // 60*60*24
    const WEEK_TIMESATMP = 604800; // 86400*7
    const MONTH_TIMESATMP = 2592000; //86400*30
    const MONTH_31_TIMESATMP = 2678400; //86400*31
    const MONTH_28_TIMESATMP = 2419200; //86400*28
    const MONTH_29_TIMESATMP = 2505600; //86400*29
    const YEAR_TIMESATMP = 31536000; //86400*365
    const YEAR_HIGH_TIMESATMP = 31622400; //86400*366
}
