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

use ProjectEuler\FibonacciNumber;
use PHPUnit\Framework\TestCase;

final class EvenFibonnaciNumberTest extends TestCase
{
    /**
     * @dataProvider fibonacciSequence
     */
    public function testSumOfEvenValuedTermsLessThanFourMillion($initialValue, $next, $terms, $sum)
    {
        $number = new FibonacciNumber($initialValue);
        $number->setNextValue($next);

        $this->assertEquals($sum, array_sum($number->getEvenFibonacciSequence($terms)));
    }

    public function fibonacciSequence() : array
    {
        return [
            'given' => [
                'start' => 1,
                'next'  => 2,
                'terms' => 10,
                'sum'   => 44 // based on the following sequence: 1, 2, 3, 5, 8, 13, 21, 34, 55, 89
            ],
            'final-answer' => [
                'start' => 1,
                'next'  => 2,
                'terms' => 32, // the 32nd term of the sequence has a value of 3524578; which is less than 4 million
                'sum'   => 4613732
            ],
        ];
    }
}