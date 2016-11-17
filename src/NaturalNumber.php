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
use ProjectEuler\Number;

final class NaturalNumber
{
    private $number;

    /**
     * Sets the value of the number
     *
     * @param  Number $number
     * @throws InvalidArgumentException
     */
    public function __construct(Number $number)
    {
        if ($number->currentValue() < 0) {
            throw new InvalidArgumentException("must be positive whole number or equal to zero");
        }

        $this->number = $number;
    }

    /**
     * Iterate multiples of given number
     *
     * @param  type $multipliers
     * @return int
     */
    public function sumForMultiplesOf(int ...$multipliers) : int
    {
        $total = 0;
        foreach ($multipliers as $multiplier) {
            $total += $this->multiplesOf($multiplier);
        }

        return $total;
    }

    /**
     * Checks multiples of N below the given number
     *
     * @param  int $multiplier
     * @return int
     */
    public function multiplesOf(int $multiplier) : int
    {
        $numbers = [];
        for ($number = 1; $number < $this->number->currentValue(); $number++) {
            if (($number % $multiplier) == 0) {
                array_push($numbers, $number);
            }
        }

        return array_sum($numbers);
    }
}
