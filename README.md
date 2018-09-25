# Laravel Sense

![cog-laravel-sense](https://user-images.githubusercontent.com/1849174/46022813-fed4b300-c0eb-11e8-84c0-91a251c7d001.png)

<p align="center">
<a href="https://github.com/cybercog/laravel-sense/releases"><img src="https://img.shields.io/github/release/cybercog/laravel-sense.svg?style=flat-square" alt="Releases"></a>
<a href="https://travis-ci.org/cybercog/laravel-sense"><img src="https://img.shields.io/travis/cybercog/laravel-sense/master.svg?style=flat-square" alt="Build Status"></a>
<a href="https://styleci.io/repos/150279516"><img src="https://styleci.io/repos/150279516/shield" alt="StyleCI"></a>
<a href="https://scrutinizer-ci.com/g/cybercog/laravel-sense/?branch=master"><img src="https://img.shields.io/scrutinizer/g/cybercog/laravel-sense.svg?style=flat-square" alt="Code Quality"></a>
<a href="https://github.com/cybercog/laravel-sense/blob/master/LICENSE"><img src="https://img.shields.io/github/license/cybercog/laravel-sense.svg?style=flat-square" alt="License"></a>
</p>

## Introduction

**DON'T USE IT ON PRODUCTION! IT WILL ENORMOUSLY SLOW DOWN APPLICATION!**

When you feel that your application is starting to run slower, be careful, it can become a smelling zombie! Open application black box in a minutes!

Laravel Sense provides a dashboard for application profiling. Sense allows you to easily monitor key metrics such as HTTP requests & Eloquent queries.

### Requests list

![requests-list](https://user-images.githubusercontent.com/1849174/46025584-f7b0a380-c0f1-11e8-92f4-3dcb13364d65.png)

### Request details

![request-statements-index](https://user-images.githubusercontent.com/1849174/46025620-0d25cd80-c0f2-11e8-9b97-845b2f49242b.png)

## Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Testing](#testing)
- [Security](#security)
- [Contributors](#contributors)
- [Alternatives](#alternatives)
- [License](#license)
- [About CyberCog](#about-cybercog)

## Features

- Designed to work with Laravel Eloquent models.
- Dashboard with profiling summaries.
- Can profile APIs.
- Following PHP Standard Recommendations:
  - [PSR-1 (Basic Coding Standard)](http://www.php-fig.org/psr/psr-1/).
  - [PSR-2 (Coding Style Guide)](http://www.php-fig.org/psr/psr-2/).
  - [PSR-4 (Autoloading Standard)](http://www.php-fig.org/psr/psr-4/).

## Requirements

Laravel Sense has a few requirements you should be aware of before installing:

- PHP 7.1.3+
- Composer
- Laravel Framework 5.5+

## Installation

First, pull in the package through Composer.

```sh
$ composer require cybercog/laravel-sense
```

#### Perform Database Migration

At last you need to publish and run database migrations.

```sh
$ php artisan migrate
```

If you want to make changes in migrations, publish them to your application first.

```sh
$ php artisan vendor:publish --provider="Cog\Laravel\Sense\Providers\SenseServiceProvider" --tag=migrations
```

## Usage

### Dashboard Authentication

Sense exposes a dashboard at `/sense`.
By default, you will only be able to access this dashboard in the `local` environment.
To define a more specific access policy for the dashboard,
you should use the `\Cog\Laravel\Sense\Authentication\Services\Authenticator::using` method.
The `using` method accepts a callback which should return `true` or `false`,
indicating whether the user should have access to the Sense dashboard.
Typically, you should call `Authenticator::using` in the boot method of your `AppServiceProvider`:

```php
\Cog\Laravel\Sense\Authentication\Services\Authenticator::auth(function ($request) {
    // return true / false;
});
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Testing

Run the tests with:

```sh
$ vendor/bin/phpunit
```

## Security

If you discover any security related issues, please email open@cybercog.su instead of using the issue tracker.

## Contributors

| <a href="https://github.com/antonkomarev">![@antonkomarev](https://avatars.githubusercontent.com/u/1849174?s=110)<br />Anton Komarev</a> |  
| :---: |

[Laravel Sense contributors list](../../contributors)

## Alternatives

*Feel free to add more alternatives as Pull Request.*

## License

- `Laravel Sense` package is open-sourced software licensed under the [MIT license](LICENSE) by [Anton Komarev](https://github.com/antonkomarev/).
- `Smelling` image licensed under [Creative Commons 3.0](https://creativecommons.org/licenses/by/3.0/us/) by Gan Khoon Lay.

## About CyberCog

[CyberCog](http://www.cybercog.ru) is a Social Unity of enthusiasts. Research best solutions in product & software development is our passion.

- [Follow us on Twitter](https://twitter.com/cybercog)
- [Read our articles on Medium](https://medium.com/cybercog)

<a href="http://cybercog.ru"><img src="https://cloud.githubusercontent.com/assets/1849174/18418932/e9edb390-7860-11e6-8a43-aa3fad524664.png" alt="CyberCog"></a>
