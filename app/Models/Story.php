<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'type',
        'status'
    ];

    // protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        // static::addGlobalScope('active', function (Builder $builder) {
        //     $builder->where('status', 1);
        // });
    }

    // using accessors
    public function getTitleAttribute($value) {
        return ucfirst($value);
    }

    // using custom accessors
    public function getFootnoteAttribute() {
        return $this->type . ' Type, created at '. date('Y-m-d', strtotime($this->created_at));
    }

    // using mutators
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // display image
    public function getThumbnailAttribute() {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('storage/thumbnail.jpg');
    }
}
