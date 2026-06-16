@extends('backend.app')

@section('title', 'Edit Hero')

@section('content')

    <div class="page-body">
        <div class="container-fluid">

            <div class="card p-4">
                <h4 class="mb-3">Edit Hero Section</h4>

                <form action="{{ route('admin.cms.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                        </div>

                        <div class="col-md-6">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $data->subtitle }}">
                        </div>

                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $data->description }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" id="bannerImageInput">
                        </div>

                        <div class="col-md-6">
                            @if ($data->banner_image)
                                <p>Current Image</p>
                                <img src="{{ Storage::url($data->banner_image) }}" style="width:150px;border-radius:8px;">
                            @endif
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-success">Update</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        createFilePond('#bannerImageInput');
    </script>
@endpush
