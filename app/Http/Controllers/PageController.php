<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Context;
use SequelONE\MenuCRUD\app\Models\MenuItem;

class PageController extends Controller
{
    public function welcome()
    {
        $currentDomain = request()->getHttpHost();
        $context = Context::where('subdomain', $currentDomain)->first();

        if($context !== null) {
            $page = Page::where('slug', '/')->first();
        } else {
            abort(404, trans('page.backOnHomepage', ['url' => url('')]));
        }

        if (!$page || $page->context_id !== $context->id)
        {
            abort(404, trans('page.backOnHomepage', ['url' => url('')]));
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        $this->data['extras'] = isset($page->extras) ? json_decode(json_encode($page->extras, JSON_THROW_ON_ERROR), false, 512, JSON_THROW_ON_ERROR) : '';

        return view('pages.'.$page->template, $this->data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \JsonException
     */
    public function index($slug, $subs = null)
    {
        $currentDomain = request()->getHttpHost();
        $context = Context::where('subdomain', $currentDomain)->first();

        if($context !== null) {
            $page = Page::findBySlug($slug);
        } else {
            abort(404, trans('page.backOnHomepage', ['url' => url('')]));
        }

        if (!$page || $page->context_id !== $context->id)
        {
            abort(404, trans('page.backOnHomepage', ['url' => url('')]));
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        $this->data['extras'] = isset($page->extras) ? json_decode(json_encode($page->extras, JSON_THROW_ON_ERROR), false, 512, JSON_THROW_ON_ERROR) : '';

        return view('pages.'.$page->template, $this->data);
    }
}
