<?php

namespace CViniciusSDias\GoogleCrawler\Proxy\UrlParser;

use CViniciusSDias\GoogleCrawler\Exception\InvalidResultException;

class NoProxyGoogleUrlParser implements GoogleUrlParser
{
    /** {@inheritdoc} */
    public function parseUrl(string $googleUrl): string
    {
        $urlParts = parse_url($googleUrl);
        parse_str($urlParts['query'], $queryStringParams);

        $resultUrl = filter_var($queryStringParams['q'], FILTER_VALIDATE_URL);
        // If this is not a valid URL, so the result is (probably) an image, news or video suggestion
        if (!$resultUrl) {
            throw new InvalidResultException();
        }

        return $resultUrl;
    }
}