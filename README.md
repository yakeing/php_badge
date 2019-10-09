<div align=center><img src="https://raw.githubusercontent.com/yakeing/php_badge/master/Subsidiary/SVG.png"/></div>

# Badge
This is an identification tag based on SVG, It can quickly generate various labels and status identifiers



### v5.0.0 New version testing

The new border mode can also customize the border color, redesign and adjust the fillet of the badge to make it look more stereoscopic, and add new functions to optimize the program code.

![Sponsor](https://oauth.applinzi.com/Test/heart/color/555555.svg)

```php
    https://oauth.applinzi.com/Test/heart/color/555555.svg
```


### Sponsors Example

[![Sponsor](https://oauth.applinzi.com/State/heart/Sponsor/EA4AAA.svg)](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)

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

![Hits](https://oauth.applinzi.com/Hits/yakeing/php_badge/image.svg)

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

![Server](https://oauth.applinzi.com/Server/yakeing/index/image.svg)

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

![error](https://oauth.applinzi.com/State/error/ERROR/ed1941.svg)
![Active](https://oauth.applinzi.com/State/rocket/Active/28a745.svg)
![PAGES](https://oauth.applinzi.com/State/github/PAGES/ea4c89.svg)
![thumb](https://oauth.applinzi.com/State/thumb/88888/636AD0.svg)
![passed](https://oauth.applinzi.com/State/passed/PASSED/44CC11.svg)

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

[![tag](https://oauth.applinzi.com/Label/tag/V4.1.0/84bf96.svg)](../.../releases)
[![license](https://oauth.applinzi.com/Label/license/MPL-2.0/FE7D37.svg)](LICENSE)
[![size](https://oauth.applinzi.com/Label/size/999KB/b36d41.svg)](../.../)
[![download](https://oauth.applinzi.com/Label/download/999M/a4a61d.svg)](../.../)

[![languages](https://oauth.applinzi.com/Label/languages/php/007EC6.svg)](../.../search?l=php)
[![watch](https://oauth.applinzi.com/Label/watch/999M/28a745.svg)](../.../deployments)
[![star](https://oauth.applinzi.com/Label/star/999M/ad8b3d.svg)](../.../stargazers)
[![fork](https://oauth.applinzi.com/Label/fork/999M/9b95c9.svg)](../.../network/members)

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

### Travis CI badge

[![Travis-ci](https://api.travis-ci.com/yakeing/php_badge.svg)](https://travis-ci.com/yakeing/php_badge)

### codecov badge

[![codecov](https://codecov.io/gh/yakeing/php_badge/branch/master/graph/badge.svg)](https://codecov.io/gh/yakeing/php_badge)

### Packagist badge

[![Version](http://img.shields.io/packagist/v/yakeing/php_badge.svg)](../.../releases)
[![Downloads](http://img.shields.io/packagist/dt/yakeing/php_badge.svg)](https://packagist.org/packages/yakeing/php_badge/dependents)

### Github badge

[![Downloads](https://img.shields.io/github/downloads/yakeing/php_badge/total.svg)](../.../)
[![Size](https://img.shields.io/github/size/yakeing/php_badge/src/Badge.php.svg)](src/Badge.php)

### Installation

Use [Composer](https://getcomposer.org) to install the library.
Of course, You can go to [Packagist](https://packagist.org/packages/yakeing/php_badge) to view.

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

[Sponsor](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)
---
If you've got value from any of the content which I have created, then I would very much appreciate your support by payment donate.

[![Sponsor](https://oauth.applinzi.com/State/heart/Sponsor/EA4AAA.svg)](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)

Author
---

weibo: [yakeing](https://weibo.com/yakeing)

twitter: [yakeing](https://twitter.com/yakeing)
