<?php

namespace App\CustomServices;

class CustomService implements  CustomServiceInterface
{
    public function doSomething(){
        echo "do something here !! custom services";
    }

}