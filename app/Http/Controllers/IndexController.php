<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use voku\helper\HtmlDomParser;

class IndexController extends Controller
{
    public function view($args = null)
    {
        return view('index', ['args' => $args]);
    }

    public function search_img(Request $request)
    {
        $url = $request['url'];

        $dom = HtmlDomParser::file_get_html($url);
        $images = $dom->findMulti('img');

        $srcImages = [];

        foreach ($images as $img) {
            $srcImages[] = $img->src;
        }

        //Фильтруем битые ссылки
        $srcImages = array_filter($srcImages, function ($value) {
            if (!empty($value) && substr($value, 0, 4) == 'http')
                return $value;
        });

        //Вычисляем размер файлов
        $sizeImages = 0;

        foreach ($srcImages as $img) {
            $headers = get_headers($img, 1);
            $sizeImages += $headers['Content-Length'];
        }

        //Приводим размер к МегаБайтам
        $sizeImages /= 1024 * 1024;
        $sizeImages = round($sizeImages, 1);

        $countImages = count($srcImages);
        $srcImages = array_chunk($srcImages, 4);

        return $this->view(['src' => $srcImages, 'countImages' => $countImages, 'sizeImages' => $sizeImages]);
    }
}
