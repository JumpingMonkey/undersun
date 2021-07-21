<?php

namespace App\Models;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RoomModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "rooms";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'hero_main_image',
        'hero_slider',
        'introduce_small_title',
        'introduce_big_title',
        'introduce_text',
        'introduce_main_image',
        'benefits_title',
        'benefits_first_image',
        'benefits_second_image',
        'benefits_third_image',
        'benefits_items',
        'rooms_title',
        'rooms_text',
        'rooms_more_btn_text',
        'services_small_title',
        'services_small_image',
        'services_slides',
        'services_more_btn_text',
        'spa_title',
        'spa_text',
        'spa_main_image',
        'spa_small_image',
        'spa_more_btn_text',
        'made_title',
        'made_left_image',
        'made_center_big_image',
        'made_center_small_image',
        'made_right_image',
        'made_more_btn_text',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'introduce_small_title',
        'introduce_big_title',
        'introduce_text',
        'benefits_title',
        'benefits_items',
        'rooms_title',
        'rooms_text',
        'rooms_more_btn_text',
        'services_small_title',
        'services_slides',
        'services_more_btn_text',
        'spa_title',
        'spa_text',
        'spa_more_btn_text',
        'made_title',
        'made_more_btn_text',
    ];

    public $mediaToUrl = [
        'hero_main_image',
        'hero_slider',
        'introduce_main_image',
        'benefits_first_image',
        'benefits_second_image',
        'benefits_third_image',
        'services_small_image',
        'services_slides',
        'spa_main_image',
        'spa_small_image',
        'made_left_image',
        'made_center_big_image',
        'made_center_small_image',
        'made_right_image',
    ];
}
