<?php

namespace App\Models\Pages;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class PrivatPolicyModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "privat_policy_models";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'title',
        'blocks'

    ];
    public $translatable = [
        'seo_title',
        'meta_description',
        'title',
        'blocks'

    ];

    public static function normalizeData($object){

        self::getNormalizedField($object, 'blocks', "desc_block", true, true);

        return $object;

    }

    public static function getPolicyPage(){
        try{

            $data = PrivatPolicyModel::firstOrFail();

            $content = self::normalizeData($data->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']));

            return $content;

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

}
