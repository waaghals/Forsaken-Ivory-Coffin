<!DOCTYPE html>
<!--
The MIT License

Copyright 2014 Waaghals.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
-->
<html>
    <head>
        <title>Deelopdracht 2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <style>html{height:100%}body{margin:0!important;padding:5px 20px!important;background-color:#fff;font-family:Arial,'Apple SD Gothic Neo','Malgun Gothic',Helvetica,nanumgothic,sans-serif,Menlo,Monaco,monospace;font-size:.9em;overflow-x:hidden;overflow-y:auto}h1,h2,h3,h4,h5,h6,br{clear:both}body >:first-child{margin-top:0!important}img.plugin{box-shadow:0 1px 3px rgba(0,0,0,.1);border-radius:3px}iframe{border:0}figure{-webkit-margin-before:0;-webkit-margin-after:0;-webkit-margin-start:0;-webkit-margin-end:0}.oembeded .oembed_photo{display:inline-block}.spinner{display:inline-block;width:10px;height:10px;margin-bottom:-.1em;border:2px solid rgba(0,0,0,.5);border-top-color:transparent;border-radius:100%;-webkit-animation:spin 1s infinite linear;animation:spin 1s infinite linear}.spinner:after{content:'';display:block;width:0;height:0;position:absolute;top:-6px;left:0;border:4px solid transparent;border-bottom-color:rgba(0,0,0,.5);-webkit-transform:rotate(45deg);transform:rotate(45deg)}@-webkit-keyframes spin{to{-webkit-transform:rotate(360deg)}}@keyframes spin{to{transform:rotate(360deg)}}.markdown{padding:20px}.markdown a{text-decoration:none;vertical-align:baseline}.markdown a:hover{text-decoration:underline}.markdown h1{font-size:2.2em;font-weight:700;margin:1.5em 0 1em}.markdown h2{font-size:1.8em;font-weight:700;margin:1.275em 0 .85em}.markdown h3{font-size:1.6em;font-weight:700;margin:1.125em 0 .75em}.markdown h4{font-size:1.4em;font-weight:700;margin:.99em 0 .66em}.markdown h5{font-size:1.2em;font-weight:700;margin:.855em 0 .57em}.markdown h6{font-size:1em;font-weight:700;margin:.75em 0 .5em}.markdown h1:first-child,.markdown h2:first-child,.markdown h3:first-child,.markdown h4:first-child,.markdown h5:first-child,.markdown h6:first-child{margin-top:0}.markdown h1+p,.markdown h2+p,.markdown h3+p,.markdown h4+p,.markdown h5+p,.markdown h6+p{margin-top:0}.markdown hr{border:1px solid #ccc}.markdown p{margin:1em 0;word-wrap:break-word}.markdown ol{list-style-type:decimal}.markdown li{display:list-item;line-height:1.4em}.markdown blockquote{margin:1em 20px}.markdown blockquote>:first-child{margin-top:0}.markdown blockquote>:last-child{margin-bottom:0}.markdown blockquote cite:before{content:'\2014 \00A0'}.markdown .code{border-radius:3px;word-break:break-all;word-wrap:break-word}.markdown pre{border-radius:3px;word-break:break-all;word-wrap:break-word;overflow:auto}.markdown pre code{display:block}.markdown pre>code{border:1px solid #ccc;white-space:pre;padding:.5em;margin:0}.markdown code{border-radius:3px;word-break:break-all;word-wrap:break-word;border:1px solid #ccc;padding:0 5px;margin:0 2px}.markdown img{max-width:100%}.markdown table{padding:0;border-collapse:collapse;border-spacing:0}.markdown table tr th,.markdown table tr td{border:1px solid #ccc;margin:0;padding:6px 13px}.markdown table tr th{font-weight:700}.markdown table tr th>:first-child{margin-top:0}.markdown table tr th>:last-child{margin-bottom:0}.markdown table tr td>:first-child{margin-top:0}.markdown table tr td>:last-child{margin-bottom:0}.markdown{}.markdown em.underline{font-style:normal;text-decoration:underline}.markdown strong.highlight{font-style:normal;background-color:#fdffb6;-webkit-box-shadow:#fdffb6 0 0 5px;-moz-box-shadow:#fdffb6 0 0 5px;box-shadow:#fdffb6 0 0 5px;font-weight:400}@import url(http://fonts.googleapis.com/css?family=Tauri);@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700);.haroopad{padding:20px;color:#222;font-size:15px;font-family:'Roboto Condensed',Tauri,"Lucida Grande","Lucida Sans Unicode","Lucida Sans",AppleSDGothicNeo-Medium,'Segoe UI','Malgun Gothic',Verdana,Tahoma,sans-serif;background:#fff;-webkit-font-smoothing:antialiased}.haroopad a{color:#3269a0}.haroopad a:hover{color:#4183c4}.haroopad h2{border-bottom:1px solid #e6e6e6}.haroopad h6{color:#777}.haroopad hr{border:1px solid #e6e6e6}.haroopad p>code{font-family:Consolas,Inconsolata,Courier,monospace;color:#BD006A}.haroopad pre>code{font-size:1em;font-family:Consolas,Inconsolata,Courier,monospace;letter-spacing:-1px;font-weight:700}.haroopad blockquote{border-left:4px solid #e6e6e6;padding:0 15px;font-style:italic}.haroopad table{background-color:#fafafa}.haroopad table tr th,.haroopad table tr td{border:1px solid #e6e6e6}.haroopad table tr:nth-child(2n){background-color:#f2f2f2}pre code{display:block;padding:.5em;background:#fdf6e3;color:#657b83}pre .comment,pre .template_comment,pre .diff .header,pre .doctype,pre .pi,pre .lisp .string,pre .javadoc{color:#93a1a1;font-style:italic}pre .keyword,pre .winutils,pre .method,pre .addition,pre .css .tag,pre .request,pre .status,pre .nginx .title{color:#859900}pre .number,pre .command,pre .string,pre .tag .value,pre .rules .value,pre .phpdoc,pre .tex .formula,pre .regexp,pre .hexcolor{color:#2aa198}pre .title,pre .localvars,pre .chunk,pre .decorator,pre .built_in,pre .identifier,pre .vhdl .literal,pre .id,pre .css .function{color:#268bd2}pre .attribute,pre .variable,pre .lisp .body,pre .smalltalk .number,pre .constant,pre .class .title,pre .parent,pre .haskell .type{color:#b58900}pre .preprocessor,pre .preprocessor .keyword,pre .shebang,pre .symbol,pre .symbol .string,pre .diff .change,pre .special,pre .attr_selector,pre .important,pre .subst,pre .cdata,pre .clojure .title,pre .css .pseudo{color:#cb4b16}pre .deletion{color:#dc322f}pre .tex .formula{background:#eee8d5}footer{position:fixed;font-size:.8em;text-align:right;bottom:0;margin-left:-25px;height:20px;width:100%}</style>

    </head>
    <body class="markdown haroopad">
        <h1>Deelopdracht 2</h1>
        <?php
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

        echo "<h2>Weersverwachting</h2>";
        echo
        "<p>Toon de weersverwachting voor de komende 5 dagen. "
        . "De data wordt geparsed uit de XML van <a href=\"http://www.buienradar.nl\">Buienradar</a>."
        . "Vervolgens wordt op basis van element naam bepaald hoe deze getoont moeten worden."
        . "De data wordt geparsed en in een HTML tabel gezet.</p>";
        $saxParser->parse();
        ?>
    </body>
</html>
