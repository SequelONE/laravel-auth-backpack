<?php

namespace App\Http\ViewComposers;

use App\Models\MenuItem;
use App\Models\Context;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $currentDomain = request()->getHttpHost();
        $context = Context::where('subdomain', $currentDomain)->first();

        $items = MenuItem::whereNull('parent_id')
            ->where('context_id', $context->id)
            ->with('children')
			->orderBy('lft')
            ->get();

        return $view->with('items', $items);
    }
}
