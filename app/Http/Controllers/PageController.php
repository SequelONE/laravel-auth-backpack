<?php

namespace App\Http\Controllers;

use App\Models\Page;
use SequelONE\MenuCRUD\app\Models\MenuItem;

class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pages($link)
    {
        $menu = MenuItem::where('link', $link)->first();
        $page = Page::where('id', $menu->page_id)->first();

        if(isset($menu->link)) {
            return view('second',compact('menu'),compact('page'));
        } else {
            abort(404);
        }
    }
}
