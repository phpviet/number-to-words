<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords;

use InvalidArgumentException;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
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
        '',
        'một',
        'hai',
        'ba',
        'bốn',
        'năm',
        'sáu',
        'bảy',
        'tám',
        'chín'
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
        'chín mươi'
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
        'triệu tỷ'
    ];

    /**
     * @inheritDoc
     */
    public function zero(): string
    {
        return 'không';
    }

    /**
     * @inheritDoc
     */
    public function minus(): string
    {
        return 'âm';
    }

    /**
     * @inheritDoc
     */
    public function separator(): string
    {
        return ' ';
    }

    /**
     * @inheritDoc
     */
    public function tripletTenSeparator(): string
    {
        return 'linh';
    }

    /**
     * @inheritDoc
     */
    public function specialTripletUnitOne(): string
    {
        return 'mốt';
    }

    /**
     * @inheritDoc
     */
    public function specialTripletUnitFour(): string
    {
        return 'tư';
    }

    /**
     * @inheritDoc
     */
    public function specialTripletUnitFive(): string
    {
        return 'lăm';
    }

    /**
     * @inheritDoc
     */
    public function fraction(): string
    {
        return 'phẩy';
    }

    /**
     * @inheritDoc
     */
    public function getTripletUnit(int $unit): string
    {
        if (!isset(static::$tripletUnits[$unit])) {
            throw new InvalidArgumentException('`unit` arg must be in 0-9 range!');
        }

        return static::$tripletUnits[$unit];
    }

    /**
     * @inheritDoc
     */
    public function getTripletTen(int $ten): string
    {
        if (!isset(static::$tripletTens[$ten])) {
            throw new InvalidArgumentException('`ten` arg must be in 0-9 range!');
        }

        return static::$tripletTens[$ten];
    }

    /**
     * @inheritDoc
     */
    public function getTripletHundred(int $hundred): string
    {
        if (!isset(static::$tripletUnits[$hundred])) {
            throw new InvalidArgumentException('`hundred` arg must be in 0-9 range!');
        }

        return static::$tripletUnits[$hundred] . $this->separator() . static::$hundred;
    }

    /**
     * @inheritDoc
     */
    public function getExponent(int $power): string
    {
        if (!isset(static::$exponents[$power])) {
            throw new InvalidArgumentException('`power` arg not exist in vietnamese dictionary!');
        }

        return static::$exponents[$power];
    }
}
