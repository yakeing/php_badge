<div align=center><img src="https://images.gitee.com/uploads/images/2019/0918/004104_315688cf_5313489.png"/></div>

# Badge
This is an identification tag based on SVG, It can quickly generate various labels and status identifiers

### Sponsor Example

[![Sponsor](https://oauth.applinzi.com/State/heart/Sponsor/EA4AAA.svg)](https://yakeing.tk/sponsors/)

```php
    $Badge->Icon = file_get_contents({LOGO}); //<path d="M23....." fill="#FFF"></path>
    array(
     array({MESSAGE},{COLOR})
    );
    
    //test example
    //https://oauth.applinzi.com/State/heart/Sponsor/EA4AAA.svg
```

---

### Hits Example

[![Hits](https://oauth.applinzi.com/Hits/yakeing/php_badge/image.svg)](https://github.com/yakeing/php_badge)

```php
    //https://example.com/Hits/{USERNAME}/{PROJECT}/image.svg
    
    ++$count;
    array(
     array('hits','555555'),
     array($count,'4C1')
    );
    
    //test example
    //https://oauth.applinzi.com/Hits/yakeing/php_badge/image.svg
```

---

### Server Example

[![Server](https://oauth.applinzi.com/Server/yakeing/index/image.svg)](https://github.com/yakeing/php_badge)

```php
    //https://example.com/Server/{USERNAME}/{PROJECT}/image.svg
    
    array(
     array('{OS}','555555'),
     array('CPU: {CPU}','A0ABFC'),
     array('RAM: {RAM}','F0A010')
    );
    
    //test example
    //https://oauth.applinzi.com/Server/yakeing/index/image.svg
    
```

---

### State Example

[![error](https://oauth.applinzi.com/State/error/ERROR/ed1941.svg)](https://github.com/yakeing/php_badge)
[![Pages](https://oauth.applinzi.com/State/rocket/Pages/28a745.svg)](https://github.com/yakeing/php_badge)
[![watch](https://oauth.applinzi.com/State/watch/Watch/ea4c89.svg)](https://github.com/yakeing/php_badge)
[![thumb](https://oauth.applinzi.com/State/thumb/88888/636AD0.svg)](https://github.com/yakeing/php_badge)
[![passed](https://oauth.applinzi.com/State/passed/PASSED/44CC11.svg)](https://github.com/yakeing/php_badge)

```php
    //https://example.com/Label/{LOGO}/{MESSAGE}/{COLOR}.svg
    
    //get logo file
    $Badge->Icon = file_get_contents({LOGO}); //<path d="M23....." fill="#FFF"></path>
    $Badge->viewBox = '-120 -85 1200 1200'; //Svg Icon x, y, Width, Height
    $Badge->opacity = 0.7; //transparency (0 - 1)
    
    array(
     array({MESSAGE},{COLOR})
    );
    
    //test example
    //https://oauth.applinzi.com/State/passed/PASSED/44CC11.svg
```

---

### Label Example

[![tag](https://oauth.applinzi.com/Label/tag/V4.1.0/84bf96.svg)](https://github.com/yakeing/php_badge/releases)
[![license](https://oauth.applinzi.com/Label/license/MPL-2.0/FE7D37.svg)](https://github.com/yakeing/php_badge/blob/master/LICENSE)
[![languages](https://oauth.applinzi.com/Label/languages/php/007EC6.svg)](https://github.com/yakeing/php_badge/search?l=php)
[![star](https://oauth.applinzi.com/Label/star/999M/ad8b3d.svg)](https://github.com/yakeing/php_badge/stargazers)
[![fork](https://oauth.applinzi.com/Label/fork/999M/9b95c9.svg)](https://github.com/yakeing/php_badge/network/members)
[![github](https://oauth.applinzi.com/Label/github/Active/28a745.svg)](https://github.com/yakeing/php_badge/deployments)

```php
    //https://example.com/Label/{LABEL}/{MESSAGE}/{COLOR}.svg
    
    $Badge->Icon = file_get_contents({LOGO}); //<path d="M23....." fill="#FFF"></path>
    array(
     array({LABEL},'555555'),
     array({MESSAGE},{COLOR})
    );
    
    //test example
    //https://oauth.applinzi.com/Label/license/MPL-2.0/FE7D37.svg
```

---

### Travis CI

[![Travis-ci](https://api.travis-ci.org/yakeing/php_badge.svg)](https://travis-ci.org/yakeing/php_badge)

### codecov

[![codecov](https://codecov.io/gh/yakeing/php_badge/branch/master/graph/badge.svg)](https://codecov.io/gh/yakeing/php_badge)

### Packagist

[![Version](http://img.shields.io/packagist/v/yakeing/php_badge.svg)](https://github.com/yakeing/php_badge/releases)
[![Downloads](http://img.shields.io/packagist/dt/yakeing/php_badge.svg)](https://packagist.org/packages/yakeing/php_badge)

### Github

[![Downloads](https://img.shields.io/github/downloads/yakeing/php_badge/total.svg)](https://github.com/yakeing/php_badge)
[![Size](https://img.shields.io/github/size/yakeing/php_badge/src/Badge.php.svg)](https://github.com/yakeing/php_badge/blob/master/src/Badge.php)

### Installation

Use [Composer](https://getcomposer.org) to install the library.

```shell
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

 ![Bitcoin](https://images.gitee.com/uploads/images/2019/0918/004104_0b15a590_5313489.png)

 WeChat

 ![WeChat](https://images.gitee.com/uploads/images/2019/0918/004058_3a2715bd_5313489.png)

 Alipay

 ![Alipay](https://raw.githubusercontent.com/yakeing/Content/master/Donate/Alipay.png)

Author
---

weibo: [yakeing](https://weibo.com/yakeing)

twitter: [yakeing](https://twitter.com/yakeing)
