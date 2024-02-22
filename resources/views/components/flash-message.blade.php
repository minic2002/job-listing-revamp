@if (session()->has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session("success") }}',
        confirmButtonColor: '#5DB075',
        timer: 2000
    });
</script>
@elseif(session()->has('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{ session("error") }}',
        confirmButtonColor: '#d33',
        timer: 2000
    });
</script>
@endif
