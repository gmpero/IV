<?php

$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;


class Text
{
    private $resultDocument;
    private $isLimit = false;
    private $wordCount = 0;
    private $limitWords;

    public function __construct($limitWords)
    {
        $this->resultDocument = new DOMDocument();
        $this->limitWords = $limitWords;
    }

    public function getShortText($node)
    {
        $this->isProcess($node, $this->resultDocument);
        return $this->resultDocument->saveHTML();
    }


    private function isProcess($node, $newParent)
    {
        foreach ($node->childNodes as $childNode) {
            if ($this->isLimit) {
                return;
            }

            if ($childNode->nodeType === XML_ELEMENT_NODE) {
                if (strtolower($childNode->nodeName) === 'img') {
                    continue;
                }

                $newElement = $this->resultDocument->createElement($childNode->nodeName);
                foreach ($childNode->attributes as $attr) {
                    $newElement->setAttribute($attr->nodeName, $attr->nodeValue);
                }

                $newParent->appendChild($newElement);
                $this->isProcess($childNode, $newElement);
            } elseif ($childNode->nodeType === XML_TEXT_NODE) {
                $text = trim($childNode->nodeValue);
                $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
                $words = array_filter($words, function ($word) {
                    return $word !== '.' && $word !== '-';
                });

                if ($this->wordCount + count($words) > $this->limitWords) {
                    $words = array_slice($words, 0, $this->limitWords - $this->wordCount);
                    $words[count($words) - 1] .= '...';
                    $this->isLimit = true;
                }

                $newText = ' ' . implode(' ', $words);
                $newTextNode = $this->resultDocument->createTextNode($newText);
                $newParent->appendChild($newTextNode);

                $this->wordCount += count($words);
            }

        }
    }


}

$shortText = new Text(28);

$dom = new DOMDocument();
$dom->loadHTML(mb_convert_encoding($text, 'HTML-ENTITIES', 'UTF-8'));
$node = $dom->documentElement;
$shortHtml = $shortText->getShortText($node);

// Выводим результат на нужной нам странице
//echo $shortHtml;



