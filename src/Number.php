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

class Number
{
    private $currentValue;
    private $nextValue;

    public function __construct($value)
    {
        $this->currentValue = $value;
    }

    /**
     * Get the current value of a number
     * @return type
     */
    public function current()
    {
        return $this->currentValue;
    }

    public function next()
    {
        return $this->nextValue;
    }

    /**
     * Next value
     *
     * @param type $nextValue
     */
    public function setNextValue($nextValue)
    {
        $this->nextValue = $nextValue;
    }

    public function generateFibonacciSequence(int $terms)
    {
        $sequence = [];
        $current = $this->current();
        $next = $this->next();

        for ($iterator = 1; $iterator <= $terms; $iterator++) {
            array_push($sequence, $current);
            $previous = $current;
            $current = $next;
            $next = $current + $previous;
        }

        return $sequence;
    }
}
