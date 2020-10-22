@extends('admin.layouts.layouts')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Posts</h1>
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
                    <h3 class="card-title">Posts List</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    <a href="{{route('posts.create')}}" class="btn btn-primary mb-3">Add Post</a>
                    <br>
                    @if(count($posts))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 50%">Name</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->category->title}}</td>
                            <td>{{$post->tags->pluck('title')->join(',')}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                    class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;
                                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}"
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
                <p>Post dose not exist</p>
                @endif
            </div>
                <div class="card-footer clearfix">
                    {{ $posts->links() }}

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

