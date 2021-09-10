<?php

namespace App\Models\Pages;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SpaPageModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "spa_page_models";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_bottom_text',
        'block2_bold_title_1',
        'block2_thin_title_1',
        'block2_bold_title_2',
        'block2_thin_title_2',
        'mini_first_img',
        'mini_second_img',
        'mini_third_img',
        'big_img',
        'text_bottom',
        'btn_text',
        'block1_title',
        'block1_with_left_img',
        'block2_title',
        'block2_with_right_img',
        'block3_title',
        'block3_with_left_img',
        'block4_bold_title',
        'block4_thin_title',
        'block4_sub_title',
        'block4_description',
        'block4_btn_text',
        'block4_first_img',
        'block4_second_img',

    ];
    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_bottom_text',
        'block2_bold_title_1',
        'block2_thin_title_1',
        'block2_bold_title_2',
        'block2_thin_title_2',
        'text_bottom',
        'btn_text',
        'block1_title',
        'block1_with_left_img',
        'block2_title',
        'block2_with_right_img',
        'block3_title',
        'block3_with_left_img',
        'block4_bold_title',
        'block4_thin_title',
        'block4_sub_title',
        'block4_description',
        'block4_btn_text',
    ];

    public $mediaToUrl = [

        'mini_first_img',
        'mini_second_img',
        'mini_third_img',
        'big_img',
        'block1_with_left_img',
        'block2_with_right_img',
        'block3_with_left_img',
        'block4_first_img',
        'block4_second_img',
    ];
}
