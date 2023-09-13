<form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{old('id', $api->id )}}">
    <input type="hidden" value="PUT" name="_method">

            <div class="mb-3">
                <label for="name" style="margin-bottom: 10px;">Title</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('title', $api->name) }}"
                       placeholder="Enter Title" required>
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class=" mb-3">
                <label for="name" style="margin-bottom: 10px;">Link</label>
                <textarea type="text" id="name" class="form-control" name="link"
                          placeholder="Enter Link" required>{{ old('link', $api->link) }}</textarea>
                @if($errors->has('link'))
                    <p class="text-danger">{{ $errors->first('link') }}</p>
                @endif
            </div>

            <div class="row ml-2 mt-4">
                <div class="col-3 ">
                    <input class="form-check-input" id="is_feature" type="checkbox"
                           name="is_feature" {{ old('is_feature', $api->is_feature) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_feature">
                        &nbsp;&nbsp;Is Feature
                    </label>
                </div>
                <div class="col-3 ">
                    <input class="form-check-input" id="is_active" type="checkbox"
                           name="is_active" {{ old('is_active', $api->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        &nbsp;&nbsp;Is Active
                    </label>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    {{ $api->id != 0 ? 'Save Changes' : 'Submit' }}
                </button>
                @if($api->id != 0)
                    <a href="{{ route('admin.api.index') }}">
                        <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                    </a>
                @else
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                @endif
            </div>



</form>


