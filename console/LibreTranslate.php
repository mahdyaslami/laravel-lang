<?php

namespace Console;

class LibreTranslate
{
    const MAX_LENGTH = 2000;

    private function __construct(
        public readonly string $source = 'en',
        public readonly string $target = 'fa',
    ) {
        //
    }

    public static function translate(string $content, $source = 'en', $target = 'fa')
    {
        $instance = new LibreTranslate($source, $target);

        return  $instance->request($content)->json()['translatedText'];
    }

    private function request($content)
    {
        return Http::withHeaders([
            'authority' => 'libretranslate.com',
            'accept' => '*/*',
            'accept-language' => 'en-US,en;q=0.9,fa;q=0.8,sk;q=0.7',
            'cache-control' => 'no-cache',
            'content-type' => 'application/json',
            'origin' => 'https://libretranslate.com',
            'pragma' => 'no-cache',
            'referer' => 'https://libretranslate.com/',
            'sec-ch-ua' => '"Chromium";v="106", "Google Chrome";v="106", "Not;A=Brand";v="99"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Linux"',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'same-origin',
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
        ])
            ->post(
                'https://libretranslate.com/translate',
                [
                    'q' => $content,
                    'source' => $this->source,
                    'target' => $this->target,
                    'format' => 'text',
                    'api_key' => ''
                ]
            );
    }
}
