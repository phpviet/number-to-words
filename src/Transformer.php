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
    use Concerns\Collapse;
    use Concerns\NumberResolver;
    use Concerns\TripletsConverter;
    use Concerns\TripletTransformer;

    /**
     * @var DictionaryInterface
     */
    protected $dictionary;

    /**
     * Mặc định bỏ số các số 0 sau phần thập phân.
     * @var int
     */
    protected $decimalPart;

    /**
     * Tạo đối tượng mới với từ điển chỉ định và phần thập phân.
     *
     * @param  DictionaryInterface  $dictionary
     */
    public function __construct(?DictionaryInterface $dictionary = null, $decimalPart = null)
    {
        if (null === $dictionary) {
            $dictionary = new Dictionary();
        }

        $this->dictionary = $dictionary;
        $this->decimalPart = $decimalPart;
    }

    /**
     * Chuyển đổi số sang chữ số.
     *
     * @param  int|float|string  $number
     * @return string
     * @throws \InvalidArgumentException
     */
    public function toWords($number): string
    {
        [$minus, $number, $decimal] = $this->resolveNumber($number);
        $words[] = $minus ? $this->dictionary->minus() : '';

        if (0 === $number) {
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

        return $this->collapseWords($words);
    }

    /**
     * Chuyển đổi số sang chữ số kết hợp với đơn vị tiền tệ.
     *
     * @param $number
     * @param  array|string[]|string  $unit
     * @return string
     * @throws \InvalidArgumentException
     */
    public function toCurrency($number, $unit = 'đồng'): string
    {
        $unit = (array) $unit;
        $originNumber = $number;
        [$minus, $number, $decimal] = $this->resolveNumber($number);

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

        return $this->collapseWords($words);
    }
}
