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
    
    $('#chon_tinh_1').change(function(){
        $('#chon_huyen_1').empty().append('<option selected="selected" value="none">Huyện</option>');
        $('#chon_xa_1').empty().append('<option selected="selected" value="none">Xã</option>');
        load_data_huyen(this.value, '_1');
        $('#chon_huyen_1').removeAttr('disabled');
    });
    
    $('#chon_huyen_1').change(function(){
        $('#chon_xa_1').empty().append('<option selected="selected" value="none">Xã</option>');
        load_data_xa(this.value, '_1');
        $('#chon_xa_1').removeAttr('disabled');
    });
    
    $('#chon_tinh_2').change(function(){
        $('#chon_huyen_2').empty().append('<option selected="selected" value="none">Huyện</option>');
        $('#chon_xa_2').empty().append('<option selected="selected" value="none">Xã</option>');
        load_data_huyen(this.value, '_2');
        $('#chon_huyen_2').removeAttr('disabled');
    });
    
    $('#chon_huyen_2').change(function(){
        $('#chon_xa_2').empty().append('<option selected="selected" value="none">Xã</option>');
        load_data_xa(this.value, '_2');
        $('#chon_xa_2').removeAttr('disabled');
    });
});

function load_data_huyen(id_tinh, number) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=doanvien/dataHuyen';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id_tinh: id_tinh
        },
        success: function(msg){
            $.each($.parseJSON(msg), function(key, value){
                add_option('huyen', key, value, number);
            })
        }
    });
}

function load_data_xa(id_huyen, number) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=doanvien/dataXa';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            id_huyen: id_huyen
        },
        success: function(msg){
            $.each($.parseJSON(msg), function(key, value){
                add_option('xa', key, value, number);
            })
        }
    });
}

function add_option(text, key, value, number){
    $('#chon_' + text + number).append($("<option/>", {
        value: key,
        text: value
    }));
}