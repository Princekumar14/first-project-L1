<?php

namespace App\CustomFacade;

use Illuminate\Support\Facades\Facade;

class DateClassFacade extends Facade{

    protected static function getFacadeAccessor(){
        return 'dateclass';

    }


}