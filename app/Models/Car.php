<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Car extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'cars';

    protected $appends = [
        'pzp_documents',
        'kasko_dokuments',
    ];

    protected $dates = [
        'sk_register',
        'stk_date',
        'pzp_date',
        'kasko_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'team_id',
        'typ_id',
        'znacka_id',
        'model',
        'ecv',
        'vin',
        'sk_register',
        'stk_date',
        'pzp_date',
        'pzp_cislo',
        'kasko_date',
        'kasko_cislo',
        'poist_notice',
        'pzp_poistovna_id',
        'kasko_poistovna_id',
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

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function typ()
    {
        return $this->belongsTo(Typ::class, 'typ_id');
    }

    public function znacka()
    {
        return $this->belongsTo(Znacka::class, 'znacka_id');
    }

    public function getSkRegisterAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSkRegisterAttribute($value)
    {
        $this->attributes['sk_register'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStkDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStkDateAttribute($value)
    {
        $this->attributes['stk_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPzpDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPzpDateAttribute($value)
    {
        $this->attributes['pzp_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPzpDocumentsAttribute()
    {
        return $this->getMedia('pzp_documents');
    }

    public function getKaskoDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setKaskoDateAttribute($value)
    {
        $this->attributes['kasko_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getKaskoDokumentsAttribute()
    {
        return $this->getMedia('kasko_dokuments');
    }

    public function pzp_poistovna()
    {
        return $this->belongsTo(Insurance::class, 'pzp_poistovna_id');
    }

    public function kasko_poistovna()
    {
        return $this->belongsTo(Insurance::class, 'kasko_poistovna_id');
    }
}
