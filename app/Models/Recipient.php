<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    public $table = 'recipients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'street_nr',
        'psc',
        'mesto_sk',
        'mesto_de',
        'stat_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function recipientOutgoingPosts()
    {
        return $this->hasMany(OutgoingPost::class, 'recipient_id', 'id');
    }

    public function stat()
    {
        return $this->belongsTo(Stat::class, 'stat_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
