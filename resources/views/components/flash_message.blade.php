<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<script>
    @if (session()->has('message'))
        @if (session()->has('error') && session()->get('error'))
         toastr.error('{{ session()->get('message') }}');
        @else
         toastr.success('{{ session()->get('message') }}');
        @endif
    @endif
</script>
