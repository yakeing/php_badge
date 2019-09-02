
[![Downloads](https://img.shields.io/github/downloads/yakeing/php_badge/total.svg)](https://github.com/yakeing/php_badge)
[![Size](https://img.shields.io/github/size/yakeing/php_badge/src/Badge.php.svg)](https://github.com/yakeing/php_badge/blob/master/src/Badge.php)
[![tag](https://img.shields.io/github/tag/yakeing/php_badge.svg)](https://github.com/yakeing/php_badge/releases)
[![Language](https://img.shields.io/github/license/yakeing/php_badge.svg)](https://github.com/yakeing/php_badge/blob/master/LICENSE)
[![Php](https://img.shields.io/github/languages/top/yakeing/php_badge.svg)](https://github.com/yakeing/php_badge)


# Badge
This is an identification tag based on SVG, It can quickly generate various labels and status identifiers

### Travis CI

[![Travis-ci](https://api.travis-ci.org/yakeing/php_badge.svg)](https://travis-ci.org/yakeing/php_badge)

### codecov

[![codecov](https://codecov.io/gh/yakeing/php_badge/branch/master/graph/badge.svg)](https://codecov.io/gh/yakeing/php_badge)

### Packagist

[![Version](http://img.shields.io/packagist/v/yakeing/php_badge.svg)](https://github.com/yakeing/php_badge/releases)
[![Downloads](http://img.shields.io/packagist/dt/yakeing/php_badge.svg)](https://packagist.org/packages/yakeing/php_badge)

### Installation

Use [Composer](https://getcomposer.org) to install the library.

```
    $ composer require yakeing/php_badge
```

### Initialization parameter

- [x] Sample：
```php

    $arr = array(
        array('build', '555'), //#555555
        array('passing', '4c1'), //#44CC11
        ..........
    );

    $Badge = new Badge();
    $Badge->svg($arr);

```

Donate
---
If you've got value from any of the content which I have created, then I would very much appreciate your support by payment donate.

 [Bitcoin](https://btc.com/1FYbZECgs3V3zRx6P7yAu2nCDXP2DHpwt8)

 1FYbZECgs3V3zRx6P7yAu2nCDXP2DHpwt8

 ![Bitcoin](https://raw.githubusercontent.com/yakeing/Content/master/Donate/Bitcoin.png)

 WeChat

 ![WeChat](https://raw.githubusercontent.com/yakeing/Content/master/Donate/WeChat.png)

 Alipay

 ![Alipay](https://raw.githubusercontent.com/yakeing/Content/master/Donate/Alipay.png)

Author
---

weibo: [yakeing](https://weibo.com/yakeing)

twitter: [yakeing](https://twitter.com/yakeing)
