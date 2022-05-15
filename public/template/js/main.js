$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: 'destroy',
            success: function (result) {
                if (!result.error) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}


/*Upload File */
$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (!results.error) {
                $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src="' + results.url + '" width="100px"></a>');

                $('#thumb').val(results.url);
            } else {
                alert('Upload File Lỗi');
            }
        }
    });
});
// Quick View
function quickView(id){
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: '/quickview/'+id,
        success: function(results){
            var data = results.url
            jQuery.each(data, function(index, item) {
                //now you can access properties using dot notation
               $('.img-view').html('<img src="'+item.thumb+'" alt="IMG-PRODUCT">'+
                   '<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="'+item.thumb+'">'+
                    '<i class="fa fa-expand"></i>'+
                   '</a>')
                $('#name-view').html(item.name)
                $('#desc-view').html(item.description)
                $('#price-view').html(item.price)
            });
        }

    });
}

// Load More
function loadMore(){
    const page = $('#page').val()
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data:{page},
        url: 'services/load-product/',
        success: function(result){
            if(result.html !== ''){
                $('#loadProduct').append(result.html)
                $('#page').val(page +1)
            }else{
                alert('Đã load xong sản phẩm!')
            }
        }

    });
}