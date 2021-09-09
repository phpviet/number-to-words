<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Concerns;

use InvalidArgumentException;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.5
 */
trait NumberResolver
{
    /**
     * Chia số truyền vào thành mảng bao gồm kiểu số âm hoặc dương, số nguyên và phân số.
     *
     * @param  int|float|string  $number
     * @return array
     * @throws InvalidArgumentException
     */
    protected function resolveNumber($number, $decimal_part = -1): array
    {
        if (! is_numeric($number)) {
            throw new InvalidArgumentException(sprintf('Number arg (`%s`) must be numeric!', $number));
        }


        if($decimal_part === -1) {
            $number += 0; // trick xóa các số 0 lẻ sau cùng của phân số đối với input là chuỗi.
            $number = (string) $number;
        } else {
            $number = number_format($number, $decimal_part, ".", "");
        }
        $minus = '-' === $number[0];

        if (false !== strpos($number, '.')) {
            $numbers = explode('.', $number, 2);
        } else {
            $numbers = [$number, 0];
        }

        return array_merge([$minus], array_map('abs', $numbers));
    }
}
