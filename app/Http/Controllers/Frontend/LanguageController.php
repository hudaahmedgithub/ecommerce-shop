<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Config;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {   
        App::setLocale($lang);

        Session::put('app_lang', $lang);

        return Redirect::back();
    }
}
