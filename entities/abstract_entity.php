<?php

class Abstract_entity {

    public function __construct($array_of_fields){
        if (is_array($array_of_fields)) foreach ($array_of_fields as $key=>$value){
            if (property_exists(get_class($this), $key)) $this->$key = $value;
        }
    }

    public function render($template_file){
        extract(get_object_vars($this));
        include $_SERVER['DOCUMENT_ROOT'].'/templates/'.$template_file;
    }
}