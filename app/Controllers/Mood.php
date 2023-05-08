<?php

namespace App\Controllers;

use App\Models\MoodsModel;

class News extends BaseController
{
    public function index()
    {
        
        $model = model(NewsModel::class);
        
        $data = [
            'news'  => $model->getMood(),
            'title' => 'Moodmeter',
        ];
        
        return  view('mood/index' , $data)
            ;
    }

    // ...

    public function view($slug = null)
    {
        $model = model(MoodModel::class);

        $data['mood'] = $model->getNews($slug);

        if (empty($data['mood'])) {
            throw new PageNotFoundException('Cannot find the mood: ' . $slug);
        }

        $data['title'] = $data['mood']['title'];

        return view('templates/header')
            . view('mood/view', $data)
            . view('templates/footer');
    }

}
?>