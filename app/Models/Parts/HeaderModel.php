<?php

namespace App\Models\Parts;

use Anrail\NovaMediaLibraryTools\HasMediaToUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeaderModel extends Model
{
    use HasFactory, HasTranslations, HasMediaToUrl;

    protected $table = "headers";

    public $links = ['/rooms', '/spa', '/restaurant', '/gallery', '/leisure', '/contacts'];

    protected $fillable = [
        'header_logo',
        'header_navigation',
    ];

    public $translatable = [
        'header_navigation',
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
