<?php
/**
 * Created by PhpStorm.
 * User: takahashi
 * Date: 2015/05/12
 * Time: 19:05
 */

function toU8($str) {
    if (isWin()) {
        return mb_convert_encoding($str, 'UTF-8');
    }
    return $str;
}

function toSj($str) {
    if (isWin()) {
        return mb_convert_encoding($str, 'SJIS-win');
    }
    return $str;
}

function isWin() {
    return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
}