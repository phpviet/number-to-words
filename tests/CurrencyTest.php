<?php
/**
 * @link https://github.com/phpviet/number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Tests;

use PHPViet\NumberToWords\Transformer;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class CurrencyTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTransform($expect, $number)
    {
        $this->assertEquals($expect, $this->transformer->toCurrency($number));
    }

    /**
     * @dataProvider usdDataProvider
     */
    public function testUSDTransform($expect, $number)
    {
        $this->assertEquals($expect, $this->transformer->toCurrency($number, ['đô', 'xen']));
    }

    /**
     * @dataProvider usdDecimalPartDataProvider
     */
    public function testUSDSetDecimalPart($expect, $float, $decimalPart)
    {
        $transformer = new Transformer($this->dictionary, $decimalPart);

        $this->assertEquals($expect, $transformer->toCurrency($float, ['đô', 'xen']));
    }

    public function usdDecimalPartDataProvider(): array
    {
        return [
            ['không đô', 0, 1],
            ['một nghìn đô', 1000, 2],
            ['một nghìn không trăm linh một đô', 1001, 3],
            ['một nghìn không trăm linh hai đô', 1002, 4],
            ['âm không đô mười xen', -0.1, 2],
            ['âm chín mươi chín đô', -99, 3],
            ['âm chín mươi tám đô', -98, 4],
            ['không đô ba trăm bảy mươi chín xen', 0.378758, 3],
            ['không đô chín mươi hai xen', 0.922174, 2],
            ['năm trăm bảy mươi ba đô năm mươi tám xen', 573.58, 2],
            ['sáu trăm sáu mươi chín đô mười bốn xen', 669.135, 2],
            ['ba trăm chín mươi lăm đô mười bốn xen', 395.136, 2],
        ];
    }

    /**
     * @dataProvider decimalPartDataProvider
     */
    public function testSetDecimalPart($expect, $float, $decimalPart)
    {
        $transformer = new Transformer($this->dictionary, $decimalPart);
        $this->assertEquals($expect, $transformer->toCurrency($float));
    }

    public function decimalPartDataProvider(): array
    {
        return [
            ['không đồng', 0, 1],
            ['một nghìn đồng', 1000, 2],
            ['một nghìn không trăm linh một đồng', 1001, 3],
            ['một nghìn không trăm linh hai đồng', 1002, 4],
            ['âm không phẩy mười đồng', -0.1, 2],
            ['âm chín mươi chín đồng', -99, 3],
            ['âm chín mươi tám đồng', -98, 4],
            ['không phẩy ba trăm bảy mươi chín đồng', 0.378758, 3],
            ['không phẩy chín mươi hai đồng', 0.922174, 2],
            ['năm trăm bảy mươi ba phẩy năm mươi tám đồng', 573.58, 2],
            ['sáu trăm sáu mươi chín phẩy mười bốn đồng', 669.135, 2],
            ['ba trăm chín mươi lăm phẩy mười bốn đồng', 395.136, 2],
        ];
    }

    public function usdDataProvider(): array
    {
        return [
            ['sáu nghìn bảy trăm bốn mươi hai đô bảy xen', 6742.7],
            ['hai nghìn chín trăm tám mươi mốt đô sáu mươi lăm xen', 2981.65],
            ['chín nghìn bốn trăm chín mươi hai đô mười lăm xen', 9492.15],
            ['ba nghìn bảy trăm linh bảy đô', 3707],
            ['năm nghìn tám trăm chín mươi mốt đô năm mươi sáu xen', 5891.56],
            ['bảy nghìn tám trăm năm mươi bảy đô tám mươi mốt xen', 7857.81],
            ['bốn nghìn không trăm sáu mươi lăm đô', 4065],
            ['một nghìn sáu trăm bốn mươi đô ba mươi hai xen', 1640.32],
            ['sáu nghìn không trăm hai mươi tư đô bảy mươi mốt xen', 6024.71],
            ['ba nghìn bốn trăm ba mươi đô chín mươi mốt xen', 3430.91],
            ['bảy nghìn không trăm ba mươi tư đô', 7034],
            ['hai nghìn năm trăm năm mươi ba đô sáu xen', 2553.6],
            ['bốn nghìn năm trăm bốn mươi ba đô', 4543],
            ['chín nghìn bốn trăm bốn mươi hai đô', 9442],
            ['một nghìn một trăm mười tám đô', 1118],
            ['chín nghìn chín trăm ba mươi đô', 9930],
            ['chín nghìn năm trăm đô ba mươi ba xen', 9500.33],
            ['một nghìn một trăm năm mươi lăm đô', 1155],
            ['năm nghìn một trăm mười chín đô', 5119],
            ['một nghìn tám trăm ba mươi tám đô', 1838],
            ['tám nghìn bốn trăm linh hai đô hai mươi tư xen', 8402.24],
            ['bảy nghìn một trăm bảy mươi ba đô', 7173],
            ['hai nghìn tám trăm tám mươi mốt đô năm mươi tư xen', 2881.54],
            ['một nghìn tám trăm ba mươi tư đô', 1834],
            ['chín nghìn bảy trăm tám mươi lăm đô bốn mươi ba xen', 9785.43],
            ['ba nghìn năm trăm tám mươi bảy đô bảy mươi ba xen', 3587.73],
            ['hai nghìn chín trăm bốn mươi đô', 2940],
            ['bảy nghìn tám trăm bốn mươi bảy đô sáu mươi bảy xen', 7847.67],
            ['chín nghìn hai trăm ba mươi ba đô sáu xen', 9233.60],
            ['tám nghìn ba trăm sáu mươi mốt đô bốn xen', 8361.40],
            ['bảy nghìn năm trăm hai mươi lăm đô chín mươi tư xen', 7525.94],
            ['một nghìn bốn trăm linh năm đô', 1405],
            ['năm nghìn chín trăm linh bốn đô', 5904],
            ['tám nghìn bốn trăm sáu mươi mốt đô', 8461],
            ['hai nghìn một trăm bảy mươi bảy đô hai mươi tám xen', 2177.28],
            ['hai nghìn một trăm linh tám đô năm mươi ba xen', 2108.53],
            ['ba nghìn bốn trăm tám mươi đô mười hai xen', 3480.12],
            ['ba nghìn năm trăm sáu mươi bảy đô', 3567],
            ['tám nghìn không trăm linh tám đô', 8008],
            ['hai nghìn tám trăm bảy mươi hai đô', 2872],
            ['ba nghìn hai trăm ba mươi chín đô năm mươi ba xen', 3239.53],
            ['một nghìn bốn trăm mười sáu đô chín mươi tư xen', 1416.94],
            ['tám nghìn không trăm mười sáu đô hai mươi hai xen', 8016.22],
            ['ba nghìn năm trăm mười hai đô', 3512],
            ['một nghìn tám trăm mười lăm đô hai xen', 1815.20],
            ['ba nghìn bảy trăm bốn mươi chín đô', 3749],
            ['bảy nghìn một trăm mười đô', 7110],
            ['ba nghìn chín trăm sáu mươi ba đô tám xen', 3963.80],
            ['năm nghìn tám trăm ba mươi mốt đô bốn mươi chín xen', 5831.49],
            ['hai nghìn bảy trăm năm mươi sáu đô', 2756],
            ['sáu nghìn hai trăm chín mươi chín đô', 6299],
            ['năm nghìn sáu trăm đô sáu mươi chín xen', 5600.69],
            ['sáu nghìn sáu trăm hai mươi ba đô tám mươi hai xen', 6623.82],
            ['năm nghìn bốn trăm sáu mươi mốt đô', 5461],
            ['một nghìn hai trăm bảy mươi lăm đô hai mươi sáu xen', 1275.26],
            ['một nghìn không trăm mười một đô hai mươi sáu xen', 1011.26],
            ['sáu nghìn không trăm mười hai đô', 6012],
            ['hai nghìn năm trăm mười sáu đô', 2516],
            ['bảy nghìn chín trăm bảy mươi đô', 7970],
            ['năm nghìn tám trăm linh sáu đô', 5806],
            ['bốn nghìn tám trăm hai mươi mốt đô hai mươi tư xen', 4821.24],
            ['bốn nghìn bảy trăm hai mươi sáu đô hai mươi sáu xen', 4726.26],
            ['một nghìn hai trăm ba mươi ba đô', 1233],
            ['hai nghìn hai trăm năm mươi ba đô', 2253],
            ['bốn nghìn không trăm hai mươi hai đô ba mươi lăm xen', 4022.35],
            ['một nghìn năm trăm đô', 1500],
            ['một nghìn chín trăm năm mươi tám đô tám mươi ba xen', 1958.83],
            ['một nghìn không trăm linh hai đô bốn mươi tám xen', 1002.48],
            ['hai nghìn chín trăm tám mươi tám đô', 2988],
            ['tám nghìn bốn trăm tám mươi tư đô', 8484],
            ['hai nghìn sáu trăm sáu mươi mốt đô', 2661],
            ['ba nghìn bốn trăm mười hai đô', 3412],
            ['năm nghìn bảy trăm sáu mươi chín đô', 5769],
            ['ba nghìn ba trăm sáu mươi lăm đô', 3365],
            ['bảy nghìn bốn trăm linh chín đô', 7409],
            ['sáu nghìn tám trăm ba mươi bảy đô', 6837],
            ['tám nghìn sáu trăm sáu mươi mốt đô', 8661],
            ['năm nghìn ba trăm bảy mươi bảy đô', 5377],
            ['hai nghìn ba trăm năm mươi đô', 2350],
            ['bảy nghìn hai trăm bảy mươi tám đô', 7278],
            ['bốn nghìn ba trăm hai mươi hai đô sáu mươi hai xen', 4322.62],
            ['năm nghìn một trăm mười ba đô', 5113],
            ['chín nghìn tám trăm bảy mươi ba đô', 9873],
            ['tám nghìn bảy trăm hai mươi đô', 8720],
            ['bốn nghìn không trăm linh sáu đô bốn mươi hai xen', 4006.42],
            ['tám nghìn năm trăm sáu mươi hai đô', 8562],
            ['năm nghìn không trăm năm mươi hai đô hai mươi bảy xen', 5052.27],
            ['bảy nghìn bảy trăm hai mươi tám đô', 7728],
            ['sáu nghìn một trăm sáu mươi hai đô', 6162],
            ['bốn nghìn hai trăm ba mươi hai đô bảy xen', 4232.70],
            ['sáu nghìn ba trăm bảy mươi mốt đô ba mươi tư xen', 6371.34],
            ['ba nghìn không trăm linh ba đô tám mươi chín xen', 3003.89],
            ['một nghìn bốn trăm bốn mươi bảy đô chín xen', 1447.9],
            ['tám nghìn ba trăm linh năm đô', 8305],
            ['bảy nghìn năm trăm sáu mươi chín đô bốn xen', 7569.40],
            ['chín nghìn một trăm hai mươi ba đô', 9123],
            ['bảy nghìn bốn trăm bốn mươi tư đô hai mươi sáu xen', 7444.26],
            ['một nghìn bốn trăm bảy mươi tư đô sáu xen', 1474.60],
            ['bảy nghìn bảy trăm bảy mươi đô', 7770],
            ['ba nghìn bảy trăm chín mươi hai đô', 3792],
        ];
    }

    public function dataProvider(): array
    {
        return [
            ['hai mươi sáu triệu một trăm đồng', 26000100],
            ['ba trăm mười triệu năm trăm đồng', 310000500],
            ['chín mươi lăm triệu năm trăm nghìn hai trăm đồng', 95500200],
            ['hai mươi mốt triệu tám trăm nghìn năm trăm đồng', 21800500],
            ['ba mươi chín triệu bốn trăm nghìn năm trăm đồng', 39400500],
            ['sáu mươi nghìn ba trăm đồng', 60300],
            ['ba trăm chín mươi lăm triệu một trăm đồng', 395000100],
            ['bốn mươi nghìn một trăm đồng', 40100],
            ['sáu trăm tám mươi mốt triệu chín trăm đồng', 681000900],
            ['năm triệu tám trăm nghìn một trăm đồng', 5800100],
            ['bốn mươi tư triệu bảy trăm nghìn chín trăm đồng', 44700900],
            ['bảy triệu ba trăm nghìn hai trăm đồng', 7300200],
            ['bốn triệu tám trăm mười nghìn tám trăm đồng', 4810800],
            ['năm trăm sáu mươi tư nghìn bảy trăm đồng', 564700],
            ['hai triệu hai trăm bốn mươi nghìn tám trăm đồng', 2240800],
            ['hai mươi chín triệu năm trăm nghìn tám trăm đồng', 29500800],
            ['bảy trăm chín mươi hai triệu một trăm đồng', 792000100],
            ['năm trăm mười lăm nghìn bảy trăm đồng', 515700],
            ['ba mươi hai nghìn sáu trăm đồng', 32600],
            ['mười chín triệu chín trăm nghìn hai trăm đồng', 19900200],
            ['ba triệu hai trăm hai mươi nghìn tám trăm đồng', 3220800],
            ['tám trăm chín mươi chín nghìn hai trăm đồng', 899200],
            ['ba mươi hai nghìn tám trăm đồng', 32800],
            ['một trăm bốn mươi bảy triệu tám trăm đồng', 147000800],
            ['hai triệu hai trăm hai mươi nghìn sáu trăm đồng', 2220600],
            ['chín triệu tám trăm năm mươi nghìn bốn trăm đồng', 9850400],
            ['năm triệu bốn trăm bốn mươi nghìn một trăm đồng', 5440100],
            ['bốn mươi ba nghìn chín trăm đồng', 43900],
            ['hai trăm nghìn ba trăm đồng', 200300],
            ['bảy trăm ba mươi tư triệu chín trăm đồng', 734000900],
            ['hai mươi tám triệu chín trăm đồng', 28000900],
            ['chín trăm bốn mươi ba nghìn tám trăm đồng', 943800],
            ['ba trăm chín mươi mốt triệu bốn trăm đồng', 391000400],
            ['bốn trăm bảy mươi tư nghìn ba trăm đồng', 474300],
            ['bảy triệu bảy trăm ba mươi nghìn một trăm đồng', 7730100],
            ['bảy trăm ba mươi tám triệu chín trăm đồng', 738000900],
            ['một trăm hai mươi triệu sáu trăm đồng', 120000600],
            ['một trăm chín mươi ba triệu ba trăm đồng', 193000300],
            ['bốn mươi lăm triệu bảy trăm nghìn tám trăm đồng', 45700800],
            ['năm trăm ba mươi sáu triệu ba trăm đồng', 536000300],
            ['bảy triệu không trăm mười nghìn hai trăm đồng', 7010200],
            ['bảy triệu một trăm ba mươi nghìn bốn trăm đồng', 7130400],
            ['ba trăm năm mươi ba triệu năm trăm đồng', 353000500],
            ['một trăm bảy mươi bảy triệu năm trăm đồng', 177000500],
            ['hai triệu bảy trăm nghìn một trăm đồng', 2700100],
            ['tám mươi nghìn chín trăm đồng', 80900],
            ['hai trăm tám mươi hai triệu bảy trăm đồng', 282000700],
            ['ba trăm tám mươi chín triệu chín trăm đồng', 389000900],
            ['sáu triệu sáu trăm hai mươi nghìn chín trăm đồng', 6620900],
            ['ba trăm chín mươi lăm triệu năm trăm đồng', 395000500],
            ['bốn triệu một trăm tám mươi nghìn chín trăm đồng', 4180900],
            ['bảy trăm sáu mươi chín nghìn năm trăm đồng', 769500],
            ['chín mươi tư triệu bảy trăm nghìn ba trăm đồng', 94700300],
            ['tám triệu bảy trăm đồng', 8000700],
            ['bốn mươi tư triệu hai trăm nghìn bảy trăm đồng', 44200700],
            ['năm trăm chín mươi tám nghìn hai trăm đồng', 598200],
            ['năm mươi mốt triệu một trăm nghìn hai trăm đồng', 51100200],
            ['tám mươi sáu triệu năm trăm nghìn ba trăm đồng', 86500300],
            ['bốn trăm năm mươi nghìn một trăm đồng', 450100],
            ['hai triệu hai trăm tám mươi nghìn một trăm đồng', 2280100],
            ['chín mươi triệu hai trăm nghìn năm trăm đồng', 90200500],
            ['bảy mươi ba triệu hai trăm nghìn bốn trăm đồng', 73200400],
            ['một trăm sáu mươi sáu nghìn bốn trăm đồng', 166400],
            ['tám triệu bốn trăm hai mươi nghìn sáu trăm đồng', 8420600],
            ['năm triệu hai trăm năm mươi nghìn sáu trăm đồng', 5250600],
            ['tám trăm năm mươi tư triệu chín trăm đồng', 854000900],
            ['bảy triệu không trăm tám mươi nghìn sáu trăm đồng', 7080600],
            ['tám mươi mốt triệu hai trăm nghìn ba trăm đồng', 81200300],
            ['tám trăm hai mươi hai triệu năm trăm đồng', 822000500],
            ['sáu trăm linh ba nghìn bốn trăm đồng', 603400],
            ['ba trăm linh một nghìn bảy trăm đồng', 301700],
            ['bảy trăm bốn mươi hai nghìn năm trăm đồng', 742500],
            ['năm trăm sáu mươi lăm nghìn ba trăm đồng', 565300],
            ['chín trăm ba mươi triệu một trăm đồng', 930000100],
            ['hai trăm chín mươi mốt nghìn bốn trăm đồng', 291400],
            ['hai triệu không trăm hai mươi nghìn sáu trăm đồng', 2020600],
            ['chín mươi tư triệu hai trăm nghìn bốn trăm đồng', 94200400],
            ['tám mươi bảy nghìn ba trăm đồng', 87300],
            ['chín mươi chín triệu năm trăm nghìn bốn trăm đồng', 99500400],
            ['một trăm sáu mươi hai nghìn bảy trăm đồng', 162700],
            ['một trăm ba mươi tám triệu bảy trăm đồng', 138000700],
            ['tám trăm mười hai nghìn hai trăm đồng', 812200],
            ['sáu trăm mười một triệu một trăm đồng', 611000100],
            ['sáu trăm mười triệu tám trăm đồng', 610000800],
            ['mười triệu ba trăm nghìn sáu trăm đồng', 10300600],
            ['hai triệu chín trăm hai mươi nghìn chín trăm đồng', 2920900],
            ['sáu trăm ba mươi triệu bảy trăm đồng', 630000700],
            ['một trăm mười một nghìn chín trăm đồng', 111900],
            ['bảy mươi mốt triệu sáu trăm nghìn một trăm đồng', 71600100],
            ['chín trăm bốn mươi nghìn bốn trăm đồng', 940400],
            ['tám mươi ba triệu chín trăm nghìn ba trăm đồng', 83900300],
            ['bốn triệu sáu trăm mười nghìn hai trăm đồng', 4610200],
            ['ba trăm linh bảy triệu bảy trăm đồng', 307000700],
            ['một triệu chín trăm mười nghìn hai trăm đồng', 1910200],
            ['bốn mươi tám triệu bốn trăm nghìn một trăm đồng', 48400100],
            ['năm triệu sáu trăm chín mươi nghìn bảy trăm đồng', 5690700],
            ['chín trăm mười bảy triệu bảy trăm đồng', 917000700],
            ['năm trăm nghìn bảy trăm đồng', 500700],
            ['mười bảy triệu bảy trăm nghìn một trăm đồng', 17700100],
        ];
    }
}
