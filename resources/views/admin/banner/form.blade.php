<form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="{{ $banner->img }}" name="image">
    @csrf
    <input type="hidden" name="id" value="{{old('id', $banner->id )}}">
    <input type="hidden" value="PUT" name="_method">
    <div class="row">
        <div class="col">
            @if(!is_null($banner->img))
                <img class="ml-4 mb-3" src="{{ asset($banner->img) }}" style="width: 100px; height: 100px;"
                     alt="no image">
            @endif
        </div>
        <div class="row">
            <div class="col-4 mb-3">
                <label for="img" style="margin-bottom: 10px;">Image</label>
                <input type="file" id="img" class="form-control" name="img"
                       value="{{ old('img', $banner->img) }}" {{ (($banner->id == 0 ) ? 'required' : '') }}>
                @if($errors->has('img'))
                    <p class="text-danger">{{ $errors->first('img') }}</p>
                @endif
            </div>
            <div class="col-4 mb-3">
                <label for="name" style="margin-bottom: 10px;">Title</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('title', $banner->name) }}"
                       placeholder="Enter Title" required>
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class=" col-4 mb-3">
                <label for="name" style="margin-bottom: 10px;">Banner Place</label>
                <select class="custom-select" name="type" required>
                    <option value="-1">----Select Banner Place----</option>
                    <option value="nav-left" {{ old('type',$banner->type)=='nav-left' ? 'selected' : ''  }}>Nav Left
                        Side
                    </option>
                    <option value="nav-right"{{ old('type',$banner->type)=='nav-right' ? 'selected' : ''  }} >Nav Right
                        Side
                    </option>
                    <option value="mid"{{ old('type',$banner->type)=='mid' ? 'selected' : ''  }}>Mid Banner</option>
                    <option value="content-left"{{ old('type',$banner->type)=='content-left' ? 'selected' : ''  }}>Body
                        Left Side
                    </option>
                    <option value="content-right"{{ old('type',$banner->type)=='content-right' ? 'selected' : ''  }}>
                        Body Right Side
                    </option>

                </select>
                @if($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>


            <div class="col-4 mb-3">
                <label for="name" style="margin-bottom: 10px;">Link</label>
                <textarea type="text" id="name" class="form-control" name="link"
                          placeholder="Enter Link" required>{{ old('link', $banner->link) }}</textarea>
                @if($errors->has('link'))
                    <p class="text-danger">{{ $errors->first('link') }}</p>
                @endif
            </div>
            <div class="col-4 mb-3">
                <label for="htmllink" style="margin-bottom: 10px;">Html Link</label>
                <textarea type="text" id="htmllink" class="form-control" name="htmllink"
                          placeholder="Enter Link" required>{{ old('link', $banner->htmllink) }}</textarea>

                @if($errors->has('htmllink'))
                    <p class="text-danger">{{ $errors->first('htmllink') }}</p>
                @endif
            </div>
            <div class="row ml-2 mt-4">
                <div class="col-2 ">
                    <input class="form-check-input" id="is_featured" type="checkbox"
                           name="is_featured" {{ old('is_featured', $banner->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_feature">
                        &nbsp;&nbsp;Is Feature
                    </label>
                </div>
                <div class="col-2 ">
                    <input class="form-check-input" id="is_active" type="checkbox"
                           name="is_active" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        &nbsp;&nbsp;Is Active
                    </label>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    {{ $banner->id != 0 ? 'Save Changes' : 'Submit' }}
                </button>
                @if($banner->id != 0)
                    <a href="{{ route('admin.banner.index') }}">
                        <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                    </a>
                @else
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                @endif
            </div>
        </div>
    </div>


</form>


