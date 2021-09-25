<?php

namespace App\Models;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class RoomModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "rooms";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'room_link',
        'room_name',
        'room_area',
        'room_amount_persons',
        'room_bed_size',
        'room_price',
        'prefix_room_price',
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
        'room_preview_image',
        'room_name_full',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'room_name',
        'room_area',
        'room_amount_persons',
        'room_bed_size',
        'prefix_room_price',
        'room_description_title',
        'room_description_text',
        'room_slider_items',
        'room_features_title',
        'room_features_items',
        'room_options_small_title',
        'room_options_items',
        'room_options_btn_text',
        'room_name_full',
    ];

    public $mediaToUrl = [
        'room_main_image',
        'room_description_first_image',
        'room_description_second_image',
        'room_feature_big_image',
        'room_feature_small_image',
        'room_preview_image',
        'room_options_items',
        'room_slider_items',
        'tab_images',
        'slide_big_image',
        'slide_small_image',
        'value'
    ];

    public static function normalizeData($object){

        self::getNormalizedField($object, 'room_name', "value", false, true);
        self::getNormalizedField($object, 'room_description_title', "value", false, true);
        self::getNormalizedField($object, 'room_slider_items', "value", true, false);
        self::getNormalizedField($object, 'room_features_items', "value", true, false);
        self::getNormalizedField($object, 'room_options_items', "value", true, false);

        if (array_key_exists('room_slider_items', $object)){
            foreach ($object['room_slider_items'] as $key => $item){
                $newImages = [];
                foreach ($item['tab_images'] as $image){
                    $newImages[] = $image['attributes']['value'];
                }
                $object['room_slider_items'][$key]['tab_images'] = $newImages;
            }
        }

        if (array_key_exists('room_features_items', $object)){
            foreach ($object['room_features_items'] as $key => $item){
                $newFeatures = [];
                foreach ($item['feature_items'] as $image){
                    $newFeatures[] = $image['attributes']['value'];
                }
                $object['room_features_items'][$key]['feature_items'] = $newFeatures;
            }
        }

        return $object;

    }


    public static function getAllRooms($columns = []){
        try{

            $query = RoomModel::query();

            if ($columns){
                $query->addSelect($columns);
            }

            $rooms = $query->get();

            $content = [];

            foreach ($rooms as $room){
                $translatedData = $room->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
                $content[] = self::normalizeData($translatedData);
            }
            return $content;
        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }
    }

    public static function getCurrentRoom(RoomModel $room){
        try{
            $translatedData = $room->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at', 'room_preview_image', 'room_name_full']);
            $content = self::normalizeData($translatedData);
            return $content;
        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }
    }

}
