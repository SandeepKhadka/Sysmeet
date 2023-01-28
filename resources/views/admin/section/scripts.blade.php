<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Sysmit App -->
<script src="{{ asset('assets/dist/js/sysmit.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/laravel-filemanager/js/stand-alone-button.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('assets/plugins/bootstrap-switch-button/dist/bootstrap-switch-button.min.js') }}"></script>
<script>
    $("#lfm").filemanager("image");

    $(document).ready(function() {
        $("#description").summernote({
            "lineHeight": 1,
            "height": 300,
            "codemirror": {
                "theme": "ambiance"
            },
            "toolbar": [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]]
            ]
        });

    });

    $(document).ready(function() {
        $("#desc").summernote({
            "lineHeight": 1,
            "height": 300,
            "codemirror": {
                "theme": "ambiance"
            },
            "toolbar": [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]]
            ]
        });
    });

    $(document).ready(function() {
        $("#biography").summernote({
            "lineHeight": 1,
            "height": 300,
            "codemirror": {
                "theme": "ambiance"
            },
            "toolbar": [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]]
            ]
        });
    });

    $(document).ready(function() {
        $("#prof_skill").summernote({
            "lineHeight": 1,
            "height": 300,
            "codemirror": {
                "theme": "ambiance"
            },
            "toolbar": [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]]
            ]
        });
    });

    // $(document).ready(function() {
    //     $("#team_motto").summernote();
    // });

    // $(document).ready(function() {
    //     $("#summary").summernote();
    // });

    $(function() {
        $("#image").change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
            if (
                input.files &&
                input.files[0] &&
                (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
            ) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#holder").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                $("#holder").attr("src", "");
            }
        });
    });

    setTimeout(function() {
        $("#alert").slideUp();
    }, 4000);


    $(document).ready(function() {
        $("#table").DataTable();
    });

    if (window.$('#is_parent').is(':checked')) {
        window.$('#parent_cat_div').hide();
    }
    window.$('#is_parent').change(function() {
        window.$('#parent_cat_div').slideToggle();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('scripts')
</body>

</html>
