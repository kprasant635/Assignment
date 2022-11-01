<?php

namespace App\Helpers;

use DateTime;

class Helper
{
    public static function experience($startdate,$enddate)
    {
        $date1 = new DateTime($startdate);
        $date2 = new DateTime($enddate);
        $interval = $date1->diff($date2);
        return ("" . $interval->y . " years, " . $interval->m." months ");
    }
}
