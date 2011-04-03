<?php

require_once 'officialfm.php';

$ofm = new OfficialFM('GNXbH3zYb25F1I7KVEEN');
$info = $ofm->user(8735);
print_r($info);

?>
