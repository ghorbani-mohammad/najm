<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'type', 'name', 'mojri', 'rahnama', 'moshaver', 'mizan_kasri', 'start_date', 'end_date', 'tarikh_ghardad',
        'gharardad_link', 'hazine_nazer_1', 'hazine_nazer_2', 'hazine_nazer_3', 'hazine_davar_1', 'hazine_davar_2',
        'hazine_davar_3', 'hazine_moshaver', 'hazine_kol_gharardad',
    ];

    const Jaygozin_Khedmat = 'jaygozin';
    const Kasri = 'kasri';
    const Hamkar = 'hamkar_pajoohesh';

    public function getTypeNameAttribute()
    {
        switch ($this->type) {
            case self::Jaygozin_Khedmat:
                return 'جایگزین خدمت';
            case self::Kasri:
                return 'کسری خدمت';
            case self::Hamkar:
                return 'همکار پژوهشی';
        }
    }

    public static function getAllTypes()
    {
        return [
            self::Jaygozin_Khedmat => 'جایگزین خدمت',
            self::Kasri => 'کسری خدمت',
            self::Hamkar => 'همکار پژوهشی',
        ];
    }

    public static function getAllFields($type = null)
    {
        return [
            'name' => 'عنوان پروژه',
            'mojri' => 'مجری',
            'rahnama' => 'استاد راهنما',
            'moshaver' => 'استاد مشاور',
            'mizan_kasri' => 'میزان کسری',
            'start_date' => 'تاریخ شروع',
            'end_date' => 'تاریخ پایان',
            'tarikh_ghardad' => 'تاریخ قرارداد',
            'tarikh_bahrebardari' => 'تاریخ بهره‌برداری',
            'hoze_karbord' => 'حوزه کاربرد',
            'ghesmat_bahrebar' => 'قسمت بهره‌بردار',
            'hazine_nazer_1' => 'هزینه‌ی ناظر ۱',
            'hazine_nazer_2' => 'هزینه‌ی ناظر دو',
            'hazine_nazer_3' => 'هزینه‌ی ناظر ۳',
            'hazine_davar_1' => 'هزینه‌ی داور ۱ ',
            'hazine_davar_2' => 'هزینه‌ی داور دو',
            'hazine_davar_3' => 'هزینه‌ی داور ۳',
            'hazine_moshaver' => 'هزینه‌ی مشاور',
            'hazine_kol_gharardad' => 'مبلغ کل قرارداد',
        ];
    }

    public function reports()
    {
        return $this->hasMany(ProjectReports::class, 'project_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(ProjectFiles::class, 'project_id', 'id');
    }

    public function storeFile(UploadedFile $document, $type = 'project_files')
    {
        $filename = "project_{$this->id}_{$type}_{$document->getClientOriginalName()}.{$document->getClientOriginalExtension()}";
        $file = Storage::disk('files')->putFileAs($type, $document, $filename);

        return $file;
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'project_id', 'id');
    }
}
