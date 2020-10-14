<?php
print_r("Texto: ".$_REQUEST["mytext"]);
echo "<br>";
print_r("Has seleccionado la radio: ".$_REQUEST["myradio"]);
echo "<br>";
if (isset($_REQUEST["mycheckbox"])){
   print_r( $_REQUEST["mycheckbox"]);
   echo "<br>";
}
print_r("Has seleccionado el item: ".$_REQUEST["myselect"]);
echo "<br>";
print_r("Texto: ".$_REQUEST["mytextarea"]);
echo "<br>";
?>