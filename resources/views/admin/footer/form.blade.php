<form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{old('id', $footer->id )}}">
    <input type="hidden" value="PUT" name="_method">

    <div class="mb-3">
        <label for="name" style="margin-bottom: 10px;">Title</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ old('title', $footer->name) }}"
               placeholder="Enter Title" required>
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
    </div>

    <div class=" mb-3">
        <label for="name" style="margin-bottom: 10px;">Link</label>
        <textarea type="text" id="name" class="form-control" name="link"
                  placeholder="Enter Link" required>{{ old('link', $footer->link) }}</textarea>
        @if($errors->has('link'))
            <p class="text-danger">{{ $errors->first('link') }}</p>
        @endif
    </div>
    <div class="mb-3">
        <label for="name" style="margin-bottom: 10px;">Content Place</label>
        <select class="custom-select" name="type" required>
            <option value="-1">----Select Content Place----</option>
            <option value="left" {{ old('type',$footer->type)=='left' ? 'selected' : ''  }}>Left Side</option>
            <option value="right"{{ old('type',$footer->type)=='right' ? 'selected' : ''  }} >Right Side</option>
            <option value="center"{{ old('type',$footer->type)=='center' ? 'selected' : ''  }}>Center</option>
        </select>
        @if($errors->has('type'))
            <p class="text-danger">{{ $errors->first('type') }}</p>
        @endif
    </div>
    <div class="row ml-2 mt-4">

        <div class="col-3 ">
            <input class="form-check-input" id="is_active" type="checkbox"
                   name="is_active" {{ old('is_active', $footer->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                &nbsp;&nbsp;Is Active
            </label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            {{ $footer->id != 0 ? 'Save Changes' : 'Submit' }}
        </button>
        @if($footer->id != 0)
            <a href="{{ route('admin.api.index') }}">
                <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
            </a>
        @else
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        @endif
    </div>


</form>


