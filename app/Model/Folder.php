<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folders';

    public function tasks()
    {
        return $this->hasMany('App\Model\Task');
    }
}
