<?php
/**
 * @link https://github.com/phpviet/number-to-words
 *
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use PHPViet\NumberToWords\SouthDictionary;
use PHPViet\NumberToWords\Transformer;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class SouthDictionaryTest extends BaseTestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTransform($expect, $number)
    {
        $transformer = new Transformer(new SouthDictionary());
        $this->assertEquals($expect, $transformer->toWords($number));
    }

    public function dataProvider(): array
    {
        return [
            ['chín trăm sáu mươi ngàn bốn trăm chín mươi lăm', 960495],
            ['bảy mươi mốt ngàn năm trăm hai mươi mốt', 71521],
            ['ba mươi bảy ngàn bảy trăm bảy mươi', 37770],
            ['bảy trăm mười ngàn chín trăm năm mươi', 710950],
            ['bốn mươi bảy ngàn một trăm mười tám', 47118],
            ['chín mươi tám ngàn hai trăm bốn mươi bảy', 98247],
            ['chín mươi lăm ngàn năm trăm hai mươi hai', 95522],
            ['sáu trăm sáu mươi ngàn một trăm hai mươi bốn', 660124],
            ['mười chín ngàn sáu trăm lẻ chín', 19609],
            ['hai mươi mốt ngàn một trăm năm mươi bảy', 21157],
            ['ba mươi ngàn sáu trăm năm mươi bốn', 30654],
            ['bảy trăm ba mươi ngàn năm trăm sáu mươi ba', 730563],
            ['chín mươi bảy ngàn chín trăm chín mươi mốt', 97991],
            ['sáu trăm bảy mươi ngàn bảy trăm sáu mươi tám', 670768],
            ['sáu mươi chín ngàn bảy trăm năm mươi sáu', 69756],
            ['năm mươi mốt ngàn một trăm hai mươi sáu', 51126],
            ['ba mươi tám ngàn năm trăm năm mươi ba', 38553],
            ['hai trăm ba mươi ngàn một trăm năm mươi mốt', 230151],
            ['hai mươi ba ngàn chín trăm tám mươi tám', 23988],
            ['ba trăm hai mươi ngàn ba trăm bảy mươi hai', 320372],
            ['chín mươi ngàn năm trăm sáu mươi sáu', 90566],
            ['một trăm bốn mươi ngàn hai trăm chín mươi bảy', 140297],
            ['hai mươi ngàn một trăm sáu mươi sáu', 20166],
            ['sáu mươi chín ngàn chín trăm bốn mươi sáu', 69946],
            ['tám trăm bốn mươi ngàn một trăm bốn mươi bảy', 840147],
            ['bảy trăm bảy mươi ngàn hai trăm mười tám', 770218],
            ['bảy mươi sáu ngàn tám trăm tám mươi sáu', 76886],
            ['tám trăm bốn mươi ngàn năm trăm năm mươi tám', 840558],
            ['ba trăm bảy mươi ngàn bảy trăm lẻ sáu', 370706],
            ['năm mươi ngàn bảy trăm', 50700],
            ['chín trăm chín mươi ngàn hai trăm sáu mươi mốt', 990261],
            ['tám mươi hai ngàn sáu trăm chín mươi bảy', 82697],
            ['tám mươi hai ngàn hai trăm hai mươi bảy', 82227],
            ['hai mươi lăm ngàn sáu trăm chín mươi tám', 25698],
            ['tám mươi ba ngàn tám trăm bảy mươi bảy', 83877],
            ['ba trăm ngàn hai trăm tám mươi sáu', 300286],
            ['chín trăm hai mươi ngàn chín trăm sáu mươi mốt', 920961],
            ['năm trăm mười ngàn sáu trăm tám mươi bốn', 510684],
            ['sáu trăm sáu mươi ngàn sáu trăm sáu mươi tám', 660668],
            ['một trăm năm mươi ngàn bảy trăm ba mươi', 150730],
            ['bảy mươi lăm ngàn một trăm tám mươi tám', 75188],
            ['năm mươi ngàn ba trăm năm mươi mốt', 50351],
            ['tám mươi ba ngàn hai trăm bảy mươi', 83270],
            ['ba mươi sáu ngàn năm trăm bảy mươi lăm', 36575],
            ['một triệu năm trăm chín mươi chín', 1000599],
            ['bảy mươi ngàn ba trăm chín mươi tám', 70398],
            ['chín mươi tám ngàn năm trăm bốn mươi bốn', 98544],
            ['hai mươi ngàn bảy trăm ba mươi', 20730],
            ['bảy mươi ngàn bảy trăm sáu mươi chín', 70769],
            ['năm trăm bốn mươi ngàn năm trăm năm mươi chín', 540559],
            ['hai ngàn năm trăm tám mươi ba', 2583],
            ['ba mươi lăm ngàn bảy trăm tám mươi ba', 35783],
            ['bốn trăm hai mươi ngàn hai trăm tám mươi sáu', 420286],
            ['sáu trăm bốn mươi ngàn ba trăm chín mươi tám', 640398],
            ['một trăm chín mươi ngàn một trăm năm mươi bốn', 190154],
            ['năm mươi lăm ngàn một trăm mười lăm', 55115],
            ['tám mươi bảy ngàn một trăm bảy mươi sáu', 87176],
            ['ba trăm bảy mươi ngàn chín trăm chín mươi', 370990],
            ['hai trăm ba mươi ngàn tám trăm lẻ một', 230801],
            ['chín mươi ba ngàn ba trăm sáu mươi lăm', 93365],
            ['hai mươi hai ngàn ba trăm chín mươi sáu', 22396],
            ['chín mươi bảy ngàn chín trăm hai mươi tám', 97928],
            ['bảy mươi hai ngàn một trăm tám mươi mốt', 72181],
            ['sáu trăm ba mươi ngàn bảy trăm chín mươi ba', 630793],
            ['năm trăm ngàn năm trăm sáu mươi bảy', 500567],
            ['bảy mươi ngàn ba trăm sáu mươi chín', 70369],
            ['bảy trăm ba mươi ngàn hai trăm hai mươi chín', 730229],
            ['tám trăm mười ngàn ba trăm bảy mươi ba', 810373],
            ['ba mươi mốt ngàn năm trăm ba mươi', 31530],
            ['tám trăm sáu mươi ngàn ba trăm ba mươi mốt', 860331],
            ['năm mươi ba ngàn bốn trăm chín mươi ba', 53493],
            ['bảy trăm sáu mươi ngàn bảy trăm bảy mươi', 760770],
            ['chín trăm mười ngàn hai trăm mười chín', 910219],
            ['tám trăm chín mươi ngàn bốn trăm tám mươi', 890480],
            ['một trăm bốn mươi ngàn năm trăm bốn mươi bảy', 140547],
            ['một ngàn bảy trăm sáu mươi mốt', 1761],
            ['tám ngàn hai trăm tám mươi chín', 8289],
            ['hai trăm sáu mươi ngàn năm trăm hai mươi lăm', 260525],
            ['hai mươi lăm ngàn ba trăm sáu mươi', 25360],
            ['bốn mươi tám ngàn bốn trăm lẻ một', 48401],
            ['năm trăm chín mươi ngàn hai trăm năm mươi bảy', 590257],
            ['sáu trăm ngàn ba trăm tám mươi bảy', 600387],
            ['tám trăm chín mươi ngàn sáu trăm tám mươi sáu', 890686],
            ['năm mươi ngàn hai trăm tám mươi bốn', 50284],
            ['năm trăm ngàn sáu trăm hai mươi lăm', 500625],
            ['tám trăm chín mươi ngàn năm trăm sáu mươi chín', 890569],
            ['hai trăm ngàn chín trăm bốn mươi lăm', 200945],
            ['bảy trăm bảy mươi ngàn năm trăm hai mươi lăm', 770525],
            ['sáu mươi bốn ngàn năm trăm mười bảy', 64517],
            ['sáu mươi ngàn ba trăm mười một', 60311],
            ['bảy trăm bốn mươi ngàn sáu trăm năm mươi chín', 740659],
            ['ba trăm mười ngàn bảy trăm sáu mươi bảy', 310767],
            ['chín mươi hai ngàn ba trăm ba mươi hai', 92332],
            ['mười ngàn ba trăm ba mươi hai', 10332],
            ['mười ba ngàn ba trăm mười lăm', 13315],
            ['bốn trăm tám mươi ngàn tám trăm tám mươi hai', 480882],
            ['sáu mươi ngàn năm trăm lẻ ba', 60503],
            ['ba mươi lăm ngàn hai trăm chín mươi bốn', 35294],
            ['tám mươi tám ngàn bốn trăm hai mươi bảy', 88427],
            ['sáu trăm năm mươi ngàn sáu trăm bảy mươi ba', 650673],
        ];
    }
}
