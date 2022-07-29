<?php

namespace App;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */

    private function welcome()
    {
        $this->crud->addField([
            'name' => 'introtext',
            'label' => trans('admin.introtext'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
    }

    private function services()
    {
        $this->crud->addField([
            'name' => 'introtext',
            'label' => trans('admin.introtext'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
    }

    private function about_us()
    {
        $this->crud->addField([
            'name' => 'introtext',
            'label' => trans('admin.introtext'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
    }

    private function contacts()
    {
        $this->crud->addField([
            'name' => 'introtext',
            'label' => trans('admin.introtext'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => trans('backpack::pagemanager.content'),
            'type' => 'summernote',
            'placeholder' => trans('backpack::pagemanager.content_placeholder'),
            'tab' => trans('admin.general'),
        ]);

        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'store_in' => 'extras',
            'tab' => trans('admin.seo'),
        ]);
    }
}
