@extends('main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h4 class="card-header">Create post</h4>
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="category" class="col-lg-2 col-form-label">Category:</label>
                                <div class="col-lg-10">
                                    <select name="category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-lg-2 col-form-label">Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" required autofocus>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('title') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="body" class="col-lg-2 col-form-label">Body:</label>
                                <div class="col-lg-10">
                                    <textarea name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" rows="10" required autofocus></textarea>
                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('body') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-lg-2 col-form-label">File:</label>
                                <div class="col-lg-10">
                                    <input type="file" name="file" class="form-control-file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-10 offset-lg-2">
                                    <button type="submit" class="btn btn-success btn-block btn-lg">Success</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection