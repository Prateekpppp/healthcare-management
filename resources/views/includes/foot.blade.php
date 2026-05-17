
                </div>

    @include('includes/footer')


            </div>
        </div>
    </div>

    @include('includes/app_toast')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
    <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('assets') }}/vendors/chart.js/chart.umd.js"></script>
    <script src="{{ asset('assets') }}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/morris.js/morris.min.js"></script>
    <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
    <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('assets') }}/js/template.js"></script>
    <script src="{{ asset('assets') }}/js/settings.js"></script>
    <script src="{{ asset('assets') }}/js/todolist.js"></script>
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('assets') }}/js/file-upload.js"></script>
  <script src="{{ asset('assets') }}/vendors/select2/select2.min.js"></script>
  {{-- <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script> --}}
  {{-- <script src="{{ asset('assets') }}/js/bootstrap-select.min.js"></script> --}}
  <script src="{{ asset('assets') }}/js/select2.js"></script>
  <script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{ asset('assets') }}/js/data-table.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    @include('includes/ajaxCalls')
    @include('includes/script')

    @yield('js')

{{-- <script>
    responseToast("{{$message}}",'bg-success');
</script> --}}


<script>
    @if ($message = Session::get('success'))
    responseToast("{{$message}}",'bg-success');
    @elseif ($errors->any())
    @foreach ($errors->all() as $error)
    responseToast("{{$error}}",'bg-danger');
    @endforeach
     @elseif ($message = Session::get('error'))
    responseToast("{{$message}}",'bg-danger');
    @endif
</script>

</body>

</html>
