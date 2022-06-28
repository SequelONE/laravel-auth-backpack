<?php

namespace App\Http\ViewComposers;

use App\Models\Page;
use Illuminate\View\View;

class PageComposer
{
    public function compose(View $view)
    {
        $pages = Page::whereNull('parent_id')
            ->with('children')
            ->get();

        return $view->with('pages', $pages);
    }
}
