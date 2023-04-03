<?php

namespace core;

class View
{
    // Creating the render function.
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = "../app/Views/$view";

        if (is_readable($file)){
            require $file;
        }else{
            echo "$file not found";
        }
    }

}
