@php
    if(!request()->get('context_id')) {
        $context_id = 1;
    } else {
        $context_id = request()->get('context_id');
    }
@endphp

@if ($crud->get('reorder.enabled') && $crud->hasAccess('reorder'))
  <a href="{{ url($crud->route.'/reorder?context_id=') . $context_id }}" class="btn btn-outline-primary reorder" data-context="{{ $context_id }}" id="reorder" data-style="zoom-in"><span class="ladda-label"><i class="la la-arrows"></i> {{ trans('backpack::crud.reorder') }} {{ $crud->entity_name_plural }}</span></a>
@endif
