<?php
/**
* Builds a file path with the appropriate directory separator.
* @param string $segments,... unlimited number of path segments
* @return string Path
*/
function file_build_path(...$segments) {
    return join(DIRECTORY_SEPARATOR, $segments);
}

// echo file_build_path("home", "alice", "Documents", "example.txt");


$file_name = "./image/bg.png";
$fp = fopen($file_name, 'r');
//$buffer=fgets($fp);
while (!feof($fp)) {
$buffer = fgets($fp);
echo $buffer;
}
fclose($fp);


?>