<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    use HasFactory;

    public $table = 'senders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sender',
        'sender_de',
        'sender_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function senderPosts()
    {
        return $this->hasMany(Post::class, 'sender_id', 'id');
    }

    public function senderEPosts()
    {
        return $this->hasMany(EPost::class, 'sender_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
