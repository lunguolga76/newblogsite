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
    <div class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banners List</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <a href="{{route('banners.create')}}" class="btn btn-primary mb-3">Add banner</a>
                <br>
                @if(count($banners))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th >#</th>
                            <th style="width: 25%">Image</th>
                            <th>Link</th>
                            <th>Title</th>
                            <th>Alt</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{$banner->id}}</td>

                                <td> <img  style="width: 180px;" src="{{asset('assets/admin/banners/'.$banner['image'])}}"></td>
                                <td>{{$banner->link}}</td>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->alt}}</td>
                                <td>{{$banner->status}}</td>

                                <td>
                                    <a href="{{ route('banners.edit', ['banner' => $banner->id]) }}"
                                       class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;
                                    <form action="{{ route('banners.destroy', ['banner' => $banner->id]) }}"
                                          method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Confirm Delete')"><i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
            @else
                <p>Banner dose not exist</p>
            @endif
        </div>
        <div class="card-footer clearfix">
            {{ $banners->links() }}

        </div>
        <!-- /.card-body -->
        <div>

        </div>
        <!-- /.card-footer-->
    </div>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection


