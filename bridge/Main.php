<?php
require "Display.php";
require "DisplayImpl.php";
require "CountDisplay.php";
require "StringDisplayImpl.php";

$d1 = new Display(new StringDisplayImpl("Hello, Japan."));
$d2 = new CountDisplay(new StringDisplayImpl("Hello, World."));
$d3 = new CountDisplay(new StringDisplayImpl("Hello, Universe."));
$d1->display();
$d2->display();
$d3->display();
$d3->multiDisplay(5);