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

class MainPageResource extends Resource
{

    use TabsOnEdit;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Pages\MainPageModel::class;

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

    public static $group = 'Pages';

    public static function label()
    {
        return 'Main';
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

            Tabs::make('Блоки главной страницы', [
                Tab::make('Главный блок', [

                    Flexible::make('Заголовок', 'hero_title')
                        ->addLayout('Толстый текст', 'bold_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->button('Добавить линию текста'),

                    Textarea::make('Текст возле заголовка', 'hero_text')->hideFromIndex(),

                    Flexible::make('Изображения для слайдера', 'hero_slider')
                        ->addLayout('Слайд', 'slide', [
                            MediaLibrary::make('Изображение', 'value')->hideFromIndex(),
                        ])
                        ->button('Добавить слайд'),

                    MediaLibrary::make('Изображение кнопки "Связаться с нами"', 'hero_contacts_us')->hideFromIndex(),


                ]),

                Tab::make('Блок "Добро пожаловать"', [
                    Text::make('Малый заголовок', 'introduce_small_title')->hideFromIndex(),

                    Flexible::make('Большой заголовок', 'introduce_big_title')
                        ->addLayout('Толстый текст', 'bold_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->button('Добавить линию'),

                    Textarea::make('Блок с текстом', 'introduce_text')->hideFromIndex(),

                ]),


                Tab::make('Блок с выгодой', [

                    Text::make('Заголовок', 'benefits_title')->hideFromIndex(),

                    MediaLibrary::make('Первое изображение', 'benefits_first_image')->hideFromIndex(),
                    MediaLibrary::make('Второе изображение', 'benefits_second_image')->hideFromIndex(),
                    MediaLibrary::make('Третье изображение', 'benefits_third_image')->hideFromIndex(),


                    Flexible::make('Описание выгодных предложений', 'benefits_items')
                        ->addLayout('Предложение', 'benefit', [
                            Text::make('Заголовок предложения', 'benefit_title')->hideFromIndex(),
                            Textarea::make('Текст предложения', 'benefit_text')->hideFromIndex(),
                        ])
                        ->limit(3)
                        ->button('Добавить предложение'),

                ]),

                Tab::make('Блок с комнатами', [

                    Flexible::make('Заголовок', 'rooms_title')
                        ->addLayout('Толстый текст', 'bold_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->button('Добавить линию'),

                    Textarea::make('Блок с текстом', 'rooms_text')->hideFromIndex(),

                    Text::make('Текст на кнопке "Больше"', 'rooms_more_btn_text')->hideFromIndex(),
                ]),

                Tab::make('Блок с услугами', [

                    Text::make('Малый заголовок', 'services_small_title')->hideFromIndex(),

                    Flexible::make('Слайды', 'services_slides')
                        ->addLayout('Слайд', 'slide', [
                            Text::make('Текст', 'slide_text')->hideFromIndex(),
                            MediaLibrary::make('Большое изображение', 'slide_big_image')->hideFromIndex(),
                            MediaLibrary::make('Малое изображение', 'slide_small_image')->hideFromIndex(),
                        ])
                        ->button('Добавить слайд'),

                    Text::make('Текст на кнопке "Больше"', 'services_more_btn_text')->hideFromIndex(),
                ]),

                Tab::make('SPA', [

                    Flexible::make('Заголовок', 'spa_title')
                        ->addLayout('Толстый текст', 'bold_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->button('Добавить линию'),

                    Textarea::make('Блок с текстом', 'spa_text')->hideFromIndex(),

                    Text::make('Текст на кнопке "Больше"', 'spa_more_btn_text')->hideFromIndex(),

                    MediaLibrary::make('Фоновое изображение', 'spa_main_image')->hideFromIndex(),
                    MediaLibrary::make('Малое изображение', 'spa_small_image')->hideFromIndex(),

                ]),
                Tab::make('Блок "Сделано для"', [

                    Flexible::make('Заголовок', 'made_title')
                        ->addLayout('Толстый текст', 'bold_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'value'),
                        ])
                        ->button('Добавить линию'),

                    MediaLibrary::make('Левое изображение', 'made_left_image')->hideFromIndex(),
                    MediaLibrary::make('Центральное большое изображение', 'made_center_big_image')->hideFromIndex(),
                    MediaLibrary::make('Центральное малое изображение', 'made_center_small_image')->hideFromIndex(),
                    MediaLibrary::make('Правое изображение', 'made_right_image')->hideFromIndex(),
                    Text::make('Текст на кнопке "Больше"', 'made_more_btn_text')->hideFromIndex(),
                ])
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
