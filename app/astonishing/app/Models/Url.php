<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $long_url
 * @property string $code
 */
class Url extends Model
{
    use HasFactory;

    protected $fillable = ['long_url', 'code'];

    public function getLongUrl(): string
    {
        return $this->long_url;
    }
}
