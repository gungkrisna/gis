<?php

// Model Spot.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'coordinates',
        'kelas_kemiskinan',
        'jumlah_anggota_kk',
        'kontaknowa',
        'description',
        'created_by',
        'updated_by',
    ];

    protected $guarded = [];

    public function centrePoint()
    {
        return $this->belongsTo(CentrePoint::class, 'centre_point_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getImageAsset()
    {
        if ($this->image) {
            return asset('/upload/spots/' . $this->image);
        }
        return 'https://placehold.co/150x200?text=No+Image';
    }
}
