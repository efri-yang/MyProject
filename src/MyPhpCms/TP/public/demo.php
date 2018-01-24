<?php

	// echo dirname(realpath('G:/xampp/htdocs/MyProject/src/MyPhpCms/TP/public'));
	// echo pathinfo("index", PATHINFO_FILENAME);
    echo pathinfo(realpath("index.php"), PATHINFO_FILENAME);

?>