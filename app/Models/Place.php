<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Place extends Model
{
    use HasFactory;
 
    protected $table = 'places';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'place',
        'location',
        'photo',
        'description',
        'map_link'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}