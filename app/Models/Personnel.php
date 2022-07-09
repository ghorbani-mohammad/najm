<?php


namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Personnel extends Model
{
//    use SoftDeletes;

    const Eshteghal_Nezami_Shaghel = 'nezami_shaghel';
    const Eshteghal_Nezami_Bazneshaste = 'nezami_bazneshaste';
    const Eshteghal_Nokhbe = 'nokhbe';

    const Ashnayi_Hamkaran = 'hamkaran';
    const Ashnayi_Poster = 'poster';
    const Ashnayi_Shabake = 'shabake';
    const Ashnayi_Sazman = 'sazman';

    const Tahsilat_Diplom = 1;
    const Tahsilat_Karshenasi = 2;
    const Tahsilat_KarshenasiArshad = 3;
    const Tahsilat_Doctora = 4;
    const Tahsilat_FoghDoctora = 5;

    const Martial_Single = 'single';
    const Martial_Married = 'married';

    const Status_Active = true;
    const Status_Inactive = false;


    protected $table = 'personnel';
    protected $fillable = ['name', 'parent_name', 'birthday', 'birth_place', 'national_code', 'residence_city',
        'education_level', 'education_field', 'job', 'marital_status', 'home_number', 'mobile_number', 'email',
        'bank_number', 'card_number', 'eshteghal', 'is_heyat_elmi', 'university', 'daraje_elmi', 'hoze_motaleati',
        'nahve_ashnayi', 'home_address', 'office_address', 'office_number', 'hamkari', 'resume_link'];
    protected $appends = ['publication'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'person_id', 'id');
    }

    public function savePhoto($photo)
    {
        $extension = $photo->getClientOriginalExtension();
        $filename = "user_{$this->id}_picture.{$extension}";
        $image = Storage::disk('images')->putFileAs('profile_images', $photo, $filename);
        $this->profile_pic = "/images/$image";
        $this->save();

        return $this;
    }

    public function storeFile($document, $type = 'resume')
    {
        $extension = $document->getClientOriginalExtension();
        $filename = "user_{$this->id}_{$type}.{$extension}";
        $file = Storage::disk('files')->putFileAs($type, $document, $filename);

        return $file;
    }

    public function getEducationTextAttribute()
    {
        switch ($this->education_level) {
            case self::Tahsilat_Diplom :
                return 'دیپلم';
            case self::Tahsilat_Karshenasi :
                return 'کارشناسی';
            case self::Tahsilat_KarshenasiArshad :
                return 'کارشناسی ارشد';
            case self::Tahsilat_Doctora :
                return 'دکترا';
            case self::Tahsilat_FoghDoctora :
                return 'فوق دکترا';
        }
    }

    public function documents()
    {
        return $this->hasMany(Documents::class, 'person_id', 'id');
    }

    public function languages()
    {
        return $this->hasMany(ForeignLanguage::class, 'personnel_id', 'id');
    }

    public function publications(Carbon $startDate = null, Carbon $endDate = null)
    {
        $fields = ['sal', 'fasl', 'hazine_maghalat', 'hazine_type', 'hazine_safhe_arayi', 'hazine_tarahi_jeld',
            'hazine_davaran', 'hazine_nezarat_fani', 'hazine_nezarat_adabi', 'hazine_chap', 'hazine_majmooe',
            'hazine_moshavere', 'hazine_manabe_mostanadat', 'hazine_elsagh_ghardad', 'heyat_sardabir', 'heyat_modir_masool',
            'heyat_nazer_ali', 'heyat_nazer_elmi', 'heyat_nazer_fani', 'heyat_modir_ejrayi', 'heyat_tarrahe_jeld',
            'heyat_virastar_elmi', 'heyat_virastar_adabi', 'heyat_nemoone_khan', 'shomare', 'tarikhe_enteshar',
            'shomare_mosalsal', 'shomaregan', 'title', 'title_en', 'authors', 'keshvar', 'moassese_montasher_konande',
            'tahie_konande', 'ravesh_tahie'];
        $ids = Publication::query();
        foreach ($fields as $field) {
            $ids->orWhere($field, 'like', "%{$this->name}%");
        }
        $hasDate = $startDate || $endDate;
        if ($startDate) {
            $ids->whereNull('tarikhe_enteshar')->orWhere('tarikhe_enteshar', '>=', $startDate);
        }
        if ($endDate) {
            $ids->whereNull('tarikhe_enteshar')->orWhere('tarikhe_enteshar', '<=', $endDate);
        }
        $publications = $ids->get();
        $pub_ids = $publications->pluck('id')->toArray();

        $maghales = Maghale::where('authors', 'like', "%{$this->name}%");
        $maghale_ids = [];
        if ($hasDate) {
            foreach($maghales->get() as $magh){
                $pub = Publication::find($magh->publication_id);
                if ($pub->tarikhe_enteshar >= $startDate){
                    array_push($maghale_ids, $magh->id);
                    continue;
                }
                if ($pub->tarikhe_enteshar <= $endDate){
                    array_push($maghale_ids, $magh->id);
                    continue;
                }
                if (is_null($pub->tarikhe_enteshar)){
                    array_push($maghale_ids, $magh->id);
                    continue;
                }
            }
        }
        else{
            $maghale_ids = $maghales->pluck('id')->toArray();
        }
        $maghales = Maghale::whereIn('id', $maghale_ids)->get();

        $bookFields = ['type', 'title', 'title_en', 'nobate_chap', 'shomaregan', 'shabak', 'fipa', 'tahrir_moallef', 'tahrir_nazer_ali', 'tahrir_nazer_elmi', 'tahrir_nazer_fanni', 'tahrir_virastar', 'tahrir_nemoone_khan', 'tahrir_type_safhe_arayi', 'tahrir_tarrah_jeld', 'hazine_talif', 'hazine_type', 'hazine_safhe_arayi', 'hazine_tarahi_jeld', 'hazine_davaran', 'hazine_nezarat_fani', 'hazine_nezarat_adabi', 'hazine_chap', 'hazine_majmooe', 'hazine_moshavere', 'hazine_manabe_mostanadat', 'hazine_elsagh_ghardad', 'enteshar_tarikhe_shoroo_hamkari', 'enteshar_tarikhe_etmam_hamkari', 'enteshar_tarikhe_ersal_be_davari', 'natije_davari', 'enteshar_tarikhe_ersal_be_virastyar', 'enteshar_tarikhe_daryaft_salahiat_amniati', 'enteshar_tarikhe_ersal_entesharat', 'enteshar_tarikhe_daryaft_shabak', 'enteshar_tarikhe_daryaft_fipa', 'deleted_at', 'created_at', 'updated_at', 'sal', 'enteshar_tarikh', 'hazine_maghalat'];
        $bookIds = Book::query();
        foreach ($bookFields as $field) {
            $bookIds->orwhere($field, 'like', "%{$this->name}%");
        }
        if ($startDate ?? false) {
            $bookIds->whereNull('enteshar_tarikh')->orWhere('enteshar_tarikh', '>=', $startDate);
        }
        if ($endDate ?? false) {
            $bookIds->whereNull('enteshar_tarikh')->orWhere('enteshar_tarikh', '<=', $endDate);
        }
        $books = $bookIds->get();
        $bookIds = $books->pluck('id')->toArray();

        $total = count($bookIds) + count($pub_ids) + count($maghale_ids); 
        return compact('publications', 'books', 'maghales', 'total');
    }

    public function getPublicationAttribute()
    {
        return $this->publications()['total'];
    }
}
