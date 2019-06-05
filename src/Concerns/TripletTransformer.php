<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Concerns;

use PHPViet\NumberToWords\DictionaryInterface;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
trait TripletTransformer
{
    /**
     * Trả về từ điển hổ trợ cho việc chuyển đổi.
     *
     * @return DictionaryInterface
     */
    abstract protected function getDictionary(): DictionaryInterface;

    /**
     * Chuyển đổi cụm 3 số thành chữ số.
     *
     * @param int $triplet
     * @param bool $isFirst
     * @param int $exponent
     * @return string
     */
    protected function tripletToWords(int $triplet, bool $isFirst, int $exponent): string
    {
        $words = [];
        [$hundred, $ten, $unit] = $this->splitTriplet($triplet);
        $dictionary = $this->getDictionary();

        if (0 < $hundred || ! $isFirst) {
            $words[] = $dictionary->getTripletHundred($hundred);

            if (0 === $ten && 0 < $unit) {
                $words[] = $dictionary->tripletTenSeparator();
            }
        }

        if (0 < $ten) {
            $words[] = $dictionary->getTripletTen($ten);
        }

        if (0 < $unit) {
            $words[] = $this->getTripletUnit($unit, $ten);
        }

        $words[] = $dictionary->getExponent($exponent);

        return implode($dictionary->separator(), array_filter($words));
    }

    /**
     * Chia 3 số thành mảng 3 phần tử tương ứng với hàng trăm, hàng chục, hàng đơn vị.
     *
     * @param int $triplet
     * @return array
     */
    private function splitTriplet(int $triplet): array
    {
        $hundred = (int) ($triplet / 100) % 10;
        $ten = (int) ($triplet / 10) % 10;
        $unit = $triplet % 10;

        return [$hundred, $ten, $unit];
    }

    /**
     * Chuyển đổi số hàng đơn vị sang chữ số ở một số trường hợp đặc biệt.
     *
     * @param int $unit
     * @param int $ten
     * @return null|string
     */
    private function getTripletUnit(int $unit, int $ten): string
    {
        $dictionary = $this->getDictionary();

        if (2 <= $ten) {
            if (1 === $unit) {
                return $dictionary->specialTripletUnitOne();
            }

            if (4 === $unit) {
                return $dictionary->specialTripletUnitFour();
            }
        }

        if (1 <= $ten && 5 === $unit) {
            return $dictionary->specialTripletUnitFive();
        }

        return $dictionary->getTripletUnit($unit);
    }
}
