<?php

declare(strict_types=1);

namespace Tests\Unit;

use MyApp\Component\Product;

class IndexControllerTest extends AbstractUnitTest
//class UnitTest extends \PHPUnit\Framework\TestCase
{

    public function testadd()
    {
        $new = new Product();
        $data = [
            'id' => 10,
            'name' => 'mobile',
            'price' => 100,
            'qty' => 20,
            'desc' => 'xyz'
        ];
        $this->assertEquals(1, $new->add($data), "pass");
    }

    public function testdelete()
    {
        $new = new Product();
        $this->assertEquals(1, $new->delete("1"), "pass");
    }
    public function testupdate()
    {
        $new = new Product();
        $data = [
            'id' => 2,
            'name' => 'mobile2',
            'price' => 100,
            'qty' => 20,
            'desc' => 'xyz'
        ];
        $this->assertEquals(1, $new->update($data), "pass");
    }
}
