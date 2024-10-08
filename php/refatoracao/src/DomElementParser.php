<?php

namespace CViniciusSDias\GoogleCrawler;

use CViniciusSDias\GoogleCrawler\Exception\InvalidResultException;
use CViniciusSDias\GoogleCrawler\Proxy\GoogleProxyAbstractFactory;
use CViniciusSDias\GoogleCrawler\Proxy\NoProxyAbstractFactory;
use CViniciusSDias\GoogleCrawler\Proxy\UrlParser\GoogleUrlParser;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\DomCrawler\Link;
use Yitznewton\Maybe\Maybe;

class DomElementParser
{
    private $urlParser;

    public function __construct(GoogleUrlParser $urlParser = null)
    {
        $this->urlParser = $urlParser;
    }

    public function parse(\DOMElement $resultDomElement): Maybe
    {
        $resultCrawler = new Crawler($resultDomElement);
        $linkElement = $resultCrawler->filterXPath('//a')->getNode(0);
        if (is_null($linkElement)) {
            return new Maybe(null);
        }

        $resultLink = new Link($linkElement, 'http://google.com/');
        $descriptionElement = $resultCrawler->filterXPath('//div[@class="BNeawe s3v9rd AP7Wnd"]//div[@class="BNeawe s3v9rd AP7Wnd"]')->getNode(0);

        if (is_null($descriptionElement)) {
            return new Maybe(null);
        }

        $isImageSuggestion = $resultCrawler->filterXpath('//img')->count() > 0;
        if ($isImageSuggestion) {
            return new Maybe(null);
        }

        if (strpos($resultLink->getUri(), 'http://google.com') === false) {
            return new Maybe(null);
        }

        return new Maybe($this->createResult($resultLink, $descriptionElement));
    }

    /**
     * If $resultLink is a valid link, this method assembles the Result and adds it to $googleResults
     *
     * @param Link $resultLink
     * @param DOMElement $descriptionElement
     * @return Result
     * @throws InvalidResultException
     */
    private function createResult(Link $resultLink, \DOMElement $descriptionElement): Result
    {
        $description = $descriptionElement->nodeValue
            ?? 'A description for this result isn\'t available due to the robots.txt file.';

        $googleResult = new Result();
        $googleResult
            ->setTitle($resultLink->getNode()->nodeValue)
            ->setUrl($this->urlParser->parseUrl($resultLink->getUri()))
            ->setDescription($description);

        return $googleResult;
    }
}