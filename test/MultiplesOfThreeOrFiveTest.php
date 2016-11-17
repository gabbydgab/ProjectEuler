<?php

/**
 * The MIT License
 *
 * Copyright (c) 2016, Coding Matters, Inc. (Gab Amba <gamba@gabbydgab.com>)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

declare(strict_types = 1);

namespace ProjectEulerTest;

use PHPUnit\Framework\TestCase;
use ProjectEuler\NaturalNumber;
use ProjectEuler\Number;

/**
 * Multiples of 3 and 5 (Problem #1)
 * @see https://projecteuler.net/problem=1
 *
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9.
 * The sum of these multiples is 23.
 *
 * PROBLEM: Find the sum of all the multiples of 3 or 5 below 1000.
 */
final class MultiplesOfThreeOrFiveTest extends TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function throwsInvalidArgumentExceptionIfNotWholeNumber()
    {
        $number = new NaturalNumber(new Number(-1));
    }

    /**
     * @test
     * @dataProvider proofs
     * @param int $number
     * @param int $sum
     */
    public function sumForMultiplesOfThreeOrFiveBelowGivenNumber(int $number, int $sum)
    {
        $number = new NaturalNumber(new Number($number));

        $this->assertEquals($number->sumForMultiplesOf(3, 5), $sum);
    }

    public function proofs() : array
    {
        return [
            'given-output'  => [10, 23],
            'test-result'   => [16, 75],
            'final-answer'  => [1000, 266333]
        ];
    }
}
