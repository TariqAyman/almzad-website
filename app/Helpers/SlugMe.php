<?php
// Copyright
declare(strict_types=1);

namespace App\Helpers;

use Cocur\Slugify\Slugify;

final class SlugMe
{
    /**
     * @param $string
     * @param $lang
     * @return string
     */
    public static function slugMe($string, $lang): string
    {
        if (!is_null($string)) {
            if ($lang == 'ar') {
                $slug = new Slugify(['regexp' => '/([^\p{Arabic}a-zA-Z0-9]+|-+)/u']);
                $slug->addRules(array(
                    'أ' => 'أ',
                    'ب' => 'ب',
                    'ت' => 'ت',
                    'ث' => 'ث',
                    'ج' => 'ج',
                    'ح' => 'ح',
                    'خ' => 'خ',
                    'د' => 'د',
                    'ذ' => 'ذ',
                    'ر' => 'ر',
                    'ز' => 'ز',
                    'س' => 'س',
                    'ش' => 'ش',
                    'ص' => 'ص',
                    'ض' => 'ض',
                    'ط' => 'ط',
                    'ظ' => 'ظ',
                    'ع' => 'ع',
                    'غ' => 'غ',
                    'ف' => 'ف',
                    'ق' => 'ق',
                    'ك' => 'ك',
                    'ل' => 'ل',
                    'م' => 'م',
                    'ن' => 'ن',
                    'ه' => 'ه',
                    'و' => 'و',
                    'ي' => 'ي',
                ));
            } else {
                $slug = new Slugify();
            }
            return $slug->slugify($string);
        }
    }

    public static function make($text, $model, $attribute, $lang, $id = null): string
    {
        $slug = SlugMe::slugMe($text, $lang);

        $flag = $model::where($attribute, $slug);

        if ($id) $flag = $flag->where('id', $id);

        if ($flag->count() > 0) {
            $int = 1;
            $slug = SlugMe::slugMe($text . $int, $lang);

            while ($model::where($attribute, $slug)->count() > 0) {
                $int = $int + 1;
                $slug = SlugMe::slugMe($text . $int, $lang);
            }
        }

        return $slug;
    }
}
