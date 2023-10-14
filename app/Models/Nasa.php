<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasa extends Model
{
    use HasFactory;

    public $table = 'nasas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'konto',
        'iban',
        'swift',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function nasaInvoices()
    {
        return $this->hasMany(Invoice::class, 'nasa_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
