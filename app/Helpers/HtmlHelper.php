<?php

function clean_html_content($html)
{
    if (empty($html)) return '';
    return preg_replace([
        '/<p[^>]*>\s*&nbsp;\s*<\/p>/i',
        '/<p[^>]*>\s*<\/p>/i',
        '/(<br\s*\/?>\s*){2,}/i'
    ], '', $html);
}

if (!function_exists('social_share_links')) {
    function social_share_links($title, $description = '', $url = null)
    {
        $url = $url ?? url()->current();
        
        return [
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u='.urlencode($url).'&title='.urlencode($title),
            'twitter' => 'https://twitter.com/intent/tweet?text='.urlencode($title).'&url='.urlencode($url),
            'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url='.urlencode($url).'&title='.urlencode($title).'&summary='.urlencode($description),
            'whatsapp' => 'https://wa.me/?text='.urlencode($title.' - '.$url),
            'pinterest' => 'https://pinterest.com/pin/create/button/?url='.urlencode($url).'&description='.urlencode($title),
        ];
    }
}