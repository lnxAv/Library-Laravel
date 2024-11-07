<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingsController {
    public function changeLanguage(Request $request){
        $locale = $request->locale;
        $request->session()->put('locale', $locale);
        return redirect()->back();
    }
}
