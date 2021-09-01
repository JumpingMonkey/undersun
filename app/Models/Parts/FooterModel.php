<?php

namespace App\Models\Parts;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FooterModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "footers";

    protected $fillable = [
        'footer_logo',
        'footer_navigation',
        'footer_address_text',
        'footer_address_map',
        'footer_tel',
        'footer_social',
        'footer_copyright',
        'footer_public_offer_text',
        'footer_public_offer_file',
        'booking_btn_text'
    ];

    public $translatable = [
        'footer_navigation',
        'footer_address_text',
        'footer_copyright',
        'footer_public_offer_text',
        'footer_public_offer_file',
        'booking_btn_text'
    ];

    public $mediaToUrl = [
        'footer_logo',
        'footer_social',
        'social_image',
        'footer_public_offer_file'
    ];

    public $fromStrToJson = [
        'footer_social'
    ];

    public static function getFooter()
    {
        $footer = self::firstOrFail()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        self::getNormalizedField($footer, 'footer_navigation', "value", true, false);
        self::getNormalizedField($footer, 'footer_social', "value", true, false);

        return $footer;
    }
}
