<?php

namespace App\Models;

use CodeIgniter\Model;

class MoodModel extends Model
{
    protected $table = 'mood';
    protected $allowFields = ['naam', 'datum', 'mood'];

    public function getMood($slug = false)
    
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}