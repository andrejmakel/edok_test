<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Firma extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'firmas';

    protected $appends = [
        'orsr',
        'zrsr',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nasa_id',
        'nazov',
        'activ',
        'team_id',
        'idmmc',
        'address',
        'short_address',
        'ico',
        'dic',
        'ic_dph',
        'ic_dph_form',
        'telefon',
        'e_schranka_id',
        'spracovanie_id',
        'sprac_posty',
        'ucto_id',
        'bank_id',
        'iban',
        'swift_bic',
        'popis',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function nasa()
    {
        return $this->belongsTo(Nasa::class, 'nasa_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function kontakts()
    {
        return $this->belongsToMany(User::class);
    }

    public function e_schranka()
    {
        return $this->belongsTo(ESchranka::class, 'e_schranka_id');
    }

    public function spracovanie()
    {
        return $this->belongsTo(Spracovany::class, 'spracovanie_id');
    }

    public function ucto()
    {
        return $this->belongsTo(Ucto::class, 'ucto_id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function getOrsrAttribute()
    {
        return $this->getMedia('orsr')->last();
    }

    public function getZrsrAttribute()
    {
        return $this->getMedia('zrsr')->last();
    }
}
