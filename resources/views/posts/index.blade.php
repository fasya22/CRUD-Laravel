@extends('posts.layout')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h2>CRUD - Toko Buah</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-1 mr-1">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-success" href="{{ route('posts.create') }}"> 
                           Add Data</a>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama Buah</th>
                            <th>Jumlah</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($posts->reverse() as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->nama_buah }}</td>
                            <td>{{ $post->jumlah }}</td>
                            <td>
                                <form action="{{ route('posts.destroy',$post->id) }}" 
                                  method="POST">

                                    <a class="btn btn-info" href="{{ 
                                       route('posts.show',$post->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ 
                                       route('posts.edit',$post->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
