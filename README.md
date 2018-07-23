[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jamseyp/container/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jamseyp/container/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/jamseyp/container/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jamseyp/container/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/jamseyp/container/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jamseyp/container/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/jamseyp/container/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Specter Container.

A simple implmentation of a PSR-11 Container.

Usage:

```php
$container = new Container();

$container->set('foo',new DateTime());

if($container->has('foo'){
    $today = $container->get('foo')
}
```