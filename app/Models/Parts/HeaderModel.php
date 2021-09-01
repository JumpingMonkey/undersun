<?php

namespace App\Models\Parts;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeaderModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "headers";

    public $links = ['/rooms', '/spa', '/restaurant', '/gallery', '/leisure', '/contacts'];

    protected $fillable = [
        'header_logo',
        'header_navigation',
        'booking_btn_text'
    ];

    public $translatable = [
        'header_navigation',
        'booking_btn_text'
    ];

    public $mediaToUrl = [
        'header_logo',
    ];

    public static function getHeader(){

        $header = self::firstOrFail()->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);

        self::getNormalizedField($header, 'header_navigation', "name", true, false);

        return $header;
    }

}
