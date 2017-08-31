<?php
$display_order = array( 
    1 => 4, 
    2 => 1, 
    3 => 2, 
    4 => 3, 
    5 => 9, 
    6 => 5, 
    7 => 8, 
    8 => 9 
); 
$ids = implode(',', array_keys($display_order)); 
$sql = "UPDATE categories SET display_order = CASE id "; 
foreach ($display_order as $id => $ordinal) { 
    $sql .= sprintf("WHEN %d THEN %d ", $id, $ordinal); 
} 
$sql .= "END WHERE id IN ($ids)"; 
echo $sql;
?>