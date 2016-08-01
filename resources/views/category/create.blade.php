@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Create Category</div>
        <div class="panel-body">
            @if(count($errors) > 0)
                @include('errors.error')
            @endif
            <form class="form-horizontal" role="form" method="POST"
                  action="{{ isset($category) ? url('/categories/'.$category->id) : url('/categories') }}">
                {{ csrf_field() }}
                @if(isset($category))
                    {{ method_field('PUT') }}
                @endif

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" required type="text" class="form-control" name="name"
                               value="{{ isset($category->name) ? $category->name : old('name') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>
                            {{  isset($category->id) ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
