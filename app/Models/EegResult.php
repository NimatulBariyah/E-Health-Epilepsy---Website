<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EegResult extends Model
{
    use HasFactory;

    protected $table = 'eeg_results';
    protected $fillable = ['pasien_id', 'user_id', 'description'];
    protected $with = ['attachments', 'sesi'];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_id');
    }

    public function attachments()
    {
        return $this->hasMany(EegResultAttachment::class, 'eeg_id');
    }
}
