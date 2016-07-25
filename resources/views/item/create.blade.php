@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create Item</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST"
                  action="{{ isset($item) ? url('/categories/'.$item->id) : url('/items') }}">
                {{ csrf_field() }}
                @if(isset($item))
                    {{ method_field('PUT') }}
                @endif

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" required type="text" class="form-control" name="name"
                               value="{{ isset($item->name) ? $item->name : old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Price</label>

                    <div class="col-md-6">
                        <input id="price" required type="text" class="form-control" name="price"
                               value="{{ isset($item->price) ? $item->price : old('price') }}">

                        @if ($errors->has('price'))
                            <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="category" class="col-md-4 control-label">Category</label>

                    <div class="col-md-6">
                        <select name="category" class="form-control" id="category">
                            @foreach($categories as $category)
                                <option value={{ $category->id }}
                                        selected={{ isset($item) ? $item->category_id : old('category') }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>
                            {{  isset($item->id) ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
