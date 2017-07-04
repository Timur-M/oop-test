<?php

class Template {
    public function render($template_file,$array_of_objects_to_render = array()){
        extract($array_of_objects_to_render);
        include $_SERVER['DOCUMENT_ROOT'].'/templates/'.$template_file;
    }

}