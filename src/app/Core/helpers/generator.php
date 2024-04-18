<?php


if (! function_exists('generate_code')) {
    function generate_code(int $length = 6): int
    {
        return rand(
            pow(10, $length - 1) - 1,
            pow(10, $length) - 1,
        );
    }
}
