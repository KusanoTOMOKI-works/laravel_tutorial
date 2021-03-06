<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $table = 'tasks';
    //STATUS LABEL

    const STATUS =[
        1 => ['label' => 'Waiting', 'class' => 'label-danger'],
        2 => ['label' => 'WIP',     'class' => 'label-info'],
        3 => ['label' => 'DONE',    'class' => ''],
    ];

    public function getStatusLabelAttribute()
    {

        // STATUS
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {

      // STATUS
        $status = $this->attributes['status'];
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
    }
}
