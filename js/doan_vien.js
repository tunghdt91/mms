$(function() {
    $('#show_search').click(function() {
        if ($('#form_search').is(':hidden')) {
            $('#form_search').show(500);
            $(this).val(' Ẩn ');
        } else {
            $('#form_search').hide(500);
            $(this).val('Tìm Kiếm');
        }
    });
});