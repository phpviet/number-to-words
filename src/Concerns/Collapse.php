<?php
/**
 * @link https://github.com/phpviet/number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Concerns;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.2.0
 */
trait Collapse
{
    /**
     * Ghép mảng chữ số thành chuỗi.
     *
     * @param  array|string[]  $words
     * @return string
     *
     * @since 1.2.0
     */
    protected function collapseWords(array $words): string
    {
        $separator = $this->dictionary->separator();
        $words = array_filter($words);

        return implode($separator, $words);
    }
}
