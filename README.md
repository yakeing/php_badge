# Badge
This is an identification tag based on SVG, It can quickly generate various labels and status identifiers.



### v5.0.0 New version testing

The new border mode can also customize the border color, redesign and adjust the fillet of the badge to make it look more stereoscopic, and add new functions to optimize the program code.

![Sponsor](https://badging.now.sh/static/Color/555/Red/F00/Orange/FF7F50/Yellow/ffd400/Green/4C1/Cyan/00d6b9/Blue/a0abfc/Violet/d800d8?icon=color&stroke=555)

test example:
```php
    https://badging.now.sh
```


### Sponsors Example

[![Heart](https://badging.tk/static/Heart/EA4AAA?icon=heart)](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)
[![Sponsor](https://badging.tk/static/Sponsor/EA4AAA?icon=sponsor)](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)

```php
    $Badge->Icon = file_get_contents({LOGO}); //<path d="M23....." fill="#FFF"></path>
    array(
     array({MESSAGE},{COLOR})
    );
```

---

### Hits Example

![Hits](https://badging.tk/static/hits/555/888W/4c1)

```php
    //https://example.com/Hits/{USERNAME}/{PROJECT}/image.svg
    
    ++$count;
    array(
     array('hits','555555'),
     array($count,'4C1')
    );
```

---

### Server Example

![Server](https://badging.tk/static/Linux%20X86_64/555/CPU:20%25/A0ABFC/RAM:15%25/F0A010?icon=linux)

```php
    //https://example.com/Server/{USERNAME}/{PROJECT}/image.svg
    
    array(
     array('{OS}','555555'),
     array('CPU: {CPU}','A0ABFC'),
     array('RAM: {RAM}','F0A010')
    );    
```

---

### State Example

![error](https://badging.tk/static/ERROR/ed1941?icon=error)
![Active](https://badging.tk/static/Active/28a745?icon=rocket)
![PAGES](https://badging.tk/static/PAGES/ea4c89?icon=github)
![thumb](https://badging.tk/static/888W/636AD0?icon=thumb)
![passed](https://badging.tk/static/PASSED/44CC11?icon=passed)

```php
    //https://example.com/Label/{LOGO}/{MESSAGE}/{COLOR}.svg
    
    //get logo file
    $Badge->Icon = file_get_contents({LOGO}); //<path d="M23....." fill="#FFF"></path>
    $Badge->viewBox = '-120 -85 1200 1200'; //Svg Icon x, y, Width, Height
    $Badge->opacity = 0.7; //transparency (0 - 1)
    
    array(
     array({MESSAGE},{COLOR})
    );
```

---

### Label Example

[![tag](https://badging.tk/static/tag/555/V4.1.0/84bf96?icon=tag)](../../releases)
[![license](https://badging.tk/static/license/555/MPL-2.0/FE7D37?icon=license)](LICENSE)
[![size](https://badging.tk/static/size/555/999KB/b36d41?icon=size)](src/Badge.php/)
[![download](https://badging.tk/static/download/555/999M/a4a61d?icon=download)](../../)

[![languages](https://badging.tk/static/language/555/php/007EC6?icon=language)](../../search?l=php)
[![watch](https://badging.tk/static/watch/555/999M/28a745?icon=watch)](../../watchers)
[![star](https://badging.tk/static/star/555/999M/ad8b3d?icon=star)](../../stargazers)
[![fork](https://badging.tk/static/fork/555/999M/9b95c9?icon=fork)](../../network/members)

```php
    //https://example.com/Label/{LABEL}/{MESSAGE}/{COLOR}.svg
    
    $Badge->Icon = file_get_contents({LOGO}); //<path d="M23....." fill="#FFF"></path>
    array(
     array({LABEL},'555555'),
     array({MESSAGE},{COLOR})
    );
```

---

### Travis CI badge

[![Travis-ci](https://api.travis-ci.com/yakeing/php_badge.svg?branch=main)](https://travis-ci.com/yakeing/php_badge)

### codecov badge

[![codecov](https://codecov.io/gh/yakeing/php_badge/branch/main/graph/badge.svg)](https://codecov.io/gh/yakeing/php_badge)

### Packagist badge

[![Version](http://img.shields.io/packagist/v/yakeing/php_badge.svg)](../../releases)
[![Downloads](http://img.shields.io/packagist/dt/yakeing/php_badge.svg)](https://packagist.org/packages/yakeing/php_badge/stats)

### Github badge

[![Downloads](https://badging.tk/github/downloads/yakeing/php_badge?icon=github)](../../)
[![Size](https://badging.tk/github/size/yakeing/php_badge?icon=github)](src)

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

[![Sponsor](https://badging.tk/static/Sponsor/EA4AAA?icon=heart)](https://github.com/yakeing/Documentation/blob/master/Sponsor/README.md)

Author
---

weibo: [yakeing](https://weibo.com/yakeing)

twitter: [yakeing](https://twitter.com/yakeing)
