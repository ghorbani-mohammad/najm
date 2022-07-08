<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    const Book_Type_Banafsh = 'banafsh';
    const Book_Type_Takhassosi = 'takhassosi';

    protected $table = 'books';
    protected $fillable = [
        'type', 'title', 'title_en', 'nobate_chap', 'shomaregan', 'shabak', 'fipa', 'tahrir_moallef', 'tahrir_nazer_ali', 'tahrir_nazer_elmi', 'tahrir_nazer_fanni', 'tahrir_virastar', 'tahrir_nemoone_khan', 'tahrir_type_safhe_arayi', 'tahrir_tarrah_jeld', 'hazine_talif', 'hazine_type', 'hazine_safhe_arayi', 'hazine_tarahi_jeld', 'hazine_davaran', 'hazine_nezarat_fani', 'hazine_nezarat_adabi', 'hazine_chap', 'hazine_majmooe', 'hazine_moshavere', 'hazine_manabe_mostanadat', 'hazine_elsagh_ghardad', 'enteshar_tarikhe_shoroo_hamkari', 'enteshar_tarikhe_etmam_hamkari', 'enteshar_tarikhe_ersal_be_davari', 'natije_davari', 'enteshar_tarikhe_ersal_be_virastyar', 'enteshar_tarikhe_daryaft_salahiat_amniati', 'enteshar_tarikhe_ersal_entesharat', 'enteshar_tarikhe_daryaft_shabak', 'enteshar_tarikhe_daryaft_fipa', 'deleted_at', 'created_at', 'updated_at', 'sal', 'enteshar_tarikh', 'hazine_maghalat'];

    public static function getAllTypes()
    {
        return [
            self::Book_Type_Banafsh => 'کتاب بنفش',
            self::Book_Type_Takhassosi => 'کتاب تخصصی',
        ];
    }

    public function getTypeNameAttribute()
    {
        switch ($this->type) {
            case self::Book_Type_Banafsh :
                return 'کتاب بنفش';
            case self::Book_Type_Takhassosi :
                return 'کتاب تخصصی';
        }
    }

    public static function getAllFields($type = null)
    {
        return [
//            'common' => self::commonFields(),
//            'tahrir' => self::heyatTahrirFields(),
//            'hazine' => self::hazineMaliFields(),
//            'enteshar' => self::entesharFields(),
        ];
    }

    public static function commonFields()
    {
        return [
            'title' => 'عنوان فارسی',
            'title_en' => 'عنوان انگلیسی',
            'shomaregan' => 'شمارگان',
            'shabak' => 'شابک',
            'fipa' => 'فیپا',
            'sal' => 'سال چاپ',
            'nobate_chap' => 'نوبت چاپ',
        ];
    }

    public static function heyatTahrirFields()
    {
        return [
            'tahrir_moallef' => 'مؤلف',
            'tahrir_nazer_ali' => 'ناظر عالی',
            'tahrir_nazer_elmi' => 'ناظر علمی',
            'tahrir_nazer_fanni' => 'ناظر فنی',
            'tahrir_virastar' => 'داور علمی',
            'tahrir_nemoone_khan' => 'ویراستار',
            'tahrir_type_safhe_arayi' => 'نمونه خوان',
            'tahrir_tarrah_jeld' => 'تایپ و صحفه آرایی',
        ];
    }

    public static function hazineMaliFields()
    {
        return [
            'hazine_maghalat' => 'حق الزحمه تالیف',
            'hazine_type' => 'حق الزحمه تایپ',
            'hazine_davaran' => 'حق الزحمه داوران',
            'hazine_nezarat_adabi' => 'حق الزحمه نظارت ادبی',
            'hazine_nezarat_fani' => 'حق الزحمه ویرایش فنی',
            'hazine_moshavere' => 'حق الزحمه مشاوره و تصحیح',
            'hazine_safhe_arayi' => 'حق الزحمه صفحه آرایی',
            'hazine_tarahi_jeld' => 'حق الزحمه طراحی جلد',
            'hazine_chap' => 'هزینه چاپ',
            'hazine_elsagh_ghardad' => 'هزینه الصاق قرارداد‌های مربوطه',
            'hazine_manabe_mostanadat' => 'هزینه منابع و مستندات',
            'hazine_majmooe' => 'مجموعه هزینه‌ها',
        ];
    }

    public static function entesharFields()
    {
        return [
            'enteshar_tarikh' => 'تاریخ انتشار',
            'enteshar_tarikhe_shoroo_hamkari' => 'تاریخ شروع همکاری مولف',
            'enteshar_tarikhe_etmam_hamkari' => 'تاریخ اتمام همکاری مولف',
            'enteshar_tarikhe_ersal_be_davari' => 'تاریخ ارسال به داوری',
            'natije_davari' => 'نتیجه داوری',
            'enteshar_tarikhe_ersal_be_virastyar' => 'تاریخ ارسال به ویراستار علمی و ادبی',
            'enteshar_tarikhe_daryaft_salahiat_amniati' => 'تاریخ دریافت صلاحیت امنیتی',
            'enteshar_tarikhe_ersal_entesharat' => 'تاریخ ارسال انتشارات',
            'enteshar_tarikhe_daryaft_shabak' => 'تاریخ دریافت شابک',
            'enteshar_tarikhe_daryaft_fipa' => 'تاریخ دریافت فیپا',
        ];
    }

    public function files()
    {
        return $this->hasMany(BookFiles::class, 'book_id', 'id');
    }

    public function storeFile(UploadedFile $document, $type = 'book_files')
    {
        $filename = "book_{$this->id}_{$type}_{$document->getClientOriginalName()}.{$document->getClientOriginalExtension()}";
        $file = Storage::disk('files')->putFileAs($type, $document, $filename);

        return $file;
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
