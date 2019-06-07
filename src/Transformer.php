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
    protected $dictionary;

    /**
     * Tạo đối tượng mới với từ điển chỉ định.
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
        if (! is_numeric($number)) {
            throw new InvalidArgumentException(sprintf('Number arg (`%s`) must be numeric!', $number));
        }

        $words = [];
        [$minus, $number, $decimal] = $this->resolve($number);
        $words[] = $minus ? $this->dictionary->minus() : '';

        if (0 === $number && 0 === $decimal) {
            return $this->dictionary->zero();
        } elseif (0 === $number) {
            $words[] = $this->dictionary->zero();
        }

        $triplets = $this->numberToTriplets($number);

        foreach ($triplets as $pos => $triplet) {
            if (0 < $triplet) {
                $words[] = $this->tripletToWords($triplet, 0 === $pos, count($triplets) - $pos - 1);
            }
        }

        if (0 < $decimal) {
            $words[] = $this->dictionary->fraction();
            $words[] = $this->toWords($decimal);
        }

        return implode($this->dictionary->separator(), array_filter($words));
    }

    /**
     * Chuyển đổi số sang chữ số kết hợp với đơn vị tiền tệ.
     *
     * @param $number
     * @param array|string[]|string $unit
     * @return string
     */
    public function toCurrency($number, $unit = 'đồng'): string
    {
        $words = [];
        $originNumber = $number;
        $unit = (array)$unit;
        [$minus, $number, $decimal] = $this->resolve($number);

        if (0 === $decimal || ! isset($unit[1])) {
            $words[] = $this->toWords($originNumber);
            $words[] = $unit[0];
        } else {
            [$unit, $decimalUnit] = $unit;
            $words[] = $minus ? $this->dictionary->minus() : '';
            $words[] = $this->toWords($number);
            $words[] = $unit;
            $words[] = $this->toWords($decimal);
            $words[] = $decimalUnit;
        }

        return implode($this->dictionary->separator(), array_filter($words));
    }

    /**
     * Chia số truyền vào thành mảng bao gồm kiểu số âm hoặc dương, số nguyên và phân số.
     *
     * @param int|float|string $number
     * @return array
     */
    protected function resolve($number): array
    {
        $number += 0; // trick xóa các số 0 lẻ sau cùng của phân số
        $number = (string)$number;
        $minus = '-' === $number[0];

        if (false !== strpos($number, '.')) {
            $numbers = explode('.', $number, 2);
        } else {
            $numbers = [$number, 0];
        }

        return array_merge([$minus], array_map('abs', $numbers));
    }

    /**
     * {@inheritdoc}
     */
    protected function getDictionary(): DictionaryInterface
    {
        return $this->dictionary;
    }
}
