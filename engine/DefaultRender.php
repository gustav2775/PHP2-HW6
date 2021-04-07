<?php

namespace app\engine ;

use app\interfaces\IRender;

class DefaultRender implements IRender

{
    public function renderVeiws($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = TEMPLATE . $template . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }

    
}
