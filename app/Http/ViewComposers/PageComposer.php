<?php

namespace App\Http\ViewComposers;

use App\Models\MenuItem;
use App\Models\Context;
use Illuminate\View\View;

class PageComposer
{
    public function compose(View $view)
    {
        $currentDomain = request()->getHttpHost();
        $context = Context::where('subdomain', $currentDomain)->first();

        $items = MenuItem::whereNull('parent_id')
            ->where('context_id', $context->id)
            ->with('children')
            ->get();

        $items = $this->buildTree($items);

        return $view->with('items', $items);
    }

    public function buildTree($items)
    {
        $currentDomain = request()->getHttpHost();
        $context = Context::where('subdomain', $currentDomain)->first();

        $grouped = $items->groupBy('parent_id');

        foreach ($items as $item) {
            if ($grouped->has($item->id)) {
                $item->children = $grouped[$item->id];
            }
        }

        return $items->where('parent_id', null)->where('context_id', $context->id);
    }
}
