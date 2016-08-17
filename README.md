# Pass Gen
A random password generator creating XKCD style simple to remember passwords

[![Build Status](https://travis-ci.org/Cheezykins/PassGen.svg?branch=master)](https://travis-ci.org/Cheezykins/PassGen)
[![Code Climate](https://codeclimate.com/github/Cheezykins/PassGen/badges/gpa.svg)](https://codeclimate.com/github/Cheezykins/PassGen)
[![Test Coverage](https://codeclimate.com/github/Cheezykins/PassGen/badges/coverage.svg)](https://codeclimate.com/github/Cheezykins/PassGen/coverage)
[![StyleCI](https://styleci.io/repos/64023504/shield)](https://styleci.io/repos/64023504)
[![Latest Stable Version](https://poser.pugx.org/cheezykins/passgen/v/stable)](https://packagist.org/packages/cheezykins/passgen)
[![License](https://poser.pugx.org/cheezykins/passgen/license)](https://packagist.org/packages/cheezykins/passgen)
[![Total Downloads](https://poser.pugx.org/cheezykins/passgen/downloads)](https://packagist.org/packages/cheezykins/passgen)

## Rationale

We train users with terrible passwords and [terrible constraints](https://www.troyhunt.com/security-insanity-how-we-keep-failing-at-the-basics/), random passwords are hard to remember and make people write them down, [short passwords are no good](https://blog.codinghorror.com/your-password-is-too-damn-short/). A nice long phrase they can remember is much better.

[![Relevant XKCD](http://imgs.xkcd.com/comics/password_strength.png)](https://www.xkcd.com)

## Install

Install using composer.

```
composer require cheezykins/passgen
```

## Usage

Usage is very simple.

```php
<?php
// Import and use
use Cheezykins\PassGen\Generator;
$generator = new Generator();
$password = $generator->generate();
echo $password->getPlainText(); // correct-horse-battery-staple-yard-iron
echo $password->getHash(); // $2a$08$qV2WBuFjgSOY.jJssu5McOwv3s0E8DhlVb3laNbMYydEUseZhDp0i
echo $password; // $2a$08$qV2WBuFjgSOY.jJssu5McOwv3s0E8DhlVb3laNbMYydEUseZhDp0i
```

Or you can generate a list of passwords.

```php
<?php
use Cheezykins\PassGen\Generator;
$generator = new Generator();
$passwords = $generator->bulkGenerate(20);
foreach ($passwords as $password)
{
    echo $password->getPlainText();
}
// -- Outputs list of 20 passwords.
```

## Laravel

A laravel service provider is also included, as well as a facade.

To use this, in your laravel app open up `config/app.php` and add the Service Provider to the providers list and Facade to the aliases list.

```
Cheezykins\PassGen\Vendor\Laravel\ServiceProvider::class
'PassGen' => Cheezykins\PassGen\Vendor\Laravel\Facade::class 
```

You can then access the facade using `PassGen::generate();`
