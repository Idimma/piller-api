<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        Toastify({text: "{{ $error }}", close: true, backgroundColor: 'red', duration: 15000}).showToast();
        @endforeach
        @endif
        @if (session('status'))
        Toastify({text: "{{ session('status') }}", close: true, backgroundColor: 'blue'}).showToast();
        @endif
        @if (session('success'))
        Toastify({text: "{{ session('success') }}", close: true, backgroundColor: 'green'}).showToast();
        @endif
        @if (session('warning'))
        Toastify({text: "{{ session('warning') }}", close: true, backgroundColor: 'orange'}).showToast();
        @endif
    });


    //
    // swal({
    //     title: "Are you sure?",
    //     text: "Once deleted, you will not be able to recover this imaginary file!",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    // })
    //     .then((willDelete) => {
    //         if (willDelete) {
    //             swal("Poof! Your imaginary file has been deleted!", {
    //                 icon: "success",
    //             });
    //         } else {
    //             swal("Your imaginary file is safe!");
    //         }
    //     });
</script>
