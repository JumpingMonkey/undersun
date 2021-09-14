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
        'title_block_1',
        'desc_block_1',
        'title_block_2',
        'desc_block_2',
        'title_block_3',
        'desc_block_3'
    ];
    public $translatable = [
        'seo_title',
        'meta_description',
        'title',
        'title_block_1',
        'desc_block_1',
        'title_block_2',
        'desc_block_2',
        'title_block_3',
        'desc_block_3'
    ];

    public static function normalizeData($object){

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
