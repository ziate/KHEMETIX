<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class LocaleController extends Controller {
    public function switch($locale) {
        if (in_array($locale, ["ar", "en"])) {
            session(["locale" => $locale]);
            if (auth()->check()) {
                auth()->user()->update(["locale" => $locale]);
            }
        }
        return redirect()->back();
    }
}