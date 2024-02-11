<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'posts';

    protected $appends = [
        'envelope',
        'scan',
    ];

    protected $dates = [
        'date',
        'status_date',
        'processed_at',
        'paid',
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'team_id',
        'post_nr',
        'sender_id',
        'post_form_id',
        'title',
        'file_short_text',
        'notice',
        'zadal_id',
        'accounting',
        'status_id',
        'status_date',
        'customer_query_id',
        'customer_notice',
        'processed_id',
        'processed_at',
        'send_email',
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

    public function post_form()
    {
        return $this->belongsTo(Postform::class, 'post_form_id');
    }

    public function getEnvelopeAttribute()
    {
        return $this->getMedia('envelope')->last();
    }

    public function getScanAttribute()
    {
        return $this->getMedia('scan')->last();
    }

    public function zadal()
    {
        return $this->belongsTo(Input::class, 'zadal_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function getStatusDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStatusDateAttribute($value)
    {
        $this->attributes['status_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function customer_query()
    {
        return $this->belongsTo(Query::class, 'customer_query_id');
    }

    public function processed()
    {
        return $this->belongsTo(Processed::class, 'processed_id');
    }

    public function getProcessedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setProcessedAtAttribute($value)
    {
        $this->attributes['processed_at'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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

    public function reads()
    {
        return $this->belongsToMany(User::class);
    }
}
