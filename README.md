# laravel-dotpay

Package for Dotpay payments via api instead of form

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/axotion/laravel-dotpay/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/axotion/laravel-dotpay/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/axotion/laravel-dotpay/badges/build.png?b=master)](https://scrutinizer-ci.com/g/axotion/laravel-dotpay/build-status/master)
[![Latest Unstable Version](https://poser.pugx.org/evilnet/dotpay/v/unstable)](https://packagist.org/packages/evilnet/dotpay)
[![License](https://poser.pugx.org/evilnet/dotpay/license)](https://packagist.org/packages/evilnet/dotpay)
[![Total Downloads](https://poser.pugx.org/evilnet/dotpay/downloads)](https://packagist.org/packages/evilnet/dotpay)
## Structure

```
src/
tests/
```


## Install

Via Composer

``` bash
$ composer require evilnet/dotpay
```

Then register service and alias in config/app.php


```
'providers' => [

     Evilnet\Dotpay\DotpayServiceProvider::class,
 
 
 'aliases' => [
     'Dotpay' => Evilnet\Dotpay\Facades\Dotpay::class
```


Publish config 

```
php artisan vendor:publish --provider="Evilnet\Dotpay\DotpayServiceProvider"
```

Configure .env file

```
DOTPAY_USERNAME=
DOTPAY_PASSWORD=
DOTPAY_SHOP_ID=
DOTPAY_PIN=
DOTPAY_BASE_URL=https://ssl.dotpay.pl/test_seller/ 
```

And add your callback post method to exception in VerifyCsrfToken middleware

## Example of usage

``` php

use Evilnet\Dotpay\Facades\Dotpay;

class DotpayController extends Controller
{

    public function callback(Request $request)
    {
       $result = Dotpay::callback($request->all());

    }

    public function pay()
    {
        $data = [
            'amount' => '100',
            'currency' => 'PLN',
            'description' => 'Payment for internal_id order',
            'control' => '12345', //ID that dotpay will pong you in the answer
            'language' => 'pl',
            'ch_lock' => '1',
            'url' => config('dotpay.options.url'),
            'urlc' => config('dotpay.options.curl'),
            'expiration_datetime' => '2017-12-01T16:48:00',
            'payer' => [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'email' => 'john.smith@example.com',
                'phone' => '+48123123123'
            ],
            'recipient' => config('dotpay.options.recipient')

        ];

       return redirect()->to(Dotpay::redirectUrl($data));
    }
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email axotion@linux.pl instead of using the issue tracker.

## Credits

- [Axotion][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/evilnet/dotpay.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/evilnet/dotpay/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/evilnet/dotpay.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/evilnet/dotpay.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/evilnet/dotpay.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/evilnet/dotpay
[link-travis]: https://travis-ci.org/evilnet/dotpay
[link-scrutinizer]: https://scrutinizer-ci.com/g/evilnet/dotpay/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/evilnet/dotpay
[link-downloads]: https://packagist.org/packages/evilnet/dotpay
[link-author]: https://github.com/axotion
[link-contributors]: ../../contributors
