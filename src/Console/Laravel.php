<?php

namespace MahdiAslami\Laravel\Lang\Console;


class Laravel
{
    public static function get($path)
    {
        return Http::withHeaders(['Accept' => 'application/vnd.github+json'])
            ->get(
                "https://api.github.com/repos/laravel/laravel/contents/$path",
            )->json();
    }
}
