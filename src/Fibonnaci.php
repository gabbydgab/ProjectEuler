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

class Fibonnaci
{
    private $firstTerm;
    private $secondTerm;
    private $sequence = [];

    public function __construct(int $firstTerm, int $secondTerm)
    {
        $this->firstTerm = $firstTerm;
        $this->secondTerm = $secondTerm;
    }

    public function generate(int $term = 10) : array
    {
        $previous = $this->firstTerm;
        $current = $this->secondTerm;
        array_push($this->sequence, $previous ,$current);        

        // will start at the third sequence by adding the previous and the current term
        for ($seq = 3; $seq <= $term; $seq++) {

            $newPrev    = $current;
            $current    = $previous + $newPrev;
            $previous   = $newPrev;

            array_push($this->sequence, $current);
        }

        return $this->sequence;
    }

    public function currentValue()
    {
        return array_pop($this->sequence);
    }

    public function sumOfEvenValues()
    {
        $total = 0;
        
        foreach ($this->sequence as $value) {
            if ($value % 2 == 0) {
                $total += $value;
            }
        }

        return $total;
    }
}
