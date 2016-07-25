@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">Categories</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Category</th>
                    <th class="pull-right">Operations</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <div class="pull-right">
                                <button type="button" class="btn btn-default">
                                    <a href={{ url('/categories/'.$category->id.'/edit') }}>
                                        Edit
                                    </a>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <a href={{ url('/categories/'.$category->id.'/delete') }}>
                                        Delete
                                    </a>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
