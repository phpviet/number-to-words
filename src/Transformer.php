<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords;

use InvalidArgumentException;
use PHPViet\NumberToWords\Concerns\TripletsConverter;
use PHPViet\NumberToWords\Concerns\TripletTransformer;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Transformer
{

    use TripletsConverter;
    use TripletTransformer;

    /**
     * @var DictionaryInterface
     */
    private $dictionary;

    /**
     * Tạo đối tượng NumberToWords với từ điển chỉ định.
     *
     * @param DictionaryInterface $dictionary
     */
    public function __construct(?DictionaryInterface $dictionary = null)
    {
        if (null === $dictionary) {
            $dictionary = new Dictionary();
        }

        $this->dictionary = $dictionary;
    }

    /**
     * Chuyển đổi số sang chữ số.
     *
     * @param int|float|string $number
     * @return string
     */
    public function toWords($number): string
    {
        if (!is_numeric($number)) {
            throw new InvalidArgumentException(sprintf('Number arg (`%s`) must be numeric!', $number));
        }

        $words = [];
        [$number, $decimal] = $this->resolve($number);

        if (0 === $number) {
            return $this->dictionary->zero();
        }

        if (0 > $number) {
            $words[] = $this->dictionary->minus();
            $number = abs($number);
        }

        $triplets = $this->numberToTriplets($number);

        foreach ($triplets as $pos => $triplet) {

            if ($triplet > 0) {
                $words[] = $this->tripletToWords($triplet, 0 === $pos, count($triplets) - $pos - 1);
            }

        }

        if ($decimal > 0) {
            $words[] = $this->dictionary->fraction();
            $words[] = $this->toWords($decimal);
        }

        return implode($this->dictionary->separator(), array_filter($words));
    }

    /**
     * Chuyển đổi số sang chữ số kết hợp với đơn vị tiền tệ.
     *
     * @param $number
     * @param string $unit
     * @return string
     */
    public function toCurrency($number, $unit = 'đồng'): string
    {
        $words = [];
        $originNumber = $number;
        [$number, $decimal] = $this->resolve($number);

        if (is_string($unit) || 0 === $decimal) {
            $words[] = $this->toWords($originNumber);
            $words[] = is_array($unit) ? $unit[0] : $unit;
        } else {
            [$unit, $decimalUnit] = $unit;
            $words[] = $this->toWords($number);
            $words[] = $unit;
            $words[] = $this->toWords($decimal);
            $words[] = $decimalUnit;
        }

        return implode($this->dictionary->separator(), array_filter($words));
    }

    /**
     * Chia số truyền vào thành mảng bao gồm số nguyên và phân số.
     *
     * @param int|float|string $number
     * @return array|int[]
     */
    protected function resolve($number): array
    {
        $number = (string)$number;

        if (false !== strpos($number, '.')) {
            $result = explode($number, '.', 2);
        } else {
            $result = [$number, 0];
        }

        return array_map('intval', $result);
    }

    /**
     * @inheritDoc
     */
    protected function getDictionary(): DictionaryInterface
    {
        return $this->dictionary;
    }

}

