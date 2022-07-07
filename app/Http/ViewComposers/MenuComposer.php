<?php

namespace App\Http\ViewComposers;

use App\Models\MenuItem;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $items = MenuItem::whereNull('parent_id')
            ->with('children')
            ->get();

        return $view->with('items', $items);
    }
}
