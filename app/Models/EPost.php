<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EPost extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'e_posts';

    protected $appends = [
        'scan',
        'annex',
    ];

    protected $dates = [
        'date',
        'paid',
        'due_date',
        'send_email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'team_id',
        'sender_id',
        'file_short_text',
        'zadal_id',
        'accounting',
        'title',
        'notice',
        'dok_typ_id',
        'payment_info',
        'amount',
        'iban',
        'swift',
        'vs',
        'ss',
        'ks',
        'for_recipient',
        'paid',
        'due_date',
        'send_email',
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

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function sender()
    {
        return $this->belongsTo(Sender::class, 'sender_id');
    }

    public function getScanAttribute()
    {
        return $this->getMedia('scan')->last();
    }

    public function getAnnexAttribute()
    {
        return $this->getMedia('annex');
    }

    public function zadal()
    {
        return $this->belongsTo(Input::class, 'zadal_id');
    }

    public function dok_typ()
    {
        return $this->belongsTo(DokTyp::class, 'dok_typ_id');
    }

    public function getPaidAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPaidAttribute($value)
    {
        $this->attributes['paid'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSendEmailAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSendEmailAttribute($value)
    {
        $this->attributes['send_email'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function reads()
    {
        return $this->belongsToMany(User::class);
    }
}
