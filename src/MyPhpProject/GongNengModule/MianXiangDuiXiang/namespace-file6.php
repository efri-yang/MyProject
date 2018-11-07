<?php namespace fub;
 include 'namespace-file1.php';
	include 'namespace-file2.php';
	include 'namespace-file5.php';
  use foo as feline;
  use bar as canine;
  use other\animate;       //use other\animate as animate;
  echo feline\Cat::says(), "<br />\n";
  echo canine\Dog::says(), "<br />\n";
  echo animate\Animal::breathes(), "<br />\n";  ?>