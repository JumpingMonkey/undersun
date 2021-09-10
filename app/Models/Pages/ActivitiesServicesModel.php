<?php

namespace App\Models\Pages;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ActivitiesServicesModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "activities_services_models";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_title_bold',
        'hero_title_thin',
        'hero_bottom_text',
        'hero_bg_img',
        'top_left_img',
        'top_title',
        'top_description',
        'bottom_right_img',
        'bottom_title',
        'sim_bottom_description',
        'title_bold',
        'title_thin',
        'bottom_description',
        'bg_img',
        'small_img',
        '2top_left_img',
        '2top_title',
        '2top_description',
        '2bottom_right_img',
        '2bottom_title',
        '2bottom_description',
    ];
    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title_bold',
        'hero_title_thin',
        'hero_bottom_text',
        'top_title',
        'top_description',
        'bottom_title',
        'sim_bottom_description',
        'title_bold',
        'title_thin',
        'bottom_description',
        '2top_title',
        '2top_description',
        '2bottom_title',
        '2bottom_description',
    ];
}
