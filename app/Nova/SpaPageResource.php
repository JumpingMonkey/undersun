<?php

namespace App\Nova;

use App\Models\Pages\SpaPageModel;
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

class SpaPageResource extends Resource
{
    use TabsOnEdit;
    public static $group = 'Pages';
    public static function label(){
        return 'Spa';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = SpaPageModel::class;

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

            Tabs::make('Блоки страницы спа', [
                Tab::make('Главный блок', [
                    Text::make('Толстый заголовок', 'hero_title_bold'),
                    Text::make('Тонкий заголовок', 'hero_title_thin'),
                    Text::make('Подпись внизу блока', 'hero_bottom_text')->hideFromIndex(),
                    MediaLibrary::make('Фоновое изображение', 'hero_bg_img')->hideFromIndex(),
                ]),
                Tab::make('Второй блок', [
                    Text::make('Жирный заголовок 1', 'block2_bold_title_1')->hideFromIndex(),
                    Text::make('Тонкий заголовок 1', 'block2_thin_title_1')->hideFromIndex(),
                    Text::make('Жирный заголовок 2', 'block2_bold_title_2')->hideFromIndex(),
                    Text::make('Тонкий заголовок 2', 'block2_thin_title_2')->hideFromIndex(),

                    MediaLibrary::make('Первое мини изображение', 'mini_first_img')->hideFromIndex(),
                    MediaLibrary::make('Второе мини изображение', 'mini_second_img')->hideFromIndex(),
                    MediaLibrary::make('Третье мини изображение', 'mini_third_img')->hideFromIndex(),
                    MediaLibrary::make('Большое изображение', 'big_img')->hideFromIndex(),

                    Textarea::make('Текст под фото', 'text_bottom')->hideFromIndex(),
                    Text::make('Текст кнопки', 'btn_text')->hideFromIndex(),
                    Text::make('Ссылка кнопки', 'block2_btn_link')->hideFromIndex(),
                ]),
                Tab::make('Третий блок', [
                    Flexible::make('Блоки с услугами', 'block3_service_blocks')
                        ->addLayout('Большое фото слева', 'big_img_left', [
                            Text::make('Заголовок блока', 'left_img_block_title')->hideFromIndex(),
                            Flexible::make('Контент блока', 'slider')->hideFromIndex()
                                ->addLayout('Слайд', 'slide', [
                                    MediaLibrary::make('Большое фото', 'big_img'),
                                    Text::make('Заголовок', 'sub_title'),
                                    Textarea::make('Описание', 'description'),
                                    MediaLibrary::make('Маленькое фото', 'small_img'),
                                ])->button('Дабавить слайд'),
                        ])
                        ->addLayout('Большое фото справа', 'big_img_right', [
                            Text::make('Заголовок блока', 'right_img_block_title')->hideFromIndex(),
                            Flexible::make('Контент блока', 'slider')->hideFromIndex()
                                ->addLayout('Слайд', 'slide', [
                                    MediaLibrary::make('Большое фото', 'big_img'),
                                    Text::make('Заголовок', 'sub_title'),
                                    Textarea::make('Описание', 'description'),
                                    MediaLibrary::make('Маленькое фото', 'small_img'),
                                ])->button('Дабавить слайд')
                        ])->button('Добавить услугу')
                ]),
                Tab::make('Четвертый блок', [
                    Text::make('Жирный заголовок 1', 'block4_bold_title')->hideFromIndex(),
                    Text::make('Тонкий заголовок 1', 'block4_thin_title')->hideFromIndex(),
                    Text::make('Подзаголовок', 'block4_sub_title')->hideFromIndex(),
                    Textarea::make('Описание', 'block4_description')->hideFromIndex(),
                    Text::make('Текст кнопки', 'block4_btn_text')->hideFromIndex(),
                    Text::make('Ссылка кнопки', 'block4_btn_link')->hideFromIndex(),
                    MediaLibrary::make('Маленькое изображение', 'block4_first_img')->hideFromIndex(),
                    MediaLibrary::make('Большое изображение', 'block4_second_img')->hideFromIndex(),
                ])
            ]),
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
