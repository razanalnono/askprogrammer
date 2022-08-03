<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'queestion', 'status', 'user_id',''
    // ];
    public $guarded = [];

    
    public function tags()
    {
        
        return $this->belongsToMany(
            Tag::class,   
            'question_tag', 
            'question_id',  
            'tag_id',       
            'id',           
            'id'           
        );
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}