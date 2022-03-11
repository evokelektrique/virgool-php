## Overview

Simple and easy to use library to work with Virgool.

## What is virgool?

 ویرگول یک بستر خصوصی انتشار محتوا (Microblog) است.

## Installation

Simply by running the `composer require evokelektrique/virgool` in your project folder.

## Usage
```php
require_once __DIR__ . "/../vendor/autoload.php";

use Virgoolio\Virgool;

$username = "virgool";
$virgool = new Virgool($username);
$posts = $virgool->get_posts();

var_dump($posts);
// array(10) {
//   [0]=>
//   array(4) {
//     ["title"]=>
//     string(55) "آدرس انتشارات خود را شخصی کنید"
//     ["summary"]=>
//     string(100) "آدرس انتشارات خود در ویرگول را به دامنه‌تان تغییر دهید"
//     ["metadata"]=>
//     array(2) {
//       [0]=>
//       string(16) "۴ ماه پیش"
//       [1]=>
//       string(26) "خواندن ۱ دقیقه"
//     }
//     ["image"]=>
//     array(1) {
//       [0]=>
//       string(75) "https://files.virgool.io/upload/users/1/posts/nxh2n2v7u5qq/ducrhc6h5jsy.gif"
//     }
//   }
// ...
```

## Dependencies

- [Goutte](https://github.com/FriendsOfPHP/Goutte)

## Credits

- [EVOKE](https://github.com/evokelektrique) - Developer
