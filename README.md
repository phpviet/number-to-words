<p align="center">
    <a href="https://github.com/phpviet" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/50674062" height="100px">
    </a>
    <h1 align="center">Number To Words</h1>
    <br>
</p>

Thư viện hổ trợ chuyển đổi số sang chữ số Tiếng Việt.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/phpviet/number-to-words.svg?style=flat-square)](https://packagist.org/packages/phpviet/number-to-words)
[![Build Status](https://img.shields.io/travis/phpviet/number-to-words/master.svg?style=flat-square)](https://travis-ci.org/phpviet/number-to-words)
[![Quality Score](https://img.shields.io/scrutinizer/g/phpviet/number-to-words.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpviet/number-to-words)
[![StyleCI](https://styleci.io/repos/189439149/shield?branch=master)](https://styleci.io/repos/189439149)
[![Total Downloads](https://img.shields.io/packagist/dt/phpviet/number-to-words.svg?style=flat-square)](https://packagist.org/packages/phpviet/number-to-words)

## Cài đặt

Cài đặt Number To Words thông qua [Composer](https://getcomposer.org):

```bash
composer require phpviet/number-to-words
```

## Cách sử dụng

### Tích hợp sẵn trên các framework phổ biến hiện tại

- [`Laravel`](https://github.com/phpviet/laravel-number-to-words)
- [`Symfony`](https://github.com/phpviet/symfony-number-to-words)
- [`Yii`](https://github.com/phpviet/yii-number-to-words)

hoặc nếu bạn muốn sử dụng không dựa trên framework thì tiếp tục xem tiếp.

### Các tính năng của thư viện:

- [`Chuyển đổi số sang chữ số`](#Chuyển-đổi-số-sang-chữ-số)
- [`Chuyển đổi số sang tiền tệ`](#Chuyển-đổi-số-sang-tiền-tệ)
- [`Thay cách đọc số`](#Thay-cách-đọc-số)

### Chuyển đổi số sang chữ số

Thư viện cung cấp cho chúng ta lớp `PHPViet\NumberToWords\Transformer` để thực hiện việc chuyển đổi
thông qua phương thức `toWords` của đối tượng:

```php

use PHPViet\NumberToWords\Transformer;

$transformer = new Transformer();

// âm năm
$transformer->toWords(-5); 

// năm
$transformer->toWords(5); 

// năm phẩy năm
$transformer->toWords(5.5); 

// mười lăm
$transformer->toWords(15); 

// một trăm linh năm
$transformer->toWords(105); 

// bốn
$transformer->toWords(4); 

// mười bốn
$transformer->toWords(14);

// hai mươi tư
$transformer->toWords(24); 

// một trăm ba mươi tư
$transformer->toWords(134); 

// một
$transformer->toWords(1); // một

// mười một
$transformer->toWords(11); 

// hai mươi mốt
$transformer->toWords(21); 

 // một trăm nghìn không trăm hai mươi mốt.
$transformer->toWords(100021);

// một trăm ba mươi mốt triệu không trăm năm mươi nghìn không trăm ba mươi lăm
$transformer->toWords(131050035);

```

### Chuyển đổi số sang tiền tệ

Cũng như cách sử dụng của chuyển số sang chữ số ta cũng sử dụng lớp `PHPViet\NumberToWords\Transformer`
để thực thi tác vụ:

```php

use PHPViet\NumberToWords\Transformer;

$transformer = new Transformer();

// năm triệu sáu trăm chín mươi nghìn bảy trăm đồng
$transformer->toCurrency(5690700);

// chín mươi lăm triệu năm trăm nghìn hai trăm đồng
$transformer->toCurrency(95500200);

// tám trăm năm mươi tư triệu chín trăm đồng
$transformer->toCurrency(854000900);

```

Ngoài ra ta còn có thể sử dụng đơn vị tiền tệ khác thông qua tham trị thứ 2 của phương thức
`toCurrency`, với mảng phần từ đầu tiên là đơn vị cho số nguyên và kế tiếp là đơn vị của phân số:

```php

use PHPViet\NumberToWords\Transformer;

$transformer = new Transformer();

// sáu nghìn bảy trăm bốn mươi hai đô bảy xen
$transformer->toCurrency(6742.7, ['đô', 'xen']);

// chín nghìn bốn trăm chín mươi hai đô mười lăm xen
$transformer->toCurrency(9492.15, ['đô', 'xen']);

// tám nghìn ba trăm sáu mươi mốt đô bốn xen
$transformer->toCurrency('8361.40', ['đô', 'xen']);
```

### Thay cách đọc số

Trong thư viện ngoài cách đọc tiêu chuẩn còn hổ trợ cho chúng ta lớp `PHPViet\NumberToWords\SouthDictionary` 
giúp đọc số theo phong cách trong Nam:

```php

use PHPViet\NumberToWords\Transformer;
use PHPViet\NumberToWords\SouthDictionary;

$transformer = new Transformer();
$southDictionary = new SouthDictionary();
$southTransformer = new Transformer($southDictionary);

$transformer->toWords(101); // một trăm linh một
$southTransformer->toWords(101); // một trăm lẻ một

$transformer->toWords(1000); // một nghìn
$southTransformer->toWords(1000); // một ngàn

$transformer->toWords(24) // hai mươi tư
$southTransformer->toWords(24); // hai mươi bốn

$transformer->toCurrency(124001); // một trăm hai mươi tư nghìn không trăm linh một
$southTransformer->toCurrency(124001); // một trăm hai mươi bốn ngàn không trăm lẻ một
```

Nếu như bạn muốn thay đổi cách đọc theo ý bạn thì hãy tạo một lớp `Dictionary` kế thừa
`PHPViet\NumberToWords\Dictionary` hoặc thực thi mẫu trừu tượng `PHPViet\NumberToWords\DictionaryInterface`:

```php

use PHPViet\NumberToWords\Dictionary;
use PHPViet\NumberToWords\Transformer;

class MyDictionary extends Dictionary {

    /**
     * @inheritDoc
     */
    public function specialTripletUnitFive(): string
    {
        return 'nhăm';
    }

}

$transformer = new Transformer();
$myDictionary = new MyDictionary();
$myTransformer = new Transformer($myDictionary);

$transformer->toWords(15); // mười lăm
$myTransformer->toWords(15); // mười nhăm

```

## Dành cho nhà phát triển

Nếu như bạn cảm thấy thư viện còn thiếu sót hoặc sai sót và bạn muốn đóng góp để phát triển chung, 
chúng tôi rất hoan nghênh! Hãy tạo các `issue` để đóng góp ý tưởng cho phiên bản kế tiếp 
hoặc tạo `PR` để đóng góp. Cảm ơn!
