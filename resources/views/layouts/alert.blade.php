@if(Session::has('success'))
    <script>
        swal("پیام سیستم!", "{{ Session::get('success') }}", "success");
    </script>
@endif