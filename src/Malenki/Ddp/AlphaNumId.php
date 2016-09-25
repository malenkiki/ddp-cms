<?php
/*
 * Copyright (c) 2016 Michel Petit <petit.michel@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */


namespace Malenki\Ddp\Model;

class AlphaNumId 
{
    protected static $ids = array();
    protected static $output_base = '';

    protected $id = null;


    protected function id()
    {
        return preg_replace(
            '/[^0-9]/', 
            '',
            implode(
                '', 
                array_reverse(explode(' ', microtime()))
            )
        );
    }


    protected static function outputBase()
    {
        if (empty(self::$output_base)) {
            self::$output_base = implode('', array_merge(
                range(0, 9),
                range('A', 'Z'),
                range('a', 'z')
            ));
        }

        return self::$output_base;
    }

    protected static function base($number)
    {
        $toBaseInput = self::outputBase();

        $toBase = str_split($toBaseInput);
        
        $toLen = count($toBase);
        
        if ($number < $toLen) {
            return $toBase[$number];
        }

        $out = '';

        while ($number != '0') {
            $out = $toBase[bcmod($number, $toLen)] . $out;
            $number = bcdiv($number, $toLen, 0);
        }

        return $out;
    }

    public static function addExisting($id)
    {
        self::$ids[] = $id;
    }

    public function __construct()
    {
        $id = self::base($this->id());

        while (in_array($id, self::$ids)) {
            $id = self::base($this->id());
        }

        $this->id = $id;
        self::$ids[] = $id;
    }

    public function __toString()
    {
        return $this->id;
    }
}
