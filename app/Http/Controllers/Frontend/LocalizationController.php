<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    /**
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLang($locale)
    {
        if (!in_array($locale, ['ar', 'en'])) {
            $locale = 'ar';
        }

        App::setlocale($locale);
        Session::put('appLocale',$locale);

        return redirect()->back();
    }
}
