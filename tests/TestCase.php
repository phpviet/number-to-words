<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use PHPViet\NumberToWords\Transformer;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class TestCase extends BaseTestCase
{
    /**
     * @var \PHPViet\NumberToWords\DictionaryInterface
     */
    protected $dictionary;

    /**
     * @var Transformer
     */
    protected $transformer;

    public function setUp()
    {
        $this->transformer = new Transformer($this->dictionary);
    }
}
