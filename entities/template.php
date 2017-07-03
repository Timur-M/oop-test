<?php

class Template {
    public function render($render,$template_file){
        include $_SERVER['DOCUMENT_ROOT'].'/templates/'.$template_file;
    }

}