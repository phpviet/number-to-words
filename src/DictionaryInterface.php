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
interface DictionaryInterface
{
    /**
     * Trả về từ ngữ diễn giải số 0.
     *
     * @return string
     */
    public function zero(): string;

    /**
     * Trả về từ ngữ diễn giải số âm.
     *
     * @return string
     */
    public function minus(): string;

    /**
     * Trả về giá trị ngắt các chữ số.
     *
     * @return string
     */
    public function separator(): string;

    /**
     * Trả về từ ngữ ngắt giữa nguyên số và phân số.
     *
     * @return string
     */
    public function fraction(): string;

    /**
     * Trả về từ ngữ khi chuyển đổi 1 sang chữ số khi chữ số hàng chục lớn hơn 1.
     *
     * @return string
     */
    public function specialTripletUnitOne(): string;

    /**
     * Trả về từ ngữ khi chuyển đổi 4 sang chữ số khi chữ số hàng chục lớn hơn hoặc bằng 2.
     *
     * @return string
     */
    public function specialTripletUnitFour(): string;

    /**
     * Trả về từ ngữ khi chuyển đổi 5 sang chữ số khi chữ số hàng chục lớn hơn hoặc bằng 1.
     *
     * @return string
     */
    public function specialTripletUnitFive(): string;

    /**
     * Trả về từ ngữ nằm giữa hàng trăm và hàng đơn vị khi chữ số hàng chục là 0 và chữ số hàng trăm, đơn vị khác 0.
     *
     * @return string
     */
    public function tripletTenSeparator(): string;

    /**
     * Trả về từ ngữ hàng đơn vị tương ứng với số truyền vào.
     *
     * @param int $unit hàng đơn vị
     * @return string
     */
    public function getTripletUnit(int $unit): string;

    /**
     * Trả về từ ngữ hàng chục tương ứng với số truyền vào.
     *
     * @param int $ten hàng chục
     * @return string
     */
    public function getTripletTen(int $ten): string;

    /**
     * Trả về từ ngữ hàng trăm tương ứng với số truyền vào.
     *
     * @param int $hundred hàng trăm
     * @return string
     */
    public function getTripletHundred(int $hundred): string;

    /**
     * Trả về đơn vị tương ứng với số mũ cơ số 3.
     *
     * @param int $power hàng trăm
     * @return string
     */
    public function getExponent(int $power): string;
}
