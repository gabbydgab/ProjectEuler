<?php

declare(strict_types = 1);

/**
 * All rights reserved.
 * @copyright Copyright (c) 2017 Gab Amba
 * @license https://github.com/gabbydgab/LicenseAgreement MIT License
 */

namespace ProjectEulerTest;

use PHPUnit\Framework\TestCase;
use ProjectEuler\NaturalNumber;

final class MultiplesOf3And5Test extends TestCase
{
    public function test_multiples_of_3()
    {
        $number = new NaturalNumber(10);        

        $this->assertEquals([3,6,9], $number->multiplesOf(3));
    }

    public function test_multiples_of_5()
    {
        $number = new NaturalNumber(10);        

        $this->assertEquals([5], $number->multiplesOf(5));
    }

    public function test_throw_exception_if_multiple_is_greater_than_given_number()
    {
        $number = new NaturalNumber(10);

        $this->expectException(\InvalidArgumentException::class);
        $number->multiplesOf(15);
    }

    public function test_sum_of_multiples_of_3_and_5_is_equal_to_23_where_n_is_10()
    {
        $number = new NaturalNumber(10);

        $this->assertEquals(23, $number->summationOfMultiplesOf(3, 5));
    }

    public function test_sum_of_multiples_of_3_and_5_is_equal_to_2633_where_n_is_100()
    {
        $number = new NaturalNumber(100);

        $this->assertEquals(2633, $number->summationOfMultiplesOf(3, 5));
    }
}
