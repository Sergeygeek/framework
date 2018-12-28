<?php

class MyTest extends \PHPUnit\Framework\TestCase
{
    public function testFirst()
    {
        $object = new \app\models\Discount();
        $discount = $object->getBaseDiscount();
        $this->assertIsInt($discount);
        $this->assertGreaterThan(0, $discount);
        $this->assertEquals(10, $discount);
    }

    public function testProductDiscount()
    {
        $product = new \app\models\Product();
        $product->price = 200;

        $mockDiscount = $this->getMockBuilder('\app\models\Discount')
            ->setMethods(['getBaseDiscount'])
            ->getMock();

        $mockDiscount->expects($this->any())
                    ->method('getBaseDiscount')
                    ->will($this->returnValue(20));

        $res = $product->getPriceWithDiscount($mockDiscount);
        $this->assertEquals(180, $res);
    }
}