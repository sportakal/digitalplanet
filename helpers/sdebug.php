<?php

function sdebug($data, $die = true)
{
    Sage::$theme = Sage::THEME_SOLARIZED_DARK;
    sage($data);
    if ($die) return die();
    return true;
}
