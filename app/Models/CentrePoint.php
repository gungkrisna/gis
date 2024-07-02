<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrePoint extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'coordinates',
        'created_by',
        'updated_by',
    ];

    protected $table = 'centre_points';

    public function spots()
    {
        return $this->hasMany(Spot::class, 'centre_point_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
