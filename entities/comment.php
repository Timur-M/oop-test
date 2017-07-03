<?php

class Comment {
    var $id;
    var $content;

    public function __construct($array_of_fields){
        if (is_array($array_of_fields)) foreach ($array_of_fields as $key=>$value){
            if (property_exists(get_class($this), $key)) $this->$key = $value;
        }
    }
}