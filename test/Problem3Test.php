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
use ProjectEuler\PrimeFactor;

final class Problem3Test extends TestCase
{
    /**
     * @dataProvider primeFactors
     */
    public function testPrimeFactors(int $number, array $factors)
    {
        $primeFactor = new PrimeFactor();
        
        $this->assertEquals($factors, $primeFactor->factorsOf($number));        
    }
    
    /**
     * @dataProvider largePrimeFactor
     */
    public function testLargestPrimeFactor(int $number, int $factor)
    {
        $primeFactor = new PrimeFactor();

        $this->assertEquals($factor, $primeFactor->largestPrimeOf($number));        
    }

    public function primeFactors()
    {
        return [
            [13195, [5, 7, 13, 29]],
            [475143, [3, 251, 631]],
            [600851475143, [71, 839, 1471, 6857]],
        ];
    }

    public function largePrimeFactor()
    {
        return [
            [13195, 29],
            [475143, 631],
            [600851475143, 6857],
        ];
    }
}
