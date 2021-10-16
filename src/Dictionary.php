<?php
/**
 * @link https://github.com/phpviet/number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords;

use InvalidArgumentException;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class Dictionary implements DictionaryInterface
{
    /**
     * Mảng tập hợp hàng đơn vị.
     *
     * @var array
     */
    protected static $tripletUnits = [
        'không',
        'một',
        'hai',
        'ba',
        'bốn',
        'năm',
        'sáu',
        'bảy',
        'tám',
        'chín',
    ];

    /**
     * Mảng tập hợp hàng chục.
     *
     * @var array
     */
    protected static $tripletTens = [
        '',
        'mười',
        'hai mươi',
        'ba mươi',
        'bốn mươi',
        'năm mươi',
        'sáu mươi',
        'bảy mươi',
        'tám mươi',
        'chín mươi',
    ];

    /**
     * Từ ngữ mô tả hàng trăm.
     *
     * @var string
     */
    protected static $hundred = 'trăm';

    /**
     * Mảng tập hợp đơn vị tính dựa trên số mũ 3.
     *
     * @var array
     */
    protected static $exponents = [
        '',
        'nghìn',
        'triệu',
        'tỷ',
        'nghìn tỷ',
        'triệu tỷ',
    ];

    /**
     * {@inheritdoc}
     */
    public function zero(): string
    {
        return static::$tripletUnits[0];
    }

    /**
     * {@inheritdoc}
     */
    public function minus(): string
    {
        return 'âm';
    }

    /**
     * {@inheritdoc}
     */
    public function separator(): string
    {
        return ' ';
    }

    /**
     * {@inheritdoc}
     */
    public function tripletTenSeparator(): string
    {
        return 'linh';
    }

    /**
     * {@inheritdoc}
     */
    public function specialTripletUnitOne(): string
    {
        return 'mốt';
    }

    /**
     * {@inheritdoc}
     */
    public function specialTripletUnitFour(): string
    {
        return 'tư';
    }

    /**
     * {@inheritdoc}
     */
    public function specialTripletUnitFive(): string
    {
        return 'lăm';
    }

    /**
     * {@inheritdoc}
     */
    public function fraction(): string
    {
        return 'phẩy';
    }

    /**
     * {@inheritdoc}
     */
    public function getTripletUnit(int $unit): string
    {
        if (! isset(static::$tripletUnits[$unit])) {
            throw new InvalidArgumentException(sprintf('Unit arg (`%s`) must be in 0-9 range!', $unit));
        }

        return static::$tripletUnits[$unit];
    }

    /**
     * {@inheritdoc}
     */
    public function getTripletTen(int $ten): string
    {
        if (! isset(static::$tripletTens[$ten])) {
            throw new InvalidArgumentException(sprintf('Ten arg (`%s`) must be in 0-9 range!', $ten));
        }

        return static::$tripletTens[$ten];
    }

    /**
     * {@inheritdoc}
     */
    public function getTripletHundred(int $hundred): string
    {
        if (! isset(static::$tripletUnits[$hundred])) {
            throw new InvalidArgumentException(sprintf('Hundred arg (`%s`) must be in 0-9 range!', $hundred));
        }

        return static::$tripletUnits[$hundred].$this->separator().static::$hundred;
    }

    /**
     * {@inheritdoc}
     */
    public function getExponent(int $power): string
    {
        if (! isset(static::$exponents[$power])) {
            throw new InvalidArgumentException(sprintf('Power arg (`%s`) not exist in vietnamese dictionary!', $power));
        }

        return static::$exponents[$power];
    }
}
