<?php

namespace App\Models\Pages;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class AllRoomsPageModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "all_rooms_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'area_label',
        'bed_label',
        'view_label',
        'options_label',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'area_label',
        'bed_label',
        'view_label',
        'options_label',
    ];

    public static function getAllRoomsPage(){
        try{

            $data = AllRoomsPageModel::firstOrFail();

            $content = $data->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

            return $content;

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

}
