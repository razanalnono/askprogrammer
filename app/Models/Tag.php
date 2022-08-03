<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'name','slug'];
    // equal    protected $gurded=[];

    public static function rules($id = 0)
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'unique',
            ],
           
        ];
    }

    public function questions(){
        return $this->belongsToMany(Question::class);  
    }

    
}