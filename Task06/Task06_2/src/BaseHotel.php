<?php

namespace App;

class BaseHotel implements Hotel
{
    private $type;

    public function __construct(int $type)
    {
        $this->type = $type;
    }

    public function getCost()
    {
        if ($this->type == 3) {
            return 3000;
        } elseif ($this->type == 2) {
            return 2000;
        } elseif ($this->type == 1) {
            return 1000;
        }
    }

    public function getDescription()
    {
        if ($this->type == 3) {
            return 'Номер люкс класса';
        } elseif ($this->type == 2) {
            return 'Номер стандартного класса';
        } elseif ($this->type == 1) {
            return 'Номер эконом класса';
        }
    }
}
