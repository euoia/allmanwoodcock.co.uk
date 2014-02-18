<?php
function get_ancestors ($class) {
     $retval[$i=0] = get_class($class);
     while($retval[++$i] = ($class = get_parent_class($class)));
     return $retval;
     
}
?>