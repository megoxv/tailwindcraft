<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.23.4/ace.min.js" integrity="sha512-j/s6QJ8uW2gD8owi6Mw45E2k8w9TwRojEesI02CWZFGxVcQPGfdIwFzKHRONoCYwLMgDdOXORArWjl2oFWFc5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/code-editor.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- Google Analytics --}}
@if (getSetting('analytics_status') == 1)
    <script async src="https://www.googletagmanager.com/gtag/js?id={!! getSetting('analytics_tracking_id') !!}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{!! getSetting('analytics_tracking_id') !!}');
    </script>
@endif
{{-- End Google Analytics --}}
<script>
    @if (Session::has('message'))
        Toast.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        Toast.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        Toast.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        Toast.warning("{{ session('warning') }}");
    @endif
</script>
@stack('modals')
@stack('scripts')
@livewireScripts
{!! getSetting('footer_code') !!}