<?php

namespace ConfrariaWeb\Property\Models;

use ConfrariaWeb\Location\Traits\LocationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes, LocationTrait;

    protected $table = 'property_properties';

    protected $fillable = [
        'code',
        'title', 
        'slug', 
        'type_id', 
        'user_id',
        'description',
        'options'
    ];

    protected $casts = [
        'options' => 'collection'
    ];

    public function finalities()
    {
        return $this->belongsToMany(PropertyFinality::class, 'property_property_finality', 'property_id', 'finality_id');
    }

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'property_property_feature', 'property_id', 'feature_id');
    }

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'type_id');
    }

    

}
