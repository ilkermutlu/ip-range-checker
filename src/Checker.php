<?php

namespace Ilkermutlu\IPRangeChecker;

use Ilkermutlu\IPRangeChecker\Range;
use Ilkermutlu\IPRangeChecker\IPAddress;

class Checker
{
    protected $ipAddress;

    protected $range;

    public function __construct($ipAddress)
    {
        $this->ipAddress = IPAddress::fromIPString($ipAddress);
    }

    public static function forIp($ipAddress)
    {
        return new Checker($ipAddress);
    }

    public function setRange($range)
    {
        if (is_array($range)) {
            $start = IPAddress::fromIPString($range[0]);
            $end   = IPAddress::fromIPString($range[1]);
        } else if (strpos($range, '-')) {
            $ranges = explode('-', $range);
            $start = IPAddress::fromIPString($ranges[0]);
            $end   = IPAddress::fromIPString($ranges[1]);
        } else {
            $start = IPAddress::fromIPString(str_replace('*', '0', $range));
            $end   = IPAddress::fromIPString(str_replace('*', '255', $range));
        }
        $this->range = Range::fromIPs($start, $end);
    }

    public function check()
    {
        return $this->range->inRange($this->ipAddress);
    }
}
