// Ajax calls should always have the CSRF token attached to them, otherwise they won't work
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    }
});

// Enable deep link to tab
document.querySelectorAll('.nav-tabs a').forEach(e => {
    if(e.dataset.name === location.hash.substring(1)) (new bootstrap.Tab(e)).show();
    e.addEventListener('click', () => location.hash = e.dataset.name);
});
