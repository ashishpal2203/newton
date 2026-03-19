<?php

use App\Models\ContentBlock;
use Illuminate\Support\Facades\Cache;

if (!function_exists('content')) {
    /**
     * Retrieve a dynamic content block value.
     */
    function content($page, $key, $default = '')
    {
        // Use a shorter name for cache key
        $cacheKey = "cb_{$page}";
        
        $blocks = Cache::remember($cacheKey, 3600, function () use ($page) {
            $data = ContentBlock::where('page_name', $page)->get();
            $map = [];
            foreach ($data as $block) {
                $map[$block->key] = $block->value;
            }
            return $map;
        });

        return $blocks[$key] ?? $default;
    }
}
