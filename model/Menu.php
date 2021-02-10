<?php

namespace  app\model;

class Menu 
{
    private static  $menu = [
        [
            'href' => '/',
            'name' => 'Главная',
        ],
        [
            'href' => '/gallery',
            'name' => 'Галерея',
        ],
        [
            'href' => '/catalog',
            'name' => 'Каталог',
        ],
        [
            'href' => '/feedback',
            'name' => 'Отзывы',
        ],
        [
            'href' => '/basket',
            'name' => 'Корзина count ',
        ]
    ];

    public static function renderMenu()
    {
        $html = '<ul>';
        foreach (self::$menu as $item) {
            $html .= '<li>';
            extract($item);
            $html .= '<a href="' . $item['href'] . '">' . $item['name'] . '</a>';
            if (isset($item['submenu'])) {
                $html .=  static::renderMenu($item['submenu']);
            }
            $html .= '</li>';
        }
        return $html .= '</ul>';
    }
}
