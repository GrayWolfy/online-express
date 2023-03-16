<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['long_url', 'code'];

    public function getLongUrl()
    {
        return $this->long_url;
    }
}
