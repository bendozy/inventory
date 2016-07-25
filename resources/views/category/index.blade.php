@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">Categories</div>
        <div class="panel-body">
                <a href={{ url('/categories/create') }} class="btn btn-primary">
                    Create
                </a>
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
                                <a href={{ url('/categories/'.$category->id.'/edit') }} class="btn btn-default" >
                                        Edit
                                </a>
                                <a href={{ url('/categories/'.$category->id.'/delete') }} class="btn btn-danger">
                                        Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(count($categories) == 0)
                <div style="color: red;">
                    No Results
                </div>
            @endif

            {!! $categories->render() !!}
        </div>
    </div>
@endsection
