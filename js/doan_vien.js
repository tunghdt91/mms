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
    
    $('#chon_tinh').change(function(){
        $('#chon_huyen').empty().append('<option selected="selected" value="none">Huyện</option>');
        $('#chon_xa').empty().append('<option selected="selected" value="none">Xã</option>');
        load_data_huyen(this.value);
        $('#chon_huyen').removeAttr('disabled');
    });
    
    $('#chon_huyen').change(function(){
        $('#chon_xa').empty().append('<option selected="selected" value="none">Xã</option>');
        load_data_xa(this.value);
        $('#chon_xa').removeAttr('disabled');
    });
});

function load_data_huyen(id_tinh) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=doanvien/dataHuyen';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id_tinh: id_tinh
        },
        success: function(msg){
            $.each($.parseJSON(msg), function(key, value){
                add_option('huyen', key, value);
            })
        }
    });
}

function load_data_xa(id_huyen) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=doanvien/dataXa';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id_huyen: id_huyen
        },
        success: function(msg){
            $.each($.parseJSON(msg), function(key, value){
                add_option('xa', key, value);
            })
        }
    });
}

function add_option(text, key, value){
    $('#chon_' + text).append($("<option/>", {
        value: key,
        text: value
    }));
}
