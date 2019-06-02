<?php
/**
 * @link https://github.com/phpviet/number-to-words
 * @copyright (c) PHP Viet
 * @license [MIT](http://www.opensource.org/licenses/MIT)
 */

namespace PHPViet\NumberToWords\Tests;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class NumberTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     */
    public function testTransform($expect, $number)
    {
        $this->assertEquals($expect, $this->transformer->toWords($number));
    }

    public function dataProvider(): array
    {
        return [
            ['một nghìn', 1000],
            ['một nghìn không trăm linh một', 1001],
            ['một nghìn không trăm linh hai', 1002],
            ['một nghìn không trăm linh ba', 1003],
            ['một nghìn không trăm linh bốn', 1004],
            ['một nghìn không trăm linh năm', 1005],
            ['một nghìn không trăm linh sáu', 1006],
            ['một nghìn không trăm linh bảy', 1007],
            ['một nghìn không trăm linh tám', 1008],
            ['một nghìn không trăm linh chín', 1009],
            ['một nghìn không trăm mười', 1010],
            ['một nghìn không trăm mười một', 1011],
            ['một nghìn không trăm mười hai', 1012],
            ['một nghìn không trăm mười ba', 1013],
            ['một nghìn không trăm mười bốn', 1014],
            ['một nghìn không trăm mười lăm', 1015],
            ['một nghìn không trăm mười sáu', 1016],
            ['một nghìn không trăm mười bảy', 1017],
            ['một nghìn không trăm mười tám', 1018],
            ['một nghìn không trăm mười chín', 1019],
            ['một nghìn không trăm hai mươi', 1020],
            ['một nghìn không trăm hai mươi mốt', 1021],
            ['một nghìn không trăm hai mươi hai', 1022],
            ['một nghìn không trăm hai mươi ba', 1023],
            ['một nghìn không trăm hai mươi tư', 1024],
            ['một nghìn không trăm hai mươi lăm', 1025],
            ['một nghìn không trăm hai mươi sáu', 1026],
            ['một nghìn không trăm hai mươi bảy', 1027],
            ['một nghìn không trăm hai mươi tám', 1028],
            ['một nghìn không trăm hai mươi chín', 1029],
            ['một nghìn không trăm ba mươi', 1030],
            ['một nghìn không trăm ba mươi mốt', 1031],
            ['một nghìn không trăm ba mươi hai', 1032],
            ['một nghìn không trăm ba mươi ba', 1033],
            ['một nghìn không trăm ba mươi tư', 1034],
            ['một nghìn không trăm ba mươi lăm', 1035],
            ['một nghìn không trăm ba mươi sáu', 1036],
            ['một nghìn không trăm ba mươi bảy', 1037],
            ['một nghìn không trăm ba mươi tám', 1038],
            ['một nghìn không trăm ba mươi chín', 1039],
            ['một nghìn không trăm bốn mươi', 1040],
            ['một nghìn không trăm bốn mươi mốt', 1041],
            ['một nghìn không trăm bốn mươi hai', 1042],
            ['một nghìn không trăm bốn mươi ba', 1043],
            ['một nghìn không trăm bốn mươi tư', 1044],
            ['một nghìn không trăm bốn mươi lăm', 1045],
            ['một nghìn không trăm bốn mươi sáu', 1046],
            ['một nghìn không trăm bốn mươi bảy', 1047],
            ['một nghìn không trăm bốn mươi tám', 1048],
            ['một nghìn không trăm bốn mươi chín', 1049],
            ['một nghìn không trăm năm mươi', 1050],
            ['một nghìn không trăm năm mươi mốt', 1051],
            ['một nghìn không trăm năm mươi hai', 1052],
            ['một nghìn không trăm năm mươi ba', 1053],
            ['một nghìn không trăm năm mươi tư', 1054],
            ['một nghìn không trăm năm mươi lăm', 1055],
            ['một nghìn không trăm năm mươi sáu', 1056],
            ['một nghìn không trăm năm mươi bảy', 1057],
            ['một nghìn không trăm năm mươi tám', 1058],
            ['một nghìn không trăm năm mươi chín', 1059],
            ['một nghìn không trăm sáu mươi', 1060],
            ['một nghìn không trăm sáu mươi mốt', 1061],
            ['một nghìn không trăm sáu mươi hai', 1062],
            ['một nghìn không trăm sáu mươi ba', 1063],
            ['một nghìn không trăm sáu mươi tư', 1064],
            ['một nghìn không trăm sáu mươi lăm', 1065],
            ['một nghìn không trăm sáu mươi sáu', 1066],
            ['một nghìn không trăm sáu mươi bảy', 1067],
            ['một nghìn không trăm sáu mươi tám', 1068],
            ['một nghìn không trăm sáu mươi chín', 1069],
            ['một nghìn không trăm bảy mươi', 1070],
            ['một nghìn không trăm bảy mươi mốt', 1071],
            ['một nghìn không trăm bảy mươi hai', 1072],
            ['một nghìn không trăm bảy mươi ba', 1073],
            ['một nghìn không trăm bảy mươi tư', 1074],
            ['một nghìn không trăm bảy mươi lăm', 1075],
            ['một nghìn không trăm bảy mươi sáu', 1076],
            ['một nghìn không trăm bảy mươi bảy', 1077],
            ['một nghìn không trăm bảy mươi tám', 1078],
            ['một nghìn không trăm bảy mươi chín', 1079],
            ['một nghìn không trăm tám mươi', 1080],
            ['một nghìn không trăm tám mươi mốt', 1081],
            ['một nghìn không trăm tám mươi hai', 1082],
            ['một nghìn không trăm tám mươi ba', 1083],
            ['một nghìn không trăm tám mươi tư', 1084],
            ['một nghìn không trăm tám mươi lăm', 1085],
            ['một nghìn không trăm tám mươi sáu', 1086],
            ['một nghìn không trăm tám mươi bảy', 1087],
            ['một nghìn không trăm tám mươi tám', 1088],
            ['một nghìn không trăm tám mươi chín', 1089],
            ['một nghìn không trăm chín mươi', 1090],
            ['một nghìn không trăm chín mươi mốt', 1091],
            ['một nghìn không trăm chín mươi hai', 1092],
            ['một nghìn không trăm chín mươi ba', 1093],
            ['một nghìn không trăm chín mươi tư', 1094],
            ['một nghìn không trăm chín mươi lăm', 1095],
            ['một nghìn không trăm chín mươi sáu', 1096],
            ['một nghìn không trăm chín mươi bảy', 1097],
            ['một nghìn không trăm chín mươi tám', 1098],
            ['một nghìn không trăm chín mươi chín', 1099],
            ['một nghìn một trăm', 1100],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi', 131050030],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi mốt', 131050031],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi hai', 131050032],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi ba', 131050033],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi tư', 131050034],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi lăm', 131050035],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi sáu', 131050036],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi bảy', 131050037],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi tám', 131050038],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi chín', 131050039],
            ['một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm bốn mươi', 131050040],
            ['chín trăm chín mươi chín triệu chín trăm chín mươi chín nghìn chín trăm chín mươi chín', 999999999],
            ['một tỷ không trăm bảy mươi', 1000000070],
            ['một tỷ không trăm bảy mươi mốt', 1000000071],
            ['một tỷ không trăm bảy mươi hai', 1000000072],
            ['một tỷ không trăm bảy mươi ba', 1000000073],
            ['một tỷ không trăm bảy mươi tư', 1000000074],
            ['một tỷ không trăm bảy mươi lăm', 1000000075],
            ['một tỷ không trăm bảy mươi sáu', 1000000076],
            ['một tỷ không trăm bảy mươi bảy', 1000000077],
            ['một tỷ không trăm bảy mươi tám', 1000000078],
            ['một tỷ không trăm bảy mươi chín', 1000000079]
        ];
    }
}
