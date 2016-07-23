# Pass Gen
A random password generator creating simple to remember passwords

[![Build Status](https://travis-ci.org/Cheezykins/PassGen.svg?branch=master)](https://travis-ci.org/Cheezykins/PassGen)
[![Code Climate](https://codeclimate.com/github/Cheezykins/PassGen/badges/gpa.svg)](https://codeclimate.com/github/Cheezykins/PassGen)
[![Test Coverage](https://codeclimate.com/github/Cheezykins/PassGen/badges/coverage.svg)](https://codeclimate.com/github/Cheezykins/PassGen/coverage)
[![StyleCI](https://styleci.io/repos/64023504/shield)](https://styleci.io/repos/64023504)

## Rationale

We train users with terrible passwords and terrible constraints. Short passwords are no good, random passwords are hard to remember and make people write them down. A nice long phrase is much simpler.

![Relevant XKCD](http://imgs.xkcd.com/comics/password_strength.png)

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
use Cheezykins\PassGen\PassGen;
$password = PassGen::Generate();
echo $password->getPlainText(); // correct-horse-battery-staple-yard-iron
echo $password->getHash(); // $2a$08$qV2WBuFjgSOY.jJssu5McOwv3s0E8DhlVb3laNbMYydEUseZhDp0i
echo $password; // $2a$08$qV2WBuFjgSOY.jJssu5McOwv3s0E8DhlVb3laNbMYydEUseZhDp0i
```
