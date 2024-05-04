<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    use HasFactory;
    protected $table = 'chapter';
    protected $fillable = [
        'id_books',
        'name',
        'summary',
        'content',
        'created_at',
        'updated_at',
    ];
    public function books()
    {
        return $this->hasOne(Book::class,'id','id_books');
    }
    
}
