<?php

/*
 * The MIT License
 *
 * Copyright 2014 Waaghals.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace ForsakenIvoryCoffin\Parsers\DocumentParsers;

use ForsakenIvoryCoffin\Parsers\DocumentParserInterface;
use ForsakenIvoryCoffin\Parsers\ElementParserInterface;

/**
 * Parse a XML file using DOM
 *
 * @author Patrick
 */
class DomParser implements DocumentParserInterface
{

    /**
     *
     * @var \DOMDocument
     */
    private $parser;

    /**
     *
     * @var ElementParserInterface
     */
    private $elementParser;

    /**
     * Set the parser to a DOMDocument parser
     */
    public function __construct()
    {
        $this->parser                     = new \DOMDocument();
        $this->parser->preserveWhiteSpace = false;
    }

    /**
     * Parse a xml document
     *
     * @throws \Exception When no parser has been set
     */
    public function parse()
    {
        if (is_null($this->elementParser)) {
            throw new \Exception("No element parsers has been set.");
        }

        $rootNode = $this->parser->documentElement;
        $this->processNode($rootNode);
    }

    /**
     * Set the ElementParser responsible for parsing elements
     *
     * @param \ForsakenIvoryCoffin\Parsers\ElementParserInterface $elementParser
     */
    public function setElementParser(ElementParserInterface $elementParser)
    {
        $this->elementParser = $elementParser;
    }

    /**
     * Set the file path for the file that needs to be parsed
     *
     * @param string $filePath
     * @throws \Exception When file could not be opened.
     */
    public function setFile($filePath)
    {
        if (!$this->parser->load($filePath)) {
            $msg = sprintf("Could not open file: %s", $this->filepath);
            throw new \Exception($msg);
        }
    }

    /**
     * Parse a node content, if the node has children parse their content recursivly
     *
     * @param \DOMNode $node
     */
    private function processNode(\DOMNode $node)
    {
        //Attributes is Traversable, but needs to be a array.
        //Convert it to an array if it has any values.
        $attributes = array();
        if (count($node->attributes) > 0) {
            $attributes = iterator_to_array($node->attributes);
        }

        $this->callStart($node, $attributes);

        if ($node->hasChildNodes()) {

            //Parse the children as well
            foreach ($node->childNodes as $childNode) {
                $this->processNode($childNode);
            }
        }

        if ($node->nodeType == XML_TEXT_NODE) {
            $this->elementParser->parseContent($node->textContent);
        }

        $this->callEnd($node);
    }

    private function callStart(\DOMNode $node, array $attributes)
    {
        //Don't parse special case nodes like #comment and #text
        if ($node->nodeType != XML_COMMENT_NODE && $node->nodeType != XML_TEXT_NODE) {
            $this->elementParser->parseStart($node->nodeName, $attributes);
        }
    }

    private function callEnd(\DOMNode $node)
    {
        //Don't parse special case nodes like #comment and #text
        if ($node->nodeType != XML_COMMENT_NODE && $node->nodeType != XML_TEXT_NODE) {
            $this->elementParser->parseEnd($node->nodeName);
        }
    }

}
