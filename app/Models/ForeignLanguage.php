<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignLanguage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'foreign_language';

    const State_Awli = 4;
    const State_Khoob = 3;
    const State_Motevasset = 2;
    const State_Zaeef = 1;

    public function person()
    {
        return $this->hasOne(Personnel::class, 'id', 'personnel_id');
    }

    public function getProperStateText($value)
    {
        switch ($value) {
            case self::State_Awli :
                return 'عالی';
            case self::State_Khoob :
                return 'خوب';
            case self::State_Motevasset :
                return 'متوسط';
            case self::State_Zaeef :
                return 'ضعیف';
        }
    }

    public function getReadingAttribute($value)
    {
        return $this->getProperStateText($value);
    }

    public function getListeningAttribute($value)
    {
        return $this->getProperStateText($value);
    }

    public function getWritingAttribute($value)
    {
        return $this->getProperStateText($value);
    }

    public function getSpeakingAttribute($value)
    {
        return $this->getProperStateText($value);
    }
}
