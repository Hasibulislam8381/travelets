@extends('backend.app')

@section('title', 'Products')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5 card">
                        <div class="card-style mb-30">
                            <div class="mb-3 d-flex justify-content-end">
                                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add New Product</a>
                            </div>
                            <div class="table-wrapper table-responsive">
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thumbnail</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Type</th>
                                            <th>Price</th>
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
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    language: {
                        processing: `<div class="text-center"><div class="spinner-border text-primary" style="width:3rem;height:3rem;" role="status"><span class="visually-hidden">Loading...</span></div></div>`
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('admin.product.index') }}",
                        type: "get"
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'thumbnail',
                            name: 'thumbnail',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'title',
                            name: 'title',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'category',
                            name: 'category',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'type',
                            name: 'type',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'price',
                            name: 'price',
                            orderable: true,
                            searchable: false
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

        function showStatusChangeAlert(id) {
            event.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to update the status?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        statusChange(id);
                    }
                });
        }

        function statusChange(id) {
            let url = '{{ route('admin.product.status', ':id') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':id', id),
                success: function(resp) {
                    $('#data-table').DataTable().ajax.reload();
                    resp.success ? toastr.success(resp.message) : toastr.error(resp.message);
                }
            });
        }

        function showDeleteConfirm(id) {
            event.preventDefault();
            Swal.fire({
                    title: 'Are you sure?',
                    text: 'If you delete this, it will be gone forever.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        deleteItem(id);
                    }
                });
        }

        function deleteItem(id) {
            let url = '{{ route('admin.product.destroy', ':id') }}';
            $.ajax({
                type: "DELETE",
                url: url.replace(':id', id),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(resp) {
                    $('#data-table').DataTable().ajax.reload();
                    toastr.success(resp.message);
                }
            });
        }
    </script>
@endpush
