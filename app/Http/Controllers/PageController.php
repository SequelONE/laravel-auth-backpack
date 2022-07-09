<?php

namespace App\Http\Controllers;

use App\Models\Page;
use SequelONE\MenuCRUD\app\Models\MenuItem;

class PageController extends Controller
{
    public function welcome()
    {
        $page = Page::where('slug', '/')->first();

        if (!$page)
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
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, trans('page.backOnHomepage', ['url' => url('')]));
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        $this->data['extras'] = isset($page->extras) ? json_decode(json_encode($page->extras, JSON_THROW_ON_ERROR), false, 512, JSON_THROW_ON_ERROR) : '';

        return view('pages.'.$page->template, $this->data);
    }
}
