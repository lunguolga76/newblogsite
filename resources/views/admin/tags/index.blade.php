@extends('admin.layouts.layouts')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tags</h1>
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
                    <h3 class="card-title">Tag List</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    <a href="{{route('tags.create')}}" class="btn btn-primary mb-3">Add Tag</a>
                    <br>
                    @if(count($tags))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 50%">Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->title}}</td>
                            <td>{{$tag->slug}}</td>
                            <td>
                                <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}"
                                    class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;
                                <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}"
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
                <p>Tag dose not exist</p>
                @endif
            </div>
                <div class="card-footer clearfix">
                    {{ $tags->links() }}

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

