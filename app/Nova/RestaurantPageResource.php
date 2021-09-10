<?php

namespace App\Nova;

use App\Models\RestaurantPageModel;
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
use Whitecube\NovaFlexibleContent\Flexible;

class RestaurantPageResource extends Resource
{
    use TabsOnEdit;
    public static $group = 'Pages';
    public static function label(){
        return 'Restaurant';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = RestaurantPageModel::class;

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
                    Text::make('Заголовок', 'hero_title'),
                    Text::make('Подпись внизу блока', 'hero_bottom_text')->hideFromIndex(),
                    MediaLibrary::make('Фоновое изображение', 'hero_bg_img')->hideFromIndex(),
                ]),
                Tab::make('Блок интуиция', [
                    Text::make('Жирный заголовок', 'int_bold_title')->hideFromIndex(),
                    Text::make('Тонкий заголовок', 'int_thin_title')->hideFromIndex(),
                    MediaLibrary::make('Первое изображение', 'int_first_img')->hideFromIndex(),
                    MediaLibrary::make('Второе изображение', 'int_second_img')->hideFromIndex(),
                    MediaLibrary::make('Третье изображение', 'int_third_img')->hideFromIndex(),
                    MediaLibrary::make('Четвертое изображение', 'int_fourth_img')->hideFromIndex(),
                    Textarea::make('Основное описание', 'int_main_description')->hideFromIndex(),
                    Textarea::make('Описание над кнопкой', 'int_above_btn_description')->hideFromIndex(),
                    Text::make('Текст кнопки', 'int_btn_text')->hideFromIndex(),
                    Text::make('Ссылка кнопки', 'int_btn_link')->hideFromIndex()

                ]),
                Tab::make('Блок с видео', [
                    MediaLibrary::make('Видео', 'video')->hideFromIndex(),
                    Text::make('Текст запуска видео', 'play_video_text')->hideFromIndex(),
                    Textarea::make('Маленький текст под видео', 'small_under_video_text')->hideFromIndex(),
                    Textarea::make('Болльшой текст под видео', 'large_under_video_text')->hideFromIndex()
                ]),
                Tab::make('Блок про бар', [
                    MediaLibrary::make('Фото бара', 'bar_img_bg')->hideFromIndex(),
                    Text::make('Левый текст', 'bar_left_text')->hideFromIndex(),
                    Text::make('Центральный текст', 'bar_center_text')->hideFromIndex(),
                    Text::make('Описание под центральным текстом', 'bar_center_desc')->hideFromIndex(),
                    Text::make('Правый текст', 'bar_right_text')->hideFromIndex(),
                ]),
                Tab::make('Блок про отличительный стиль', [
                    Text::make('Жирный заголовок', 'style_bold_title')->hideFromIndex(),
                    Text::make('Тонкий заголовок', 'style_thin_title')->hideFromIndex(),
                    MediaLibrary::make('Левое фото', 'style_left_img')->hideFromIndex(),
                    Textarea::make('Большое текст под левым фото', 'style_large_text_under_left_img')->hideFromIndex(),
                    Textarea::make('Маленький текст под левым фото', 'style_small_text_under_left_img')->hideFromIndex(),
                    Text::make('Верхний заголовок над правым фото', 'style_top_title_above_right_img')->hideFromIndex(),
                    Text::make('Нижний заголовок над правым фото', 'style_bottom_title_above_right_img')->hideFromIndex(),
                    MediaLibrary::make('Правое фото', 'style_right_img')->hideFromIndex(),
                ]),
                Tab::make('Фотогалерея', [
                    Flexible::make('Фото', 'gallery')
                        ->addLayout('Одна локация', 'one_location', [
                            Text::make('Название локации', 'location_name'),
                            Flexible::make('Одно фото', 'img')
                                ->addLayout('Одно фото', 'img', [
                                    MediaLibrary::make('Фото', 'gallery'),
                                ])


                        ])
                ]),
                Tab::make('Блок про отличительный стиль 2', [
                    Text::make('Жирный заголовок', 'style2_bold_title')->hideFromIndex(),
                    Text::make('Тонкий заголовок', 'style2_thin_title')->hideFromIndex(),
                    MediaLibrary::make('Левое маленькое фото', 'style2_left_little_img')->hideFromIndex(),
                    Text::make('Подзаголовок', 'style2_sub_title')->hideFromIndex(),
                    Textarea::make('Описание', 'style2_description')->hideFromIndex(),
                    Text::make('Текст кнопки', 'style2_btn_title')->hideFromIndex(),
                    Text::make('Ссылка кнопки', 'style2_btn_link')->hideFromIndex(),
                    MediaLibrary::make('Большое фото', 'style2_large_img')->hideFromIndex(),
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
