<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Transformer
{
    use Concerns\NumberResolver;
    use Concerns\TripletsConverter;
    use Concerns\TripletTransformer;

    /**
     * @var DictionaryInterface
     */
    protected $dictionary;

    /**
     * Tạo đối tượng mới với từ điển chỉ định.
     *
     * @param  DictionaryInterface  $dictionary
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
     * @param  int|float|string  $number
     * @return string
     */
    public function toWords($number): string
    {
        [$minus, $number, $decimal] = $this->resolveNumber($number);
        $words = [];
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
     * @param  array|string[]|string  $unit
     * @return string
     */
    public function toCurrency($number, $unit = 'đồng'): string
    {
        $unit = (array) $unit;
        $originNumber = $number;
        [$minus, $number, $decimal] = $this->resolveNumber($number);
        $words = [];

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
     * @param $number
     * @return array
     * @deprecated since 1.0.5 use [[resolveNumber()]] instead and it will be remove since 1.1.0.
     */
    protected function resolve($number): array
    {
        return $this->resolveNumber($number);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDictionary(): DictionaryInterface
    {
        return $this->dictionary;
    }
}
