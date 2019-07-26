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
trait TripletTransformer
{
    /**
     * Chuyển đổi cụm 3 số thành chữ số.
     *
     * @param  int  $triplet
     * @param  bool  $isFirst
     * @param  int  $exponent
     * @return string
     */
    protected function tripletToWords(int $triplet, bool $isFirst, int $exponent): string
    {
        [$hundred, $ten, $unit] = $this->splitTriplet($triplet);

        if (0 < $hundred || ! $isFirst) {
            $words[] = $this->dictionary->getTripletHundred($hundred);

            if (0 === $ten && 0 < $unit) {
                $words[] = $this->dictionary->tripletTenSeparator();
            }
        }

        if (0 < $ten) {
            $words[] = $this->dictionary->getTripletTen($ten);
        }

        if (0 < $unit) {
            $words[] = $this->getTripletUnit($unit, $ten);
        }

        $words[] = $this->dictionary->getExponent($exponent);

        return $this->collapseWords($words);
    }

    /**
     * Chia 3 số thành mảng 3 phần tử tương ứng với hàng trăm, hàng chục, hàng đơn vị.
     *
     * @param  int  $triplet
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
     * @param  int  $unit
     * @param  int  $ten
     * @return null|string
     */
    private function getTripletUnit(int $unit, int $ten): string
    {
        if (1 <= $ten && 5 === $unit) {
            return $this->dictionary->specialTripletUnitFive();
        }

        if (2 <= $ten) {
            if (1 === $unit) {
                return $this->dictionary->specialTripletUnitOne();
            }

            if (4 === $unit) {
                return $this->dictionary->specialTripletUnitFour();
            }
        }

        return $this->dictionary->getTripletUnit($unit);
    }
}
