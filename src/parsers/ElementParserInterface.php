<?php

/*
 * The MIT License
 *
 * Copyright 2014 Patrick.
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

namespace ForsakenIvoryCoffin\Parsers;

/**
 *
 * @author Patrick
 */
interface ElementParserInterface
{

    /**
     * Called when a opening element is found.
     *
     * @param string $elementName Name of the element
     * @param array $attributes Associative array with the element's attributes (if any).
     *      The keys of this array are the attribute names, the values are the attribute values.
     */
    function parseStart($elementName, array $attributes);

    /**
     * Called when a closing element is found
     *
     * @param string $elementName Name of the element
     */
    function parseEnd($elementName);

    /**
     * Called for every piece of a text in the XML document. It can be called multiple times inside each fragment (e.g. for non-ASCII strings).
     *
     * @param string $content Current character
     */
    function parseContent($content);
}
