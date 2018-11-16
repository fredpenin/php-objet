<?php
include "Text.php";

$hello = "Hello World";

$text = new Text($hello);

echo $text->set($hello)->print()."<br>";
echo $text->set($hello)->bold()->print()."<br>";
echo $text->set($hello)->italic()->print()."<br>";
echo $text->set($hello)->strike()->print()."<br>";
echo $text->set($hello)->italic()->bold()->strike()->print()."<br>";