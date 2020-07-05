<?php

use PHPViet\NumberToWords\DictionaryInterface;
use PHPViet\NumberToWords\Transformer;

if (! function_exists('transformer')) {

    /**
     * Lấy transformer instance
     *
     * @param \PHPViet\NumberToWords\DictionaryInterface $dictionary
     * @return \PHPViet\NumberToWords\Transformer
     */
    function transformer(DictionaryInterface $dictionary = null)
    {
        static $transformer;

        if ($dictionary) {
            return new Transformer($dictionary);
        }

        if (! $transformer) {
            $transformer = new Transformer();
        }

        return $transformer;
    }
}