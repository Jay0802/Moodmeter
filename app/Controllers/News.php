<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        
        $model = model(NewsModel::class);
        
        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];
        
        return  view('news/index' , $data)
            ;
    }

    // ...

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header')
            . view('news/view', $data)
            . view('templates/footer');
    }

}
?>