@php
    $bgErr = "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))";
    $bgSuccess = "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))";
@endphp
<div class="container mb-2 mt-3">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script> showToast("{{ $error }}", "{{ $bgErr }}"); </script>
        @endforeach
    @endif
    @if (session()->has('success') && !session()->has('error'))
        <script> showToast("{{ session('success') }}", "{{ $bgSuccess }}"); </script>
    @endif
    @if (session()->has('error'))
        <script> showToast("{{ session('error') }}", "{{ $bgErr }}"); </script>
    @endif
</div>
