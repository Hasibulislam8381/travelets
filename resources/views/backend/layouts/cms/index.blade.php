@extends('backend.app')

@section('title', 'Hero Section')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="p-5 card">
                        <div class="card-style mb-30">

                            <div class="mb-3 d-flex justify-content-end">
                                <a href="{{ route('admin.cms.create') }}" class="btn btn-primary">

                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#heroModal">
                                        Add Hero Section
                                    </button>
                                </a>
                            </div>

                            <div class="table-wrapper table-responsive">
                                <table id="hero-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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

            if (!$.fn.DataTable.isDataTable('#hero-table')) {

                let dTable = $('#hero-table').DataTable({
                    order: [],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    language: {
                        processing: `<div class="text-center">
                    <div class="spinner-border text-primary" style="width:3rem;height:3rem;"></div>
                </div>`
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2'l><'col-md-2'f>>tipr",

                    ajax: {
                        url: "{{ route('admin.cms.index') }}",
                        type: "GET"
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'subtitle',
                            name: 'subtitle'
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


        // STATUS CHANGE
        function showHeroStatusChangeAlert(id) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to update the status?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    heroStatusChange(id);
                }
            });
        }

        function heroStatusChange(id) {
            let url = '{{ route('admin.hero_section.status', ':id') }}';

            $.ajax({
                type: "POST",
                url: url.replace(':id', id),
                success: function(resp) {
                    $('#hero-table').DataTable().ajax.reload();
                    resp.success ? toastr.success(resp.message) : toastr.error(resp.message);
                }
            });
        }
    </script>
@endpush
