<?php

class AppModel extends Model {

function generateList ($cond=null,$order=null,$limit=null,$key=null,$val=null) {
    return $this->find("list",array(
        'conditions' => $cond, 
        'order' => $order,
        'limit' => $limit,
        'fields' => array(str_replace('{n}.','',$key), str_replace('{n}.','',$val))
    ));
}
}

?>