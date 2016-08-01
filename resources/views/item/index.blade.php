@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">Items</div>
        <div class="panel-body">
            <a href={{ url('/items/create') }} class="btn btn-primary">
                Create Item
            </a>
            <hr>
            @include('item.search')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th class="pull-right">Operations</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{ $item->category->name }}</td>
                        <td> &#8358;{{ $item->price }}</td>
                        <td>
                            <div class="pull-right">
                                <a href={{ url('/items/'. $item->id.'/edit') }} class="btn btn-default" >
                                    Edit
                                </a>
                                <a href={{ url('/items/'. $item->id.'/delete') }} class="btn btn-danger">
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(count($items) == 0)
                <div style="color: red;">
                    No Results
                </div>
            @endif

            {!! $items->render() !!}
        </div>
    </div>
@endsection
