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
     * @param int $exponent
     * @return string
     */
    protected function tripletToWords(int $triplet, int $exponent): string
    {
        $words = [];
        [$hundred, $ten, $unit] = $this->splitTriplet($triplet);
        $dictionary = $this->getDictionary();

        if (0 < $hundred || 0 < $exponent) {
            $words[] = $dictionary->getTripletHundred($hundred);
        }

        if (0 === $ten && 0 < $unit && 0 < $hundred) {
            $words[] = $dictionary->tripletTenSeparator();
        }

        if (0 < $ten || 0 < $unit) {
            $words[] = $dictionary->getTripletTen($ten);

            switch ($unit) {
                case 1:
                    if (2 <= $ten) {
                        $words[] = $dictionary->specialTripletUnitOne();
                    }
                    break;
                case 4:
                    if (2 <= $ten) {
                        $words[] = $dictionary->specialTripletUnitFour();
                    }
                    break;
                case 5:
                    if (1 <= $ten) {
                        $words[] = $dictionary->specialTripletUnitFive();
                    }
                    break;
                default:
                    $words[] = $dictionary->getTripletUnit($unit);
            }
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
        $hundred = (int)($triplet / 100) % 10;
        $ten = (int)($triplet / 10) % 10;
        $unit = $triplet % 10;

        return [$hundred, $ten, $unit];
    }

}
