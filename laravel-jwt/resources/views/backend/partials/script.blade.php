    <!-- default js -->
    <script src="{{asset('backend/js/jquery1-3.4.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper1.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap1.min.js')}}"></script>
    <script src="{{asset('backend/js/metisMenu.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- counter js-->
    <script src="{{asset('backend/vendors/count_up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('backend/vendors/count_up/jquery.counterup.min.js')}}"></script>
    <!-- image gallery js code -->
    <script src="{{asset('backend/vendors/scroll_reval/scrollreveal.min.js')}}"></script>
    <script src="{{asset('backend/vendors/scroll_reval/modernizr.js')}}"></script>
    <script src="{{asset('backend/vendors/scroll_reval/reveal-custom.js')}}"></script>


    {{-- <script src="{{asset('backend/vendors/toastr/toastr.js')}}"></script> --}}


    <!-- SweetAlert and Toastr JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- custom js code -->
    <script src="{{asset('backend/js/custom.js')}}"></script>

    <script>
        $(document).ready(function() {

            toastr.options.timeOut = 10000;
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                };

                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                };
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                };
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                };
                toastr.warning("{{ session('warning') }}");
            @endif

        });
    </script>


{{-- $.ajax({
    url: '{{ route('edit.avater.profile') }}',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function(data) {
        console.log(data);
        if (data.success) {
            $('#profile-picture').attr('src', data.image_url);
            toastr.success('Profile picture updated successfully.');
        } else {
            toastr.error(data.message);
        }
    },
    error: function() {
        toastr.error(data.message);
    }
}); --}}

