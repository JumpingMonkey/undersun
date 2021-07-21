<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;

class LocaleMiddleware
{
    public static $mainLanguage = 'ua'; //основной язык, который не должен отображаться в URl
    public static $uaLocale = 'uk';

    public static $languages = ['en', 'ru', 'ua']; // Указываем, какие языки будем использовать в приложении.



    /*
     * Проверяет наличие корректной метки языка в текущем URL через get параметр lang
     * Возвращает метку или значеие null, если нет метки
     */
    public static function getLocale()
    {
        if (request()->filled('lang') && in_array(request()->lang, self::$languages)) {
            if (request()->lang != self::$mainLanguage){
                return request()->lang;
            }
        }
        return null;
    }

    /*
    * Устанавливает язык приложения в зависимости от метки языка из URL
    */
    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        if ($locale){
            App::setLocale($locale);
        } else { //если метки нет - устанавливаем основной язык $mainLanguage
            App::setLocale(self::$uaLocale);
        }

        return $next($request); //пропускаем дальше - передаем в следующий посредник
    }
}
