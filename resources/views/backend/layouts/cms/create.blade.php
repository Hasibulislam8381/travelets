@extends('backend.app')

@section('title', 'Create CMS')

@section('content')
    <div class="page-body">
        <div class="container-fluid">

            <div class="card p-4">

                <form action="{{ route('admin.cms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label>Page</label>
                            <select name="page" class="form-control" required>
                                <option value="">Select Page</option>
                                <option value="home">Home</option>
                                <option value="about">About</option>
                                <option value="training">Training</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Section</label>
                            <select name="section" class="form-control" required>
                                <option value="">Select Section</option>
                                <option value="hero">Hero</option>
                                <option value="banner">Banner</option>
                                <option value="footer">Footer</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" class="form-control">
                        </div>

                        <div class="col-12">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Image</label>
                            <input type="file" name="image" id="cmsImage">
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-primary">Save CMS</button>
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        createFilePond('#cmsImage');
    </script>
@endpush
