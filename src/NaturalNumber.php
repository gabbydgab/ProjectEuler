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

namespace ProjectEuler;

use InvalidArgumentException;

class NaturalNumber extends Number
{
    protected $factors = [];

    public function __construct(int $value = 0)
    {
        if ($value < 0) {
            throw new InvalidArgumentException("must be positive whole numbers");
        }

        parent::__construct($value);
    }

    public function sumForMultiplesOf(int ...$multipliers) : int
    {
        $total = 0;
        foreach ($multipliers as $multiplier) {
            $total += $this->multiplesOf($multiplier);
        }
        
        return $total;
    }

    public function multiplesOf(int $multiplier) : int
    {
        $multiples = [];
        for ($number = 1; $number < $this->value; $number++) {
            if (($number % $multiplier) == 0 ) {
                array_push($multiples, $number);
            }
        }

        return array_sum($multiples);
    }
}
