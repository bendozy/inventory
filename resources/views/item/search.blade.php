<form class="form-horizontal" role="form" method="POST"
      action="{{ url('/search') }}">
    {{ csrf_field() }}
    @if(isset($category))
        {{ method_field('PUT') }}
    @endif

    <div class="form-group form inline">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{ old('name') }}">
        </div>
    </div>

    <div class="form-group form inline">
        <label for="name" class="col-md-4 control-label">Order By</label>

        <div class="col-md-6">
            <select name="category" class="form-control" id="category">
                <option value="0" selected>All Categories</option>
                @foreach($categories as $category)
                    <option value={{ $category->id }} >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group form inline">
        <label for="name" class="col-md-4 control-label">Price</label>

        <div class="col-md-6">
            <input id="price" type="number" class="form-control" name="price"
                   value="{{  old('price') }}">
        </div>
    </div>

    <div class="form-group form inline">
        <label for="name" class="col-md-4 control-label">Order By</label>

        <div class="col-md-6">
            <select name="order" class="form-control" id="order">
                <option value="name">Name</option>
                <option value="price">Price</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i>Search
            </button>
        </div>
    </div>
</form>
