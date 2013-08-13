$(function() {
    $('#chon_loai_don_vi').change(function(){
        if (this.value != 'none' && this.value !=  0) {
            $('#chon_truc_thuoc').empty().append('<option selected="selected" value="none">Trực Thuộc</option>');
            load_data_donvi(this.value);
            $('#chon_truc_thuoc').removeAttr('disabled');
        } else {
            $('#chon_truc_thuoc').attr('disabled', 'true');
        }
    });
});

function load_data_donvi(loai_don_vi) {
    var url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?r=donvi/dataDonVi';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            loai_don_vi: loai_don_vi
        },
        success: function(msg){
           
            $.each($.parseJSON(msg), function(key, value){
                add_option('chon_truc_thuoc', key, value);
            })
        }
    });
}

function add_option(text, key, value){
    $('#'+text).append($("<option/>", {
        value: key,
        text: value
    }));
}