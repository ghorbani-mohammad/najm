<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Evaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'evaluations';

    const State_Awli = 5;
    const State_KeyliKhoob = 4;
    const State_Khoob = 3;
    const State_Motevasset = 2;
    const State_Zaeef = 1;

    public function publication(): HasOne
    {
        return $this->hasOne(Publication::class, 'id', 'publication_id');
    }

    public function session(): HasOne
    {
        return $this->hasOne(MizSession::class, 'id', 'session_id');
    }

    public function project(): HasOne
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public static function getAllBazkhordsValues()
    {
        return [
            'State_Awli' => 'عالی',
            'State_KeyliKhoob' => 'خیلی خوب',
            'State_Khoob' => 'خوب',
            'State_Motevasset' => 'متوسط',
            'State_Zaeef' => 'ضعیف',
        ];
    }

    public function getbazkhordMohtavayiAttribute($value)
    {
        switch ($value) {
            case self::State_Awli :
                return 'عالی';
            case self::State_KeyliKhoob :
                return 'خیلی خوب';
            case self::State_Khoob :
                return 'خوب';
            case self::State_Motevasset :
                return 'متوسط';
            case self::State_Zaeef :
                return 'ضعیف';
        }
    }

    public function getbazkhordShekliAttribute($value)
    {
        switch ($value) {
            case self::State_Awli :
                return 'عالی';
            case self::State_KeyliKhoob :
                return 'خیلی خوب';
            case self::State_Khoob :
                return 'خوب';
            case self::State_Motevasset :
                return 'متوسط';
            case self::State_Zaeef :
                return 'ضعیف';
        }
    }

    public function getbazkhordTasirGozariAttribute($value)
    {
        switch ($value) {
            case self::State_Awli :
                return 'عالی';
            case self::State_KeyliKhoob :
                return 'خیلی خوب';
            case self::State_Khoob :
                return 'خوب';
            case self::State_Motevasset :
                return 'متوسط';
            case self::State_Zaeef :
                return 'ضعیف';
        }
    }

    public function getbazkhordkarbordiAttribute($value)
    {
        switch ($value) {
            case self::State_Awli :
                return 'عالی';
            case self::State_KeyliKhoob :
                return 'خیلی خوب';
            case self::State_Khoob :
                return 'خوب';
            case self::State_Motevasset :
                return 'متوسط';
            case self::State_Zaeef :
                return 'ضعیف';
        }
    }

    public function storeFile(UploadedFile $document, $type = 'evaluation_files')
    {
        $filename = "evaluation_{$this->id}_{$type}_{$document->getClientOriginalName()}.{$document->getClientOriginalExtension()}";
        $file = Storage::disk('files')->putFileAs($type, $document, $filename);

        return $file;
    }

    public static function getstat($evaluations)
    {
        $sum = [
            'shekli' => 0,
            'mohtavayi' => 0,
            'karbordi' => 0,
            'tasir_gozari' => 0,
            'kol' => 0
        ];
        $total = 0;
        $average = [
            'shekli' => 0,
            'mohtavayi' => 0,
            'karbordi' => 0,
            'tasir_gozari' => 0,
            'kol' => 0
        ];
        $itemCount = [
            'shekli' => [0, 0, 0, 0, 0],
            'mohtavayi' => [0, 0, 0, 0, 0],
            'karbordi' => [0, 0, 0, 0, 0],
            'tasir_gozari' => [0, 0, 0, 0, 0],
            'kol' => [0, 0, 0, 0, 0]
        ];
        foreach ($evaluations as $evaluation) {
            $total++;
            $sum['shekli'] += $evaluation->getRawOriginal('bazkhord_shekli');
            $sum['mohtavayi'] += $evaluation->getRawOriginal('bazkhord_mohtavayi');
            $sum['karbordi'] += $evaluation->getRawOriginal('bazkhord_karbordi');
            $sum['tasir_gozari'] += $evaluation->getRawOriginal('bazkhord_tasir_gozari');

            $itemCount['shekli'][$evaluation->getRawOriginal('bazkhord_shekli') - 1] += 1;
            $itemCount['mohtavayi'][$evaluation->getRawOriginal('bazkhord_mohtavayi') - 1] += 1;
            $itemCount['karbordi'][$evaluation->getRawOriginal('bazkhord_karbordi') - 1] += 1;
            $itemCount['tasir_gozari'][$evaluation->getRawOriginal('bazkhord_tasir_gozari') - 1] += 1;

            $itemCount['kol'][$evaluation->getRawOriginal('bazkhord_mohtavayi') - 1] += 1;
            $itemCount['kol'][$evaluation->getRawOriginal('bazkhord_shekli') - 1] += 1;
            $itemCount['kol'][$evaluation->getRawOriginal('bazkhord_karbordi') - 1] += 1;
            $itemCount['kol'][$evaluation->getRawOriginal('bazkhord_tasir_gozari') - 1] += 1;
        }
        if ($total > 0) {
            $average['shekli'] = round($sum['shekli'] / $total, 2);
            $average['mohtavayi'] = round($sum['mohtavayi'] / $total, 2);
            $average['karbordi'] = round($sum['karbordi'] / $total, 2);
            $average['tasir_gozari'] = round($sum['tasir_gozari'] / $total, 2);
            $average['kol'] = round(($sum['shekli'] + $sum['mohtavayi'] + $sum['karbordi'] + $sum['tasir_gozari']) / ($total * 4), 2);
        }
        $barChartValues = $itemCount;

        return [
            'average' => $average,
            'barChartValues_shekli' => json_encode($barChartValues['shekli']),
            'barChartValues_mohtavayi' => json_encode($barChartValues['mohtavayi']),
            'barChartValues_karbordi' => json_encode($barChartValues['karbordi']),
            'barChartValues_tasir_gozari' => json_encode($barChartValues['tasir_gozari']),
            'barChartValues_kol' => json_encode($barChartValues['kol']),
        ];
    }

    public function getEvaluationColor($value)
    {
        switch ($value) {
            case 'عالی' :
                return 'rgb(38,246,6)';
            case 'خیلی خوب' :
                return 'rgba(75,139,192,0.76)';
            case 'خوب' :
                return 'rgba(227,111,56,0.73)';
            case 'متوسط' :
                return 'rgb(243,210,43)';
            case 'ضعیف' :
                return 'rgb(128,6,6)';
        }
    }
}
