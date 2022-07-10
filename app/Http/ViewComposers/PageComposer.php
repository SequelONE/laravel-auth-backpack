<?php

namespace App\Http\ViewComposers;

use App\Models\MenuItem;
use Illuminate\View\View;

class PageComposer
{
    public function compose(View $view)
    {
        $items = MenuItem::whereNull('parent_id')
            ->with('children')
            ->get();

        $items = $this->buildTree($items);

        return $view->with('items', $items);
    }

    public function buildTree($items)
    {
        $grouped = $items->groupBy('parent_id');

        foreach ($items as $item) {
            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }

        return $items->where('parent_id', null);
    }
}
