<?php
declare(strict_types=1);

namespace Rabbit\Nsq;

/**
 * Class IntPacker
 * @package Rabbit\Nsq
 */
class IntPacker
{
    /**
     * @param $i
     * @return string
     */
    public static function int8($i): string
    {
        return is_int($i) ? pack("c", $i) : unpack("c", $i)[1];
    }

    /**
     * @param $i
     * @return string
     */
    public static function uInt8($i): string
    {
        return is_int($i) ? pack("C", $i) : unpack("C", $i)[1];
    }

    /**
     * @param $i
     * @return string
     */
    public static function int16($i): string
    {
        return is_int($i) ? pack("s", $i) : unpack("s", $i)[1];
    }

    /**
     * @param $i
     * @param bool $endianness
     * @return string
     */
    public static function uInt16($i, $endianness = false): string
    {
        $f = is_int($i) ? "pack" : "unpack";
        if ($endianness === true) {  // big-endian
            $i = $f("n", $i);
        } else if ($endianness === false) {  // little-endian
            $i = $f("v", $i);
        } else if ($endianness === null) {  // machine byte order
            $i = $f("S", $i);
        }
        return is_array($i) ? $i[1] : $i;
    }

    /**
     * @param $i
     * @return string
     */
    public static function int32($i): string
    {
        return is_int($i) ? pack("l", $i) : unpack("l", $i)[1];
    }

    /**
     * @param $i
     * @param bool $endianness
     * @return string
     */
    public static function uInt32($i, $endianness = false): string
    {
        $f = is_int($i) ? "pack" : "unpack";
        if ($endianness === true) {  // big-endian
            $i = $f("N", $i);
        } else if ($endianness === false) {  // little-endian
            $i = $f("V", $i);
        } else if ($endianness === null) {  // machine byte order
            $i = $f("L", $i);
        }
        return is_array($i) ? $i[1] : $i;
    }

    /**
     * @param $i
     * @return string
     */
    public static function int64($i): string
    {
        return is_int($i) ? pack("q", $i) : unpack("q", $i)[1];
    }

    /**
     * @param $i
     * @param bool $endianness
     * @return string
     */
    public static function uInt64($i, $endianness = false): string
    {
        $f = is_int($i) ? "pack" : "unpack";
        if ($endianness === true) {  // big-endian
            $i = $f("J", $i);
        } else if ($endianness === false) {  // little-endian
            $i = $f("P", $i);
        } else if ($endianness === null) {  // machine byte order
            $i = $f("Q", $i);
        }
        return is_array($i) ? $i[1] : $i;
    }
}