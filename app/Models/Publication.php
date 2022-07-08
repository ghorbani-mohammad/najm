<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Publication extends Model
{
    use HasFactory;

    const FaslName = 'faslname';
    const GahName_Negahe2 = 'gahname_negah2';
    const GahName_DideBan = 'gahname_dideban';
    const GahName_AyandeBan = 'gahname_ayandeban';

    protected $table = 'publication';
    protected $fillable = ['type', 'sal', 'fasl', 'hazine_maghalat', 'hazine_type', 'hazine_safhe_arayi', 'hazine_tarahi_jeld',
        'hazine_davaran', 'hazine_nezarat_fani', 'hazine_nezarat_adabi', 'hazine_chap', 'hazine_majmooe',
        'hazine_moshavere', 'hazine_manabe_mostanadat', 'hazine_elsagh_ghardad', 'heyat_sardabir', 'heyat_modir_masool',
        'heyat_nazer_ali', 'heyat_nazer_elmi', 'heyat_nazer_fani', 'heyat_modir_ejrayi', 'heyat_tarrahe_jeld',
        'heyat_virastar_elmi', 'heyat_virastar_adabi', 'heyat_nemoone_khan', 'shomare', 'tarikhe_enteshar',
        'shomare_mosalsal', 'shomaregan', 'title', 'title_en', 'authors', 'keshvar', 'moassese_montasher_konande',
        'tahie_konande', 'ravesh_tahie'
    ];

    public static function getAllTypes()
    {
        return [
            self::FaslName => 'فصلنامه نگاه دو',
            self::GahName_Negahe2 => 'گاهنامه نمای راهبردی نگاه دو',
            self::GahName_DideBan => 'گاهنامه دیده‌بان',
            self::GahName_AyandeBan => 'گاهنامه آینده‌بان'
        ];
    }

    public static function getAllFields($type = null)
    {
        return [
//            'common' => self::commonFields(),
            'related' => self::relatedFields($type),
//            'tahrir' => self::heyatTahrirFields(),
//            'hazine' => self::hazineMaliFields($type),
        ];
    }

    public static function getAllSpecialConditions($type)
    {
        switch ($type) {
            case self::GahName_Negahe2:
                return [
                    'fields' => [
                        'maghalat' => false,
                        'ravesh_tahie' => true,
                    ],
                ];
            default:
                return [];
        }
    }

    public static function hazineMaliFields($type)
    {
        $fields = [
            'hazine_maghalat' => 'حق الزحمه مقالات',
            'hazine_type' => 'حق الزحمه تایپ',
            'hazine_safhe_arayi' => 'حق الزحمه صفحه آرایی',
            'hazine_tarahi_jeld' => 'حق الزحمه طراحی جلد',
            'hazine_davaran' => 'حق الزحمه داوران',
            'hazine_nezarat_fani' => 'حق الزحمه نظارت فنی',
            'hazine_nezarat_adabi' => 'حق الزحمه نظارت ادبی',
            'hazine_chap' => 'هزینه چاپ',
            'hazine_majmooe' => 'مجموعه هزینه‌ها',
            'hazine_moshavere' => 'حق الزحمه مشاوره',
            'hazine_manabe_mostanadat' => 'هزینه منابع و مستندات',
            'hazine_elsagh_ghardad' => 'هزینه الصاق قرارداد‌های مربوطه',

        ];
        switch ($type) {
            case self::GahName_Negahe2:
                unset($fields['hazine_maghalat']);
        }

        return $fields;
    }

    public static function heyatTahrirFields()
    {
        return [
            'heyat_sardabir' => 'سردبیر',
            'heyat_modir_masool' => 'مدیر مسئول',
            'heyat_nazer_ali' => 'ناظر عالی',
            'heyat_nazer_elmi' => 'ناظر علمی',
            'heyat_nazer_fani' => 'ناظر فنی',
            'heyat_modir_ejrayi' => 'مدیر اجرایی',
            'heyat_tarrahe_jeld' => 'طراح جلد',
            'heyat_virastar_elmi' => 'ویراستار علمی',
            'heyat_virastar_adabi' => 'ویراستار ادبی',
            'heyat_nemoone_khan' => 'نمونه‌خوان',
        ];
    }

    public static function commonFields()
    {
        return [
            'shomare' => 'شماره',
            'tarikhe_enteshar' => 'تاریخ انتشار',
            'shomare_mosalsal' => 'شماره مسلسل',
            'shomaregan' => 'شمارگان',
        ];
    }

    public static function relatedFields($type)
    {
        switch ($type) {
            case self::GahName_Negahe2:
                return [
                    'title' => 'عنوان فارسی',
                    'title_en' => 'عنوان انگلیسی',
                    'authors' => 'نویسندگان',
                    'keshvar' => 'کشور',
                    'moassese_montasher_konande' => 'موسسه منتشر کننده',
                    'tahie_konande' => 'مولف'
                ];
            case self::GahName_DideBan:
                return [
                    'authors' => 'نویسندگان',
                    'keshvar' => 'کشور',
                ];
            case null:
                return [
                    'title' => 'عنوان فارسی',
                    'title_en' => 'عنوان انگلیسی',
                    'authors' => 'نویسندگان',
                    'keshvar' => 'کشور',
                ];
            default:
                return [];
        }
    }

    public function getTypeNameAttribute()
    {
        switch ($this->type) {
            case self::FaslName :
                return 'فصلنامه نگاه دو';
            case self::GahName_Negahe2 :
                return 'گاهنامه نمای راهبردی نگاه دو';
            case self::GahName_DideBan :
                return 'گاهنامه دیده‌بان';
            case self::GahName_AyandeBan :
                return 'گاهنامه آینده‌بان';
        }
    }

    public function tahrir()
    {
        return $this->hasMany(HeyatTahrir::class, 'publication_id', 'id');
    }

    public function moshaver()
    {
        return $this->hasMany(MoshaverElmi::class, 'publication_id', 'id');
    }

    public function maghale()
    {
        return $this->hasMany(Maghale::class, 'publication_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(PublicationFiles::class, 'publication_id', 'id');
    }

    public function storeFile(UploadedFile $document, $type = 'publication_files')
    {
        $filename = "publication_{$this->id}_{$type}_{$document->getClientOriginalName()}.{$document->getClientOriginalExtension()}";
        $file = Storage::disk('files')->putFileAs($type, $document, $filename);

        return $file;
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'publication_id', 'id');
    }

    public function hasMaghale()
    {
        return in_array($this->type, [
            self::GahName_DideBan, self::FaslName
        ]);
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
