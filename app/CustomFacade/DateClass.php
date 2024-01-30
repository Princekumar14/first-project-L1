<?php

namespace App\CustomFacade;

use Carbon\Carbon;

class DateClass{

    public static function dateFormatYMD($date){
        return Carbon::createFromFormat('m/d/Y', $date)->format('Y-m-d');

    }


}