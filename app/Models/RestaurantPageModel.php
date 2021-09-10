<?php

namespace App\Models;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'int_bold_title',
        'int_thin_title',
        'int_main_description',
        'int_above_btn_description',
        'int_btn_text',
        'int_btn_link',
        'play_video_text',
        'small_under_video_text',
        'large_under_video_text',
        'bar_left_text',
        'bar_center_text',
        'bar_center_desc',
        'bar_right_text',
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
        'play_video_text',
        'small_under_video_text',
        'large_under_video_text',
        'bar_left_text',
        'bar_center_text',
        'bar_center_desc',
        'bar_right_text',
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
        'int_first_img',
        'int_second_img',
        'int_third_img',
        'int_fourth_img',
        'video',
        'bar_img_bg',
        'style_left_img',
        'style_right_img',
        'style2_left_little_img',
        'style2_large_img',
        'gallery'
    ];
}
