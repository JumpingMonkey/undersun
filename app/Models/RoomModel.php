<?php

namespace App\Models;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class RoomModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "rooms";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'room_link',
        'room_name',
        'room_area',
        'room_amount_persons',
        'room_bed_size',
        'room_main_image',
        'room_description_title',
        'room_description_text',
        'room_description_first_image',
        'room_description_second_image',
        'room_slider_items',
        'room_features_title',
        'room_features_items',
        'room_feature_big_image',
        'room_feature_small_image',
        'room_options_small_title',
        'room_options_items',
        'room_options_btn_text',
        'room_main_slider_image',
        'room_main_slider_text',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'room_name',
        'room_area',
        'room_amount_persons',
        'room_bed_size',
        'room_description_title',
        'room_description_text',
        'room_slider_items',
        'room_features_title',
        'room_features_items',
        'room_options_small_title',
        'room_options_items',
        'room_options_btn_text',
        'room_main_slider_text',
    ];

    public $mediaToUrl = [
        'room_main_image',
        'room_description_first_image',
        'room_description_second_image',
        'room_feature_big_image',
        'room_feature_small_image',
        'room_main_slider_image',
    ];


    public static function normalizeData($object){

        self::getNormalizedField($object, 'room_name', "value", false, true);

        return $object;

    }


    public static function getFullData(){
        try{

            $rooms = RoomModel::all();

            $content = [];
            foreach ($rooms as $room){
                $translatedData = $room->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
                $content[] = self::normalizeData($translatedData);
            }

            dd($content);

            return $content;

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }
    }





}
