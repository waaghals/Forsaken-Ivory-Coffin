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
 * Parse a XML file using SAX
 *
 * @author Patrick
 */
class SaxParser implements DocumentParserInterface
{

    const BLOCK_SIZE = 4096;

    /**
     *
     * @var resource
     */
    private $parser;

    /**
     *
     * @var ElementParserInterface
     */
    private $elementParser;

    /**
     *
     * @var string
     */
    private $filepath;

    /**
     * Constructor sets the xml_parser object
     */
    public function __construct()
    {
        $this->parser = xml_parser_create();
        xml_parser_set_option($this->parser, XML_OPTION_SKIP_WHITE, true);
        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
    }

    /**
     * Parse the xml file
     *
     * @throws \Exception When the file could not be opened or a parser error occured.
     */
    public function parse()
    {
        if (!($fp = fopen($this->filepath, 'r'))) {
            $msg = sprintf("Could not open file: %s", $this->filepath);
            throw new \Exception($msg);
        }

        while ($data = fread($fp, self::BLOCK_SIZE)) {
            if (!xml_parse($this->parser, $data, feof($fp))) {

                //Could not parse, throw exception
                $errorString = xml_error_string($this->parser);
                $lineNumber  = xml_get_current_line_number($this->parser);
                $msg         = "Parse error: %s at line %s";
                throw new \Exception(sprintf($msg, $errorString, $lineNumber));
            }
        }
        fclose($fp);
    }

    /**
     *
     * @param string $filePath
     */
    public function setFile($filePath)
    {
        $this->filepath = $filePath;
    }

    /**
     *
     * @param \ForsakenIvoryCoffin\Parsers\ElementParserInterface $elementParser
     */
    public function setElementParser(ElementParserInterface $elementParser)
    {
        $this->elementParser = $elementParser;
        $startCallable       = array($this, 'callStart');
        $endCallable         = array($this, 'callEnd');
        $dataCallable        = array($this, 'callContent');
        xml_set_element_handler($this->parser, $startCallable, $endCallable);
        xml_set_character_data_handler($this->parser, $dataCallable);
    }

    /**
     * Free the xml_parser object
     */
    public function __destruct()
    {
        xml_parser_free($this->parser);
    }

    /**
     * Adapter for ElementParser->parseStart()
     *
     * @param resource $p
     * @param string $elementName
     * @param array $attributes
     */
    private function callStart($p, $elementName, array $attributes)
    {
        $this->elementParser->parseStart($elementName, $attributes);
    }

    /**
     * Adapter for ElementParser->parseEnd()
     *
     * @param resource $p
     * @param string $elementName
     */
    private function callEnd($p, $elementName)
    {
        $this->elementParser->parseEnd($elementName);
    }

    /**
     * Adapter for ElementParser->parseContent()
     *
     * @param resource $p
     * @param string $content
     */
    private function callContent($p, $content)
    {
        // Only parseContent when there is more then just whitespace
        if (strlen(trim($content)) > 0) {
            $this->elementParser->parseContent($content);
        }
    }

}
