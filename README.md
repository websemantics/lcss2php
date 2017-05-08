```
                                       ╭────────▞────────╮                                   
                                       │                 │                                   
                                       │   ╭─────────╮   │                                   
                                       │   │         │   │                                   
        ┬  ╭─╮╭─╮╭─╮    ╭─╮╭─╮╭─╮╭─╮   ┃   │   ░ ░░░ │   ┃ ┬╭─╮    ╭─╮┬ ┬╭─╮    ╭─╮┬ ┬╭─╮ 
        │  ├┤ ╰─╮╰─╮    ╰─╮│  ╰─╮╰─╮   ┃   │   ░░░░░ │   ┃─┤├─╯    ├─╯├─┤├─╯    ├─╯├─┤├─╯    
        ┴─╯╰─╯╰─╯╰─╯    ╰─╯╰─╯╰─╯╰─╯   ┃   ╰─────────╯   ┃ ┴┴      ┴  ┴ ┴┴      ┴  ┴ ┴┴             
    ╭──────────────────────────────────┤                 ├──────────────────────────────────╮     
    │  ◯   ◯   ◯   ◯   ◯   ◯   ◯   ◯   │   ▯ ▯ ▯ ▯ ▯ ▯   │  ◯   ◯   ◯   ◯   ◯   ◯   ◯   ◯   │   
    ╰──┬┬─────┬┬─────┬┬─────┬┬─────┬┬──┤                 ├───┬┬─────┬┬─────┬┬─────┬┬─────┬┬─╯     
       ││     ││     ││     ││     ││  │      ╭───╮      │   ││     ││     ││     ││     ││        
    ───┤├─────┤├─────┤├─────┤├─────┤├──┤      │───│      ├───┤├─────┤├─────┤├─────┤├─────┤├────
      ─┴┴ ─   ┴┴    ─┴┴   ─ ┴┴─   ─┴┴  │      │   │      │   ┴┴ ─  ─┴┴─    ┴┴─   ─┴┴   ─ ┴┴─       
                                       ╰──────╯   ╰──────╯                                   
```
> A straightforward library that extracts variable declarations from multiple `Less` / `Scss` sources and returns a `PHP` associative array.

## Install
 
1- Use `Composer` to install as follows, 

```bash
composer require websemantics/lcss2php
```

## Getting Started

Pass a list of files (`Less`, `Scss` or a mix ) to a newly created instance of `Lcss2php` class. Get a list of all the variables using the `all` method.

```php
$files = ['/usr/etc/variables.less', '/usr/etc/_variables.scss'];

$lcss2php = new Lcss2php($files);

$variables = $lcss2php->all();
```

By default all variable types are returned, for example, `Color`, `Dimension`, etc. You can use the `ignore` function to filter some types from the final variables list,

```php
$variables = (new Lcss2php($files))->ignore(['Color', 'Dimension'])->all();
```
Notice that, there are two different variable types for each lanaguage (`Less`, `Scss`). For a list of all the types, check class `Type` at `lcss2php/src/Node/Type.php`.

## Example

Quick run of what to expect; take this `Scss` example code,

```sass
$green: #24ce7b !default;
$blue: #38b5e6 !default;
$orange: #f48714 !default;
$red: #f6303e !default;

$brand-success: $green;
$brand-info: $blue;
$brand-warning: $orange;
$brand-danger: $red;

$spacer: 1rem !default;
$spacer-x: $spacer !default;
$spacer-y: $spacer !default;
```

Will be converted to, 

```php
[
  "green" => "#24ce7b"
  "blue" => "#38b5e6"
  "orange" => "#f48714"
  "red" => "#f6303e"
  "brand-success" => "#24ce7b"
  "brand-info" => "#38b5e6"
  "brand-warning" => "#f48714"
  "brand-danger" => "#f6303e"
  "spacer" => "1rem"
  "spacer-x" => "1rem"
  "spacer-y" => "1rem"
]
```

## Support

Star :star: this repository if you find this project useful, to show support or simply, for being awesome :) 

Need help or have a question? post at [StackOverflow](https://stackoverflow.com/questions/tagged/lcss2php websemantics).

*Please don't use the issue trackers for support/questions.*

## Contribution

Contributions to this project are accepted in the form of feedback, bugs reports and even better - pull requests.

## Open Source

These project have been used in the making of this project, thanks you!

- [SCSS Compiler](https://github.com/oyejorge/less.php), SCSS compiler written in PHP.
- [LESS Compiler](https://github.com/leafo/scssphp), Less.js ported to PHP.

## License

[MIT license](http://opensource.org/licenses/mit-license.php)
Copyright (c) Web Semantics, Inc.
