# Blade Directive Helpers

Blade syntax for frequently used Laravel helpers, such as `route`, `asset`, `url` and so on.

## Installation

To install the package, simply follow the steps below.

Install the package using Composer:

```
$ composer require octopyid/blade-directive
```

## Usage
Just add `@` at the beginning of the helper keyword. For example, you often use syntax like this `{{ route('foo.bar') }}` with this package you can just write `@route('foo.bar')`


| HELPER | COMMON USAGE           | PACKAGE USAGE     |
|--------|------------------------|-------------------|
| url    | {{ url('foo') }}       | @url('foo')       |
| asset  | {{ asset('foo') }}     | @asset('foo')     |
| route  | {{ route('foo', []) }} | @route('foo', []) |

## Security

If you discover any security related issues, please email [supianidz@gmail.com](mailto:supianidz@gmail.com) or [me@octopy.id](mailto:me@octopy.id) instead of using the issue
tracker.

## Credits

- [Supian M](https://github.com/SupianIDz)
- [Octopy ID](https://github.com/OctopyID)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
