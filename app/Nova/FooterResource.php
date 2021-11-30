<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class FooterResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Parts\FooterModel::class;

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

    public static $group = 'Pages parts';

    public static function label()
    {
        return 'Footer';
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
            Multilingual::make('Language'),
            ID::make(__('ID'), 'id')->sortable(),

            MediaLibrary::make('Логотип', 'footer_logo'),

            Flexible::make('Навигация', 'footer_navigation')
                ->addLayout('Пункт меню', 'navigation_item', [
                    Text::make('Название пункта', 'name'),

                    Select::make('Ссылка', 'link')->options(
                        [
                            '/rooms' => '/rooms',
                            '/spa' => '/spa',
                            '/restaurant' => '/restaurant',
                            '/leisure' => '/leisure',
                            '/privacy-policy' => '/privacy-policy',
                            '/' => '/main',
                        ]
                    )
                        ->displayUsingLabels()
                        ->rules('required'),
                ])->button('Добавить пункт'),

            Text::make('Адрес', 'footer_address_text')->hideFromIndex(),
            Text::make('Ссылка на карту', 'footer_address_map')->hideFromIndex(),
            Text::make('Телефон', 'footer_tel')->hideFromIndex(),

            Flexible::make('Социальные сети', 'footer_social')
                ->addLayout('Соц. сеть', 'social', [

                    MediaLibrary::make('Изображение', 'social_image'),
                    Text::make('Ссылка', 'social_link'),

                ])->button('Добавить соц. сеть'),


            Text::make('Текст на кнопке для бронирования', 'booking_btn_text'),

            Text::make('Текст блока с авторскими правами', 'footer_copyright')->hideFromIndex(),
            Text::make('Текст ссылки на публичную оферту', 'footer_public_offer_text')->hideFromIndex(),
            MediaLibrary::make('Файл договора публичной оферты', 'footer_public_offer_file')->hideFromIndex(),



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
