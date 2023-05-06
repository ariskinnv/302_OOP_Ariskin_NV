<?php

namespace App\Tests;

use App\Hotel;
use App\BaseHotel;
use App\InternetHotel;
use App\BuffetHotel;
use App\DeliveryHotel;
use App\DinnerHotel;
use App\SofaHotel;
use PHPUnit\Framework\TestCase;

class HotelTest extends TestCase
{
    static $economclass;
    static $luxuryclass;
    static $middleclass;

    public static function setUpBeforeClass(): void
    {
        self::$economclass = new BaseHotel(1);
        self::$middleclass = new BaseHotel(2);
        self::$luxuryclass = new BaseHotel(3);
    }

    public function testHotels()
    {
        $this->assertSame(3000, self::$luxuryclass->getCost());
        $this->assertSame('Номер люкс класса', self::$luxuryclass->getDescription());



        self::$luxuryclass = new BuffetHotel(self::$luxuryclass);
        $this->assertSame(3500, self::$luxuryclass->getCost());
        $this->assertSame('Номер люкс класса, буфет', self::$luxuryclass->getDescription());



        $this->assertsame(1000, self::$economclass->getCost());
        $this->assertsame('Номер эконом класса', self::$economclass->getDescription());


        self::$economclass = new SofaHotel(self::$economclass);
        self::$economclass = new InternetHotel(self::$economclass);

        $this->assertsame(1600, self::$economclass->getCost());
        $this->assertsame('Номер эконом класса, дополнительный диван, выделенный Интернет', self::$economclass->getDescription());
    }
}
