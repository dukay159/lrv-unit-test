<?php

namespace App\Repositories; 

use App\Models\Post; 

class PostRepository
{ 
    protected $model; 
    public function __construct() 
    { 
        $this->model = app()->make(Post::class); 
    } 
    public function create($data) 
    { 
        return $this->model->create($data); 
    }
} 