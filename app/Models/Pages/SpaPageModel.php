<?php

namespace App\Models\Pages;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class SpaPageModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "spa_page_models";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title_bold',
        'hero_title_thin',
        'hero_bottom_text',
        'hero_bg_img',
        'block2_bold_title_1',
        'block2_thin_title_1',
        'block2_bold_title_2',
        'block2_thin_title_2',
        'mini_first_img',
        'mini_second_img',
        'mini_third_img',
        'big_img',
        'small_img',
        'text_bottom',
        'btn_text',
        'block2_btn_link',

        'block3_service_blocks',

        'block4_bold_title',
        'block4_thin_title',
        'block4_sub_title',
        'block4_description',
        'block4_btn_text',
        'block4_btn_link',
        'block4_first_img',
        'block4_second_img',

    ];
    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title_bold',
        'hero_title_thin',
        'hero_bottom_text',
        'block2_bold_title_1',
        'block2_thin_title_1',
        'block2_bold_title_2',
        'block2_thin_title_2',
        'text_bottom',
        'block2_btn_link',
        'btn_text',
        'block4_bold_title',
        'block4_thin_title',
        'block4_sub_title',
        'block4_description',
        'block4_btn_text',
        'block4_btn_link',
        'block3_service_blocks'
    ];

    public $mediaToUrl = [
        'hero_bg_img',
        'mini_first_img',
        'mini_second_img',
        'mini_third_img',
        'big_img',
        'small_img',
        'block1_with_left_img',
        'block2_with_right_img',
        'block3_with_left_img',
        'block4_first_img',
        'block4_second_img',
        'block3_service_blocks',
        'big_img_left',
        'small_img_right',
        'big_img_right',
        'small_img_left',
    ];

    public static function normalizeData($object){

        self::getNormalizedField($object, 'block3_service_blocks', "big_img_left", true, false);

        $bigdata = [];
        if (!empty($object['block3_service_blocks'])){
            foreach ($object['block3_service_blocks'] as $mainKey => $elem){
                $data = [];
                foreach ($elem['slider'] as $key => $value) {
                    $data[$key . "_" . $value['layout']] =  $value['attributes'];
                }
                if (isset($elem['left_img_block_title'])){
                    $data['left_img_block_title'] = $elem['left_img_block_title'];
                    $flag = 'left';
                } elseif (isset($elem['right_img_block_title'])){
                    $data['right_img_block_title'] = $elem['right_img_block_title'];
                    $flag = 'right';
                }

                $bigdata[$mainKey . '_' .$flag] = $data;
            }

            $object['block3_service_blocks'] = $bigdata;
        }

        return $object;

    }

    public static function getSpaPage(){
        try{

            $data = SpaPageModel::firstOrFail();

            $content = self::normalizeData($data->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']));

            return $content;

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }
}
