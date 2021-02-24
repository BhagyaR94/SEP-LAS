<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function setLocale($locale)
    {
      App:: setLocale($locale);
    }

    public function getLocale()
    {
        return App::getLocale();
    }
}