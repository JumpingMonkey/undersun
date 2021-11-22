<?php

namespace App\Nova;

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

class RoomResource extends Resource
{

    use TabsOnEdit;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\RoomModel::class;

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

    public static $group = 'Objects';

    public static function label()
    {
        return 'Rooms';
    }

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

            Text::make('Идентификатор комнаты (для ссылки)', 'room_link')
                ->hideFromIndex()
                ->rules('required')
                ->creationRules('unique:rooms'),

            Tabs::make('Блоки страницы конкретной комнаты', [

                Tab::make('Главный блок', [

                    Flexible::make('Название комнаты', 'room_name')
                        ->addLayout('Толстый текст', 'bold_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->button('Добавить линию'),


                    Text::make('Площадь комнаты с единицами изм.', 'room_area')->hideFromIndex(),

                    Text::make('Количество человек в комнате', 'room_amount_persons')->hideFromIndex(),

                    Text::make('Размер кровати', 'room_bed_size')->hideFromIndex(),

                    Text::make('Стоимость номера', 'room_price')->hideFromIndex(),

                    Text::make('Префикс стоимости номера', 'prefix_room_price')->hideFromIndex(),

                    MediaLibrary::make('Фоновое изображение', 'room_main_image')->hideFromIndex(),

                ]),

                Tab::make('Блок с описанием', [

                    Flexible::make('Заголовок описания', 'room_description_title')
                        ->addLayout('Толстый текст', 'bold_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->button('Добавить линию'),


                    Textarea::make('Текст описания', 'room_description_text')->hideFromIndex(),

                    MediaLibrary::make('Большое изображение', 'room_description_first_image')->hideFromIndex(),
                    MediaLibrary::make('Малое изображение', 'room_description_second_image')->hideFromIndex(),


                ]),


                Tab::make('Блок со слайдером', [

                    Flexible::make('Слайдер', 'room_slider_items')
                        ->addLayout('Вкладка', 'tab', [

                            Text::make('Заголовок вкладки', 'tab_title')->hideFromIndex(),

                            Flexible::make('Изображения', 'tab_images')
                                ->addLayout('Изображение', 'image', [
                                    MediaLibrary::make('Изображение', 'value')->hideFromIndex(),
                                ])
                                ->button('Добавить изображение'),
                        ])
                        ->button('Добавить вкладку'),

                ]),

                Tab::make('Блок с особенностями', [

                    Text::make('Заголовок', 'room_features_title')->hideFromIndex(),

                    Flexible::make('Особенности', 'room_features_items')
                        ->addLayout('Особенность', 'feature', [
                            Text::make('Заголовок особенности', 'feature_title'),

                            Flexible::make('Список', 'feature_items')
                                ->addLayout('Пункт', 'item', [
                                    Text::make('Текст', 'value'),
                                ])
                                ->button('Добавить пункт'),

                        ])
                        ->button('Добавить особенность'),

                    MediaLibrary::make('Большое изображение', 'room_feature_big_image')->hideFromIndex(),
                    MediaLibrary::make('Малое изображение', 'room_feature_small_image')->hideFromIndex(),

                ]),

                Tab::make('Блок с видео', [
                    Text::make('Видео(ссылка)', 'video')->hideFromIndex(),
                    Text::make('Текст запуска видео', 'play_video_text')->hideFromIndex(),
                    Textarea::make('Маленький текст под видео', 'small_under_video_text')->hideFromIndex(),
                    Textarea::make('Болльшой текст под видео', 'large_under_video_text')->hideFromIndex()
                ]),

                Tab::make('Блок с опциями', [

                    Text::make('Малый заголовок', 'room_options_small_title')->hideFromIndex(),

                    Flexible::make('Слайды', 'room_options_items')
                        ->addLayout('Слайд', 'slide', [
                            Text::make('Текст', 'slide_text')->hideFromIndex(),
                            MediaLibrary::make('Большое изображение', 'slide_big_image')->hideFromIndex(),
                            MediaLibrary::make('Малое изображение', 'slide_small_image')->hideFromIndex(),
                        ])
                        ->button('Добавить слайд'),

                    Text::make('Текст на кнопке "Больше"', 'room_options_btn_text')->hideFromIndex(),
                ]),

                Tab::make('Для других страниц', [

                    MediaLibrary::make('Изображение для превью', 'room_preview_image')->hideFromIndex(),
                    Text::make('Название комнаты в одну строку', 'room_name_full')->hideFromIndex(),

                ]),
            ])->withToolbar(),
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
