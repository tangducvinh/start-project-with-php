<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // one category has many foods
    public function foods() {
        return $this->hasMany(Food::class);
    }
}
