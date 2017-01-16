<?php

declare(strict_types = 1);

/**
 * All rights reserved.
 * @copyright Copyright (c) 2017 Gab Amba
 * @license https://github.com/gabbydgab/LicenseAgreement MIT License
 */

namespace ProjectEuler;

final class NaturalNumber
{
    /**
     * @var int
     */
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * Gets the multiples of a number
     *
     * @param int $multiple
     * @return array
     */
    public function multiplesOf(int $multiple) : array
    {
        if ($multiple > $this->number) {
            throw new \InvalidArgumentException(
                "multiple {$multiple} should not be greater than given number: {$this->number}"
            );
        }

        $multiples = [];
        for ($i = 1; $i < $this->number; $i++) {
            $value = $i * $multiple;
            if ($value < $this->number) {
                $multiples[] = $value;
            }
        }

        return $multiples;
    }

    /**
     * 
     * @param int $multiples
     * @return int
     */
    public function summationOfMultiplesOf(int ...$multiples) : int
    {
        $sum = 0;

        foreach ($multiples as $multiple) {
            $sum += \array_sum($this->multiplesOf($multiple));
        }

        return $sum;
    }
}
