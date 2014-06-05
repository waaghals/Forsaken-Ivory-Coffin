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

namespace ForsakenIvoryCoffin\Parsers\ElementParsers\Decorators;

use ForsakenIvoryCoffin\Parsers\ElementParsers\AbstractParserDecorator;
use ForsakenIvoryCoffin\Parsers\ElementParserInterface;

/**
 * Description of ForcastTableRowDecorator
 *
 * @author Waaghals
 */
class ForcastTableRowDecorator extends AbstractParserDecorator implements ElementParserInterface
{

    /**
     * Pattern which matches the 5-day forcast elements
     */
    const PATTERN = "/dag-plus[0-5]/";

    /**
     * Used to deside if the content of the current tag should be showed.
     * Because there should only be cells returned when te surrounding tag is in the table.
     *
     * @var boolean
     */
    private $shouldShowContent = false;

    /**
     * Adds a table cell around the values in the table rows.
     * @param string $content
     */
    public function parseContent($content)
    {
        if ($this->shouldShowContent) {
            $output = sprintf("<td>%s</td>", $content);
            $this->parent->parseContent($output);
        }
    }

    /**
     * Closes a table row when the element is used in the table
     * @param string $elementName
     */
    public function parseEnd($elementName)
    {
        if (preg_match(self::PATTERN, $elementName)) {
            echo "</tr>";
        }
    }

    /**
     * Starts a table row when element is used in the table
     *
     * @param string $elementName
     * @param array $attributes
     */
    public function parseStart($elementName, array $attributes)
    {
        $this->shouldShowContent = $this->isUsefulElement($elementName);
        if (preg_match(self::PATTERN, $elementName)) {
            $this->parent->parseEnd("<tr>");
        }
    }

    /**
     * Return is the element is used in the table
     *
     * @param string $elementName
     * @return boolean
     */
    private function isUsefulElement($elementName)
    {
        switch ($elementName) {
            case "dagweek":
            case "mintemp":
            case "maxtemp":
            case "windrichting":
            case "windkracht":

                return true;
        }
        return false;
    }

}
