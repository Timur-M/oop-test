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

    public function add_element($element_name,$element_value){
        $this->elements[$element_name] = $element_value;
    }

    public function get_all_vars(){
        return get_object_vars($this);
    }
}