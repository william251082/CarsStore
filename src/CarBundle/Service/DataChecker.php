<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 04/02/2018
 * Time: 07:46
 */

namespace CarBundle\Service;

use CarBundle\Entity\Car;

class DataChecker
{
    public function checkCar(Car $car)
    {
        return "Car " . $car->getModel() . " checked";
    }

}