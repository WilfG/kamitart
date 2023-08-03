<?php

class Houdini
{
    /**
     * Escape the html characters inside a given HTML element
     *
     * @param string $text The text we are trying to clean
     * @param string $element The name of the elements to be escaped
     * @param bool $fix Should we try to make the text a valid HTML by wrapping it with divs
     *
     * @return string
     */
    public static function escape($text, $element = 'code', $fix = true)
    {
        $dom = new DOMDocument;
        $dom->loadXML($fix ? '<div>' . $text . '</div>' : $text);

        $nodes = $dom->getElementsByTagName($element);
        foreach ($nodes as $node) {
            $content = '';
            foreach ($node->childNodes as $child) {
                $content .= self::escapeRecursively($child);
            }
            $node->nodeValue = htmlspecialchars($content);
        }
        return $dom->saveHTML();
    }

    /**
     * Escape node and note contents
     *
     * @param $node
     * @return string
     */
    protected static function escapeRecursively($node)
    {
        if ($node instanceof DOMText)
            return $node->textContent;

        $content = "<$node->nodeName>";
        foreach ($node->childNodes as $child) {
            $content .= self::escapeRecursively($child);
        }

        return "$content</$node->nodeName>";
    }
}
