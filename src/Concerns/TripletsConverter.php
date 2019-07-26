<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Concerns;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
trait TripletsConverter
{
    /**
     * Chia số truyền vào thành các cụm gồm 3 số để hổ trợ cho việc chuyển sang chữ số.
     *
     * @param int $number
     * @return array|int[]
     */
    protected function numberToTriplets(int $number): array
    {
        $triplets = [];

        while (0 < $number) {
            array_unshift($triplets, $number % 1000);
            $number = (int) ($number / 1000);
        }

        return $triplets;
    }
}
