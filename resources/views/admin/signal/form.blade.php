{{--{{dd($categories)}}--}}
<form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{old('id', $signal->id )}}">
    <input type="hidden" value="PUT" name="_method">

        <div class="row">

            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">Order Type</label>
                <select class="custom-select" name="orderType" id="orderType" required>
                    <option value="">----Select Order Type----</option>
                </select>
                @if($errors->has('orderType'))
                    <p class="text-danger">{{ $errors->first('orderType') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">Buy Or Sell</label>
                <select class="custom-select" name="buysell" id="type" required>
                    <option value="">----Select Buy Or Sell----</option>
                </select>
                @if($errors->has('type'))
                    <p class="text-danger">{{ $errors->first('type') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">User Role</label>
                <select class="custom-select" name="role_id">
                    <option value="">----Select User Role----</option>
                    @foreach($roles as $key => $role)
                        <option
                            @if ($role->name=== 'public'&$signal->id==0)
                                {{'selected="selected"'}}
                            @else
                                {{ ($signal->role_id == old('id', $role->id))?'selected':'' }}
                            @endif
                            value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
                @if($errors->has('visibility'))
                    <p class="text-danger">{{ $errors->first('visibility ') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">Category</label>
                <select class="custom-select" name="category_id" id="category" required>
                    <option value="">----Select Category----</option>
                    @foreach($categories[0]['subcategories'] as $key => $subcat)
                        <option
                            value="{{ $subcat->id }}" {{ ($signal->category_id== old('id', $subcat->id))?'selected':''  }}>{{ ucfirst($subcat->name) }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">Pairs</label>
                <select class="custom-select" name="pair_id" id="pair"required>
                    <option value="" >----Select Pairs----</option>
                </select>
                @if($errors->has('pair_id'))
                    <p class="text-danger">{{ $errors->first('pair_id') }}</p>
                @endif
            </div>

            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">Price</label>
                <input type="number" id="title" class="form-control" step="any" name="price"
                       value="{{ old('price', $signal->price) }}"
                       placeholder="0.1234" required>
                @if($errors->has('price'))
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">Stop Loss</label>
                <input type="number" id="title" step="any" class="form-control" name="stoploss"
                       value="{{ old('stoploss', $signal->stoploss) }}"
                       placeholder="0.1234" required>
                @if($errors->has('stoploss'))
                    <p class="text-danger">{{ $errors->first('stoploss') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">End Date Time</label>
                <input type="datetime-local" id="title" class="form-control" name="datetime"
                       value="{{ old('datetime', $signal->datetime) }}" required>
                @if($errors->has('datetime'))
                    <p class="text-danger">{{ $errors->first('datetime') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <div class="container1">
                    <label for="title" style="margin-bottom: 10px;">Take Profit</label>
                    <div class="input-group">
                        <input type="text" class="form-control" step="any" name="takeprofit[]">
                        <span class="input-group-text"><i class="fa-solid fa-plus fa-xl add_form_field"
                                                          style="color: #18d3ec;"></i></span>
                        @if($errors->has('takeprofit'))
                            <p class="text-danger">{{ $errors->first('takeprofit') }}</p>
                        @endif
                    </div>

                </div>

            </div>

            <div class="col-8 mt-3">
                <label for="title" style="margin-bottom: 10px;">Comment</label>
                <textarea type="text" id="title" style="height: 100px;" class="form-control" name="comment"
                          required>{{ old('comment', $signal->comment) }}</textarea>
                @if($errors->has('comment'))
                    <p class="text-danger">{{ $errors->first('comment') }}</p>
                @endif
            </div>
            <div class="col mt-4">
                <label for="desc" style="margin-bottom: 10px;">Description</label>

                <textarea type="text" id="ckeditor" class="form-control" name="desc"
                          placeholder="Enter Description">{{ old('desc', $signal->desc) }}</textarea>

                @if($errors->has('desc'))
                    <p class="text-danger">{{ $errors->first('desc') }}</p>
                @endif
            </div>

            <div class="row ml-2 mt-4">
                <div class="col-2 ">
                    <input class="form-check-input" id="is_feature" type="checkbox"
                           name="is_feature" {{ old('is_feature', $signal->is_feature) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_feature">
                        &nbsp;&nbsp;Is Feature
                    </label>
                </div>
                <div class="col-2 ">
                    <input class="form-check-input" id="is_active" type="checkbox"
                           name="is_active" {{ old('is_active', $signal->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        &nbsp;&nbsp;Is Active
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    {{ $signal->id != 0 ? 'Save Changes' : 'Submit' }}
                </button>
                @if($signal->id != 0)
                    <a href="{{ route('admin.post.index') }}">
                        <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                    </a>
                @else
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                @endif
            </div>
        </div>
</form>
