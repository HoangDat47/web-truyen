<!-- Jquery Core Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Morris Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/morrisjs/morris.js') }}"></script>

<!-- ChartJs -->
<script src="{{ asset('public/template/AdminBSB/plugins/chartjs/Chart.bundle.js') }}"></script>

<!-- Flot Charts Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/flot-charts/jquery.flot.time.js') }}"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('public/template/AdminBSB/js/admin.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/js/pages/index.js') }}"></script>

<!-- Demo Js -->
<script src="{{ asset('public/template/AdminBSB/js/demo.js') }}"></script>

<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<!-- Select Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script
    src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}">
</script>
<script
    src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}">
</script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}">
</script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}">
</script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}">
</script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}">
</script>

<!-- Validation Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('public/template/AdminBSB/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/js/admin.js') }}"></script>
<script src="{{ asset('public/template/AdminBSB/js/pages/examples/sign-up.js') }}"></script>

<script type="text/javascript">
    $('.summernote').summernote({
        placeholder: 'Nội dung',
        height: 240,
        minHeight: null,
        maxHeight: null,
        focus: false
    });

    function ChangeToSlug() {
        var slug;
        //Lấy text từ thẻ input title 
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
