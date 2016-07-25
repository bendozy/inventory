@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">Categories</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Category</th>
                    <th class="pull-right">Operations</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    {{
                      var_dump($item->category)
                    }}
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>kee</td>
                        <td>
                            <div class="pull-right">
                                <button type="button" class="btn btn-default">
                                    <a href={{ url('/items/'.$item->id.'/edit') }}>
                                        Edit
                                    </a>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <a href={{ url('/items/'.$item->id.'/delete') }}>
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
