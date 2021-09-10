<?php

namespace App\Nova;

use App\Models\Pages\PrivatPolicyModel;
use Digitalcloud\MultilingualNova\Multilingual;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class PrivatPolicyResource extends Resource
{
    use TabsOnEdit;
    public static $group = 'Pages';
    public static function label(){
        return 'Privat policy';
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = PrivatPolicyModel::class;

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

            Text::make('Заголовок', 'title'),

            Text::make('1 блок заголовок', 'title_block_1')->hideFromIndex(),
            Textarea::make('1 блок писание', 'desc_block_1')->hideFromIndex(),

            Text::make('2 блок заголовок', 'title_block_2')->hideFromIndex(),
            Textarea::make('2 блок писание', 'desc_block_2')->hideFromIndex(),

            Text::make('3 блок заголовок', 'title_block_3')->hideFromIndex(),
            Textarea::make('3 блок писание', 'desc_block_3')->hideFromIndex(),
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
