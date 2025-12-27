<?php

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;

class AutoTranslate
{
    public function translateMany(string $text, array $targets, ?string $source = null): array
    {
        $source = $source ?: 'auto';
        $out = [];
        foreach ($targets as $lang) {
            $tr = new GoogleTranslate($lang);
            $tr->setSource($source);
            // optional tweak to avoid long hangs
            $tr->setOptions(['timeout' => 6]);
            $out[$lang] = $tr->translate($text);
        }

        return $out;
    }
}
