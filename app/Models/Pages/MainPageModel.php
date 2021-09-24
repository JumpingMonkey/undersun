<?php

namespace App\Models\Pages;

use App\Traits\TranslateAndConvertMediaUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Translatable\HasTranslations;

class MainPageModel extends Model
{
    use HasFactory, HasTranslations, TranslateAndConvertMediaUrl;

    protected $table = "main_pages";

    protected $fillable = [
        'seo_title',
        'meta_description',
        'hero_bg_img',
        'hero_title',
        'hero_text',
        'hero_slider',
        'hero_contacts_us',
        'hero_contacts_us_link',
        'introduce_small_title',
        'introduce_big_title',
        'introduce_text',
        'benefits_title',
        'benefits_first_image',
        'benefits_second_image',
        'benefits_third_image',
        'benefits_items',
        'rooms_title',
        'rooms_text',
        'rooms_more_btn_text',
        'services_small_title',
        'services_slides',
        'services_more_btn_text',
        'spa_title',
        'spa_text',
        'spa_main_image',
        'spa_small_image',
        'spa_more_btn_text',
        'made_title',
        'made_left_image',
        'made_center_big_image',
        'made_center_small_image',
        'made_right_image',
        'made_more_btn_text',
    ];

    public $translatable = [
        'seo_title',
        'meta_description',
        'hero_title',
        'hero_text',
        'hero_contacts_us',
        'introduce_small_title',
        'introduce_big_title',
        'introduce_text',
        'benefits_title',
        'benefits_items',
        'rooms_title',
        'rooms_text',
        'rooms_more_btn_text',
        'services_small_title',
        'services_slides',
        'services_more_btn_text',
        'spa_title',
        'spa_text',
        'spa_more_btn_text',
        'made_title',
        'made_more_btn_text',
    ];

    public $mediaToUrl = [
        'hero_bg_img',
        'hero_slider',
        'value',
        'hero_contacts_us',
        'introduce_main_image',
        'benefits_first_image',
        'benefits_second_image',
        'benefits_third_image',
        'services_small_image',
        'services_slides',
        'slide_big_image',
        'slide_small_image',
        'slide_image',
        'spa_main_image',
        'spa_small_image',
        'made_left_image',
        'made_center_big_image',
        'made_center_small_image',
        'made_right_image',
    ];


//    public function getMembersDataAttribute()
//    {
//        return json_decode($this["team_members"]);
//    }
//
//    public function getMembers()
//    {
//        $memberIds = [];
//        $membersData = [];
//        $membersObject = $this["members_data"];
//        foreach ($membersObject as $member) {
//            $memberIds[] = $member->attributes->member;
//        }
//        $members = MemberModel::whereIn('id', $memberIds)->get();
//        foreach ($membersObject as $key => $member) {
//            $membersData[] = $members->first(function ($value) use ($member) {
//                return $value->id === (int)$member->attributes->member;
//            })
//                ->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']);
//        }
//        $this->team_members = $membersData;
//    }



    public static function normalizeData($object){

            self::getNormalizedField($object, 'hero_title', "value", false, true);
            self::getNormalizedField($object, 'hero_slider', "value", false, false);
            self::getNormalizedField($object, 'introduce_big_title', "value", false, true);
            self::getNormalizedField($object, 'benefits_items', "value", true, false);
            self::getNormalizedField($object, 'rooms_title', "value", false, true);
            self::getNormalizedField($object, 'services_slides', "value", true, false);
            self::getNormalizedField($object, 'spa_title', "value", false, true);
            self::getNormalizedField($object, 'made_title', "value", false, true);

        return $object;

    }

    public static function getMainPage(){
        try{

            $data = MainPageModel::firstOrFail();

            $content = self::normalizeData($data->getAllWithMediaUrlWithout(['id', 'created_at', 'updated_at']));

            return $content;

        } catch (\Exception $ex){
            throw new ModelNotFoundException();
        }

    }

}
