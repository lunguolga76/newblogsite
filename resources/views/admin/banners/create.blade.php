@extends('admin.layouts.layouts')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banners</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Banner</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="thumbnail">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" id="image" class="custom-file-input">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Link</label>
                                    <textarea name="link" id="link" class="form-control @error('link') is-invalid @enderror"  placeholder="Link ...">
                                        </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Title</label>
                                    <textarea name="title" id="title" class="form-control @error('title') is-invalid @enderror"  placeholder="Title ...">
                                        </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Alt</label>
                                    <textarea name="alt" id="alt" class="form-control @error('alt') is-invalid @enderror"  placeholder="Alt ...">
                                        </textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection


