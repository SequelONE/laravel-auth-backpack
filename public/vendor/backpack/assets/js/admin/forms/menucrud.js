$('.select2').on('select2:selecting', function(e) {
    let params = window.location.search;
    let context_id = e.params.args.data.id;

    let context = document.getElementById('reorder');
    context.setAttribute("data-context", context_id);
    let url = '/admin/menu-item/reorder?context_id=' + context_id;

    $('.reorder').attr('href',url);
});
