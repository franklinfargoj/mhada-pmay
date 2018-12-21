$('.only_img').change(function(){
    var ext = $(this).val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['jpg','jpeg','png']) == -1) {
        swal("Error", "Invalid Extension! Please note that JPG/JPEG/PNG files are only accepted.Please select any one of the file types and retry.", "error")
        $(this).val('');
    }
});

$('.only_img_pdf').change(function(){
    var ext = $(this).val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['jpg','jpeg','png','pdf']) == -1) {
        swal("Error", "Invalid Extension! Please note that PDF/JPG/JPEG/PNG files are only accepted.Please select any one of the file types and retry.", "error")
        $(this).val('');
    }
});