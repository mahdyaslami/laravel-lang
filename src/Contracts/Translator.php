<?php

namespace MahdiAslami\Laravel\Lang\Contracts;

interface Translator
{
    public function translate(string $text, string $source, string $target): string;
}
