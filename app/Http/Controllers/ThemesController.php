<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class ThemesController extends Controller
{
    /**
     * @param $theme
     * @return RedirectResponse
     */
    public function index($theme)
    {
        $theme = 'backpack.' . $theme . '::';
        config()->set('backpack.ui.view_namespace', $theme);
        config()->set('backpack.ui.view_namespace_fallback', $theme);
        session()->put('backpack.ui.view_namespace', $theme);
        session()->put('backpack.ui.view_namespace_fallback', $theme);
        return redirect()->back();
    }
}
