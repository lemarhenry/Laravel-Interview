<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user()
    {
        //relationhip for user that todo
        return $this->belongsTo(User::class);
    }
    use HasFactory;

    protected $fillable=[
        'todo','completed','user_id'
    ];

}
