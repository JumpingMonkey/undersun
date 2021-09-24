<?php

namespace App\Models;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class RestaurantPageModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "restaurant_page_models";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_bottom_text',
        'hero_bg_img',
        'int_bold_title',
        'int_thin_title',
        'int_main_description',
        'int_above_btn_description',
        'int_btn_text',
        'int_btn_link',
        'video',
        'play_video_text',
        'small_under_video_text',
        'large_under_video_text',

        'bar_left_img',
        'bar_left_text',
        'bar_left_desc',
        'bar_center_img',
        'bar_center_text',
        'bar_center_desc',
        'bar_right_img',
        'bar_right_text',
        'bar_right_desc',
        'bar_bg_img',

        'style_bold_title',
        'style_thin_title',
        'style_large_text_under_left_img',
        'style_small_text_under_left_img',
        'style_top_title_above_right_img',
        'style_bottom_title_above_right_img',
        'style2_bold_title',
        'style2_thin_title',
        'style2_sub_title',
        'style2_description',
        'style2_btn_title',
        'style2_btn_link',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_bottom_text',
        'int_bold_title',
        'int_thin_title',
        'int_main_description',
        'int_above_btn_description',
        'int_btn_text',
        'int_btn_link',
        'video',
        'play_video_text',
        'small_under_video_text',
        'large_under_video_text',

        'bar_left_text',
        'bar_left_desc',
        'bar_center_text',
        'bar_center_desc',
        'bar_right_text',
        'bar_right_desc',

        'style_bold_title',
        'style_thin_title',
        'style_large_text_under_left_img',
        'style_small_text_under_left_img',
        'style_top_title_above_right_img',
        'style_bottom_title_above_right_img',
        'style2_bold_title',
        'style2_thin_title',
        'style2_sub_title',
        'style2_description',
        'style2_btn_title',
        'style2_btn_link',
    ];

    public $mediaToUrl = [
        'hero_bg_img',
        'int_first_img',
        'int_second_img',
        'int_third_img',
        'int_fourth_img',

        'bar_left_img',
        'bar_center_img',
        'bar_right_img',
        'bar_bg_img',

        'style_left_img',
        'style_right_img',
        'style2_left_little_img',
        'style2_large_img',
        'gallery'
    ];

    public static function normalizeData($object){


        self::getNormalizedField($object, 'gallery', "img", true, true);

        $data = [];
        $bigdata = [];
        if (!empty($object['gallery'])){
            foreach ($object['gallery'] as $elem){

                foreach ($elem['img'] as $key => $value) {
                    $data[$key . "_" . $value['layout']] =  $value['attributes']['gallery'];
                }
                $data['location_name'] = $elem['location_name'];
                $bigdata[] = $data;
            }

            $object['gallery'] = $bigdata;
        }

        return $object;

    }

    public static function getRestaurantPage(){
        try{

            $data = RestaurantPageModel::firstOrFail();

            $content = self::normalizeData($data->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']));

            return $content;

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }
}
