<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EegProcessed extends Model
{
    use HasFactory;

    protected $with = ['attachments', 'sesi'];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_id');
    }

    public function attachments()
    {
        return $this->hasMany(EegProcessedAttachment::class, 'eeg_processed_id');
    }
}
