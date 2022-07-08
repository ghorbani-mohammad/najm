<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MizSession extends Model
{
    protected $table = 'miz_sessions';
    protected $fillable = ['language_id', 'shomare', 'tarikh', 'mozoo', 'raees_miz', 'dabir_miz', 'aza_miz', 'tarikh_gozaresh_be_masool',
        'tarikh_enteshar', 'hazine_aza', 'duration'];
    use HasFactory, SoftDeletes;

    public static function getAllFields()
    {
        return [
            'shomare' => 'شماره جلسه',
            'tarikh' => 'تاریخ جلسه',
            'mozoo' => 'موضوع جلسه',
            'raees_miz' => 'رییس میز',
            'dabir_miz' => 'دبیر میز',
            'aza_miz' => 'اعضای میز',
            'tarikh_gozaresh_be_masool' => 'تاریخ گزارش به مدیر مسیول',
            'tarikh_enteshar' => 'تاریخ انتشار',
            'hazine_aza' => 'حق الزحمه اعضا',
        ];
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'session_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(MizFiles::class, 'session_id', 'id');
    }

    public function storeFile(UploadedFile $document, $type = 'miz_files')
    {
        $filename = "miz_{$this->id}_{$type}_{$document->getClientOriginalName()}.{$document->getClientOriginalExtension()}";
        $file = Storage::disk('files')->putFileAs($type, $document, $filename);

        return $file;
    }

    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MizSessionMember::class, 'session_id', 'id');
    }

    public function language()
    {
        return $this->hasOne(MizLanguage::class, 'id', 'language_id');
    }

    public function getCoverAttribute()
    {
        $link =  $this->files()->where('is_cover', true)->first()->link ?? null;
        if ($link) {
            return '/files/'. $link;
        }

        return $link;
    }
}
