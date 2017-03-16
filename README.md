# IP Range Checker

This is a simple helper package that I use when I need to check if an IP is in a given IP range.
-

All ideas, contributions and criticism are welcome.

# Installation

```bash
composer require ilkermutlu/ip-range-checker
````

# Usage

Import the facade in your script:

    use IlkerMutlu\IPRangeChecker\Checker;

    $ip = '192.168.0.22';
    $checker = Ilkermutlu\IPRangeChecker\Checker::forIp($ip);

Pass the start IP and end IP in an array to the ```setRange()``` method.

    $checker->setRange([
        '192.168.0.1',
        '192.168.0.255'
    ]);

You can also use a wildcard.

    $checker->setRange('192.168.0.*');

After setting the range, just call the ```check()``` method on the checker instance, which will return a boolean value.

## TODO

1. Tests
2. Support CIDR
