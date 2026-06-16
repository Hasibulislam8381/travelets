@extends('backend.app')
@section('title', 'Dorm Bookings')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5 card">
                        <div class="table-wrapper table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Room Type</th>
                                        <th>Duration</th>
                                        <th>Move-in Date</th>
                                        <th>Occupation</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>{{-- Dynamic Data --}}</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            if (!$.fn.DataTable.isDataTable('#data-table')) {
                $('#data-table').DataTable({
                    order: [],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('admin.dorm_booking.index') }}",
                        type: "get"
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'full_name',
                            name: 'full_name',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            orderable: false,
                            searchable: true
                        },
                        {
                            data: 'room_type',
                            name: 'room_type',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'duration',
                            name: 'duration',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'move_in_date',
                            name: 'move_in_date',
                            orderable: true,
                            searchable: false
                        },
                        {
                            data: 'occupation',
                            name: 'occupation',
                            orderable: false,
                            searchable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                });
            }
        });

        function changeStatus(id, status) {
            Swal.fire({
                title: 'Are you sure?',
                text: `Do you want to change this booking status to "${status}"?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Laravel direct Route parsing secure logic
                    let url = "{{ route('admin.dorm_booking.status', ':id') }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            _token: '{{ csrf_token() }}', // Explicit token parameter parsing
                            status: status
                        },
                        success: function(resp) {
                            if (resp.success) {
                                $('#data-table').DataTable().ajax.reload(null,
                                    false); // Reload pagination state dhore rakhbe

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: resp.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error: function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Failed to update status. Please try again.',
                                confirmButtonColor: '#d33'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
