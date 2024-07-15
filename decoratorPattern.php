<?php

class CarService {
    public function getCost()
    {

    }
}

class BasicInspection extends CarService
{
    public function getCost()
    {
        return 25;
    }

    public function getDescription()
    {
        return 'base inscription';
    }
}

class OilChange extends CarService
{
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost(){
        return 29 +$this->carService->getCost();
    }



}

class TireRotation extends CarService{
    protected $carService;
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }
    public function getCost(){
        return 15 + $this->carService->getCost();
    }

    public function getDescription(){
        return $this->carService->getDescription() . ', and tire rotation';
    }
}

//
//class BasinInspectionAndOilChange {
//    public function getCost(){
//        return 19 +19;
//    }
//}
//class BasinInspectionAndOilChangeAndTireRotation {
//    public function getCost(){
//        return 19 + 19 + 10;
//    }
//}

$service = new BasicInspection();
echo $service->getDescription() . $service->getCost();

echo '<br>';

$service2 = new TireRotation(new BasicInspection());
echo  $service2-> getDescription(). $service2->getCost();