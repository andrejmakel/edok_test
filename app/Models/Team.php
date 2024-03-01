<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Team extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'teams';

    protected $appends = [
        'orsr',
        'zrsr',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'active',
        'archiv',
        'nazov',
        'short_name',
        'superfaktura',
        'nasa_id',
        'id_mmc',
        'id_pohoda',
        'date',
        'address',
        'sidlo_id',
        'ico',
        'dic',
        'ic_dph',
        'ic_dph_7_a',
        'phone',
        'e_schranka_id',
        'spracovanie_id',
        'send_address',
        'acc_company_id',
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

    public function teamUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function nasa()
    {
        return $this->belongsTo(Nasa::class, 'nasa_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function contacts()
    {
        return $this->belongsToMany(User::class);
    }

    public function sidlo()
    {
        return $this->belongsTo(Sidlo::class, 'sidlo_id');
    }

    public function e_schranka()
    {
        return $this->belongsTo(ESchranka::class, 'e_schranka_id');
    }

    public function spracovanie()
    {
        return $this->belongsTo(Spracovany::class, 'spracovanie_id');
    }

    public function acc_company()
    {
        return $this->belongsTo(AccCompany::class, 'acc_company_id');
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
