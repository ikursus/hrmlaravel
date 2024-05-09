<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    // Overwrite default setting table Model Cuti daripada cutis (ejaan plural) kepada cuti (table sebenar)
    protected $table = 'cuti';

    protected $fillable = [
        'user_id',
        'tarikh_mula',
        'tarikh_akhir',
        'type',
        'status',
        'reason',
        'jumlah_hari'
    ];

    // Relation one to one (reverse) ke table users / model User
    public function detailUser()
    {
        // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
