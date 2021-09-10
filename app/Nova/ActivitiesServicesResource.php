<?php

namespace App\Nova;

use App\Models\Pages\ActivitiesServicesModel;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class ActivitiesServicesResource extends Resource
{
    use TabsOnEdit;
    public static $group = 'Pages';
    public static function label(){
        return 'Activities and Services';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ActivitiesServicesModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Multilingual::make('Language'),

            Text::make('SEO-заголовок', 'seo_title')->hideFromIndex(),
            Textarea::make('Мета-описание', 'meta_description')->hideFromIndex(),

            Tabs::make('Блоки страницы ресторана', [
                Tab::make('Главный блок', [
                    Text::make('Заголовок: Жирный текст', 'hero_title_bold'),
                    Text::make('Заголовок: Тонкий текст', 'hero_title_thin'),
                    Text::make('Подпись внизу блока', 'hero_bottom_text')->hideFromIndex(),
                    MediaLibrary::make('Фоновое изображение', 'hero_bg_img')->hideFromIndex()
                ]),
                Tab::make('Блок симметрия', [
                    MediaLibrary::make('Изображение слева(верх. блок)', 'top_left_img')->hideFromIndex(),
                    Text::make('Заголовок(верх. блок)', 'top_title')->hideFromIndex(),
                    Textarea::make('Описание(верх. блок)', 'top_description')->hideFromIndex(),

                    MediaLibrary::make('Изображение справа(нижн. блок)', 'bottom_right_img')->hideFromIndex(),
                    Text::make('Заголовок(нижн. блок)', 'bottom_title')->hideFromIndex(),
                    Textarea::make('Описание(нижн. блок)', 'sim_bottom_description')->hideFromIndex(),
                ]),
                Tab::make('Блок с большим фото', [
                    Text::make('Заголовок: Жирный текст', 'title_bold')->hideFromIndex(),
                    Text::make('Заголовок: Тонкий текст', 'title_thin')->hideFromIndex(),
                    Textarea::make('Описание внизу', 'bottom_description')->hideFromIndex(),
                    MediaLibrary::make('Фоновое изображение', 'bg_img')->hideFromIndex(),
                    MediaLibrary::make('Маленькое изображение', 'small_img')->hideFromIndex(),
                ]),
                Tab::make('Блок симметрия 2', [
                    MediaLibrary::make('Изображение слева(верх. блок)', '2top_left_img')->hideFromIndex(),
                    Text::make('Заголовок(верх. блок)', '2top_title')->hideFromIndex(),
                    Textarea::make('Описание(верх. блок)', '2top_description')->hideFromIndex(),

                    MediaLibrary::make('Изображение справа(нижн. блок)', '2bottom_right_img')->hideFromIndex(),
                    Text::make('Заголовок(нижн. блок)', '2bottom_title')->hideFromIndex(),
                    Textarea::make('Описание(нижн. блок)', '2bottom_description')->hideFromIndex(),
                ]),
            ])

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
