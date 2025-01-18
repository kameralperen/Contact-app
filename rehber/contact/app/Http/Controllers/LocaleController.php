<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setlocale($lang)
    {
        if (in_array($lang, ['tr', 'en'])) {
            App::setlocale($lang);
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }

    public function switchTheme($theme)
    {

        $allowedThemes = ['theme1', 'theme2'];

        if (in_array($theme, $allowedThemes)) {
            $user = Auth::user();
            $user->theme = $theme;
            $user->save();
        }

        return redirect()->back();
    }
}
