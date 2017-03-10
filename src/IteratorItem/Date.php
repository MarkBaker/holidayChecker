<?php
/**
 * Copyright (c) Andreas Heigl<andreas@heigl.org>
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
 *
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright Andreas Heigl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT-License
 * @since     08.03.2017
 * @link      http://github.com/heiglandreas/org.heigl.Holidaychecker
 */

namespace Org_Heigl\Holidaychecker\IteratorItem;

use Org_Heigl\Holidaychecker\HolidayIteratorItemInterface;

class Date implements HolidayIteratorItemInterface
{
    private $day;

    private $month;

    private $year;

    private $holiday;

    private $name;

    public function __construct(string $name, bool $holiday, int $day, int $month, int $year = null)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->holiday = $holiday;
        $this->name = $name;
    }

    public function dateMatches(\DateTimeInterface $date) : bool
    {
        if (null !== $this->year) {
            if ($this->year != $date->format('Y')) {
                return false;
            }
        }

        if ($this->month != $date->format('m')) {
            return false;
        }

        if ($this->day != $date->format('d')) {
            return false;
        }

        return true;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isHoliday(): bool
    {
        return $this->holiday;
    }
}