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
 * Description of ForcastDecorator
 *
 * @author Waaghals
 */
class ForcastTableDecorator extends AbstractParserDecorator implements ElementParserInterface
{

    private $shouldContinue = false;

    public function parseContent($content)
    {
        if ($this->shouldContinue) {
            $this->parent->parseContent($content);
        }
    }

    public function parseEnd($elementName)
    {
        if ($elementName === "verwachting_meerdaags") {
            $this->shouldContinue = false;
            // Show a table end
            echo "</table>";
        }

        if ($this->shouldContinue) {
            $this->parent->parseEnd($elementName);
        }
    }

    public function parseStart($elementName, array $attributes)
    {
        if ($this->shouldContinue) {
            $this->parent->parseStart($elementName, $attributes);
        }

        if ($elementName === "verwachting_meerdaags") {
            $this->shouldContinue = true;
            echo
            "<table>"
            . "  <tr>"
            . "    <th>"
            . "Dag"
            . "    </th><th>"
            . "Min temperatuur"
            . "    </th><th>"
            . "Max temperatuur"
            . "    </th><th>"
            . "Windrichting"
            . "    </th><th>"
            . "Windkracht"
            . "    </th>"
            . "  </tr>";
        }
    }

}
