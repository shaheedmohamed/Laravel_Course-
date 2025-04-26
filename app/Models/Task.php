<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name',
        'duration',
        'priority',
        'is_finished',
        'actual_duration'
    ];
    

}
