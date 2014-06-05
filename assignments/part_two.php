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

require '../SplClassLoader.php';

use ForsakenIvoryCoffin\Parsers\DocumentParsers\SaxParser;
use ForsakenIvoryCoffin\Parsers\ElementParsers\EchoParser;
use ForsakenIvoryCoffin\Parsers\ElementParsers\Decorators\ForcastTableDecorator as Table;
use ForsakenIvoryCoffin\Parsers\ElementParsers\Decorators\ForcastTableRowDecorator as Row;

$loader = new SplClassLoader('ForsakenIvoryCoffin', '../src');
$loader->register();

$weatherData = \file_get_contents("http://xml.buienradar.nl/");

$saxParser = new SaxParser();
$saxParser->setFile("../xmlFiles/buienradar.xml");
$saxParser->setElementParser(new Table(new Row(new EchoParser(""))));

echo "<h1>Weersverwachting</h1>";
echo
"Toon de weersverwachting voor de komende 5 dagen. "
 . "De data wordt geparsed uit de XML van <a href=\"http://www.buienradar.nl\">Buienradar</a>."
 . "Vervolgens wordt op basis van element naam bepaald hoe deze getoont moeten worden."
 . "De data wordt geparsed en in een HTML tabel gezet.";
$saxParser->parse();
