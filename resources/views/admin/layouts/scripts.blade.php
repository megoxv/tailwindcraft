{{-- Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.23.4/ace.min.js" integrity="sha512-j/s6QJ8uW2gD8owi6Mw45E2k8w9TwRojEesI02CWZFGxVcQPGfdIwFzKHRONoCYwLMgDdOXORArWjl2oFWFc5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

<script>
    tinymce.init({
        path_absolute: "/",
        selector: 'textarea#texteditor',
        height: 500,
        plugins: [
            'advlist', 'autolink', 'autosave', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic backcolor | alignleft aligncenter  | link image media ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        toolbar: "restoredraft insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

        image_caption: true,
        image_dimensions: true,
        quickbars_selection_toolbar: 'bold italic |h1 h2 h3 h4 h5 h6| formatselect | quicklink blockquote | numlist bullist',
        entity_encoding: "raw",
        verify_html: false,
        object_resizing: 'img',
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document
                .getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }

    });
</script>

@livewireScripts
@stack('scripts')
