
<form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="{{ $post->img }}" name="image">
    <input type="hidden" value="{{ $post->is_active }}" name="is_active">
    @csrf
    <input type="hidden" name="id" value="{{old('id', $post->id )}}">
    <input type="hidden" value="PUT" name="_method">

    <div class="row">
        <div class="col">
            @if(!is_null($post->img))
                <img class="ml-4 mb-3" src="{{ asset($post->img) }}" style="width: 100px; height: 100px;"
                     alt="no image">
            @endif
        </div>
        <div class="row">
            <div class="col-4 mt-3">
                <label for="img" style="margin-bottom: 10px;">Image</label>
                <input type="file" id="img" class="form-control" name="img"
                       value="{{ old('img', $post->img) }}" {{ (($post->id == 0 ) ? 'required' : '') }}>
                @if($errors->has('img'))
                    <p class="text-danger">{{ $errors->first('img') }}</p>
                @endif

            </div>
            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">Category</label>
                <select class="custom-select" name="category_id" required>
                    <option value="">----Select Category----</option>
                    @foreach($categories[0]['subcategories'] as $key => $subcat)

                        <option
                            value="{{ $subcat->id }}" {{ ($post->category_id== old('id', $subcat->id))?'selected':''  }}>{{ ucfirst($subcat->name) }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">Visibility</label>
                <select class="custom-select" name="role_id">
                    <option value="">----Select Visibility----</option>
                    @foreach($roles as $key => $role)
                        <option
                            @if ($role->name=== 'public'&$post->id==0)
                                {{'selected="selected"'}}
                            @else
                                {{ ($post->role_id == old('id', $role->id))?'selected':'' }}
                            @endif
                            value="{{ $role->id }}" >{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
                @if($errors->has('visibility'))
                    <p class="text-danger">{{ $errors->first('visibility ') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">Title</label>
                <input type="text" id="title" class="form-control" name="title" value="{{ old('title', $post->title) }}"
                       placeholder="Enter Title" required>
                @if($errors->has('title'))
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <div id="leavebtn2" class="text-left ">
                    <a href="#" id="open-review-box2" class="btn hvr-hover pt-4">Add Slug </a>
                </div>
                <div class="" id="post-review-box2" style="display:none;">
                    <label for="slug" style="margin-bottom: 10px;">Slug</label>
                    <a class="ml-4" id="close-review-box2" href="#" title="Close"><i class="fa-solid fa-xmark"
                                                                                     style="color: #ff0000;"></i></a>
                    <input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}"
                           placeholder="Enter slug">

                    @if($errors->has('slug'))
                        <p class="text-danger">{{ $errors->first('slug') }}</p>
                    @endif
                </div>
            </div>
            <div class="col-4 mt-3">
                <div id="leavebtn3" class="text-left ">
                    <a href="#" id="open-review-box3" class="btn hvr-hover pt-4">Add Embed Link </a>
                </div>
                <div class="" id="post-review-box3" style="display:none;">
                    <label for="slug" style="margin-bottom: 10px;">Embed Link </label>
                    <a class="ml-4" id="close-review-box3" href="#" title="Close"><i class="fa-solid fa-xmark"
                                                                                     style="color: #ff0000;"></i></a>
                    <textarea type="text" id="embed" class="form-control" name="embed"
                              placeholder="Enter Embeded Link">{{ old('embed', $post->embed) }}</textarea>

                    @if($errors->has('embed'))
                        <p class="text-danger">{{ $errors->first('embed') }}</p>
                    @endif
                </div>
            </div>

            <div class="col-4 mt-3">
                <div id="leavebtn" class="text-left ">
                    <a href="#" id="open-review-box" class="btn hvr-hover pt-4">Add Keywords </a>
                </div>
                <div class="" id="post-review-box" style="display:none;">
                    <label for="keywords" style="margin-bottom: 10px;">SEO Keywords </label>
                    <a class="ml-4" id="close-review-box" href="#" title="Close"><i class="fa-solid fa-xmark"
                                                                                    style="color: #ff0000;"></i></a>
                    <input type="text" id="keywords" class="form-control" name="keywords"
                           value="{{ old('keywords', $post->keywords) }}"
                           placeholder="Enter Keywords">

                    @if($errors->has('keywords'))
                        <p class="text-danger">{{ $errors->first('keywords') }}</p>
                    @endif
                </div>
            </div>
            <div class="col-4 mt-3">
                <div id="leavebtn1" class="text-left ">
                    <a href="#" id="open-publish" class="btn hvr-hover pt-4"> Add Publish </a>
                </div>
                <div class="" id="inputs" style="display:none;">
                    <label for="keywords" style="margin-bottom: 10px;">Publish Post </label>
                    <a class="ml-4" id="close-publish" href="#" title="Close"><i class="fa-solid fa-xmark"
                                                                                 style="color: #ff0000;"></i></a>
                    <input type="datetime-local" id="keywords" class="form-control" name="datetime"
                           value="{{ old('datetime', $post->datetime) }}"
                           placeholder="Enter Date">
                    @if($errors->has('datetime'))
                        <p class="text-danger">{{ $errors->first('datetime') }}</p>
                    @endif
                </div>
            </div>
            <div class="col mt-4">
                <label for="desc" style="margin-bottom: 10px;">Description</label>

                <textarea type="text" id="ckeditor" class="form-control" name="desc"
                          placeholder="Enter Description">{{ old('desc', $post->desc) }}</textarea>

                @if($errors->has('desc'))
                    <p class="text-danger">{{ $errors->first('desc') }}</p>
                @endif
            </div>

            <div class="row ml-2 mt-4">
                <div class="col-2 ">
                    <input class="form-check-input" id="is_feature" type="checkbox"
                           name="is_feature" {{ old('is_feature', $post->is_feature) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_feature">
                        &nbsp;&nbsp;Is Feature
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    {{ $post->id != 0 ? 'Save Changes' : 'Submit' }}
                </button>
                @if($post->id != 0)
                    <a href="{{ route('admin.post.index') }}">
                        <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                    </a>
                @else
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                @endif
            </div>


        </div>
    </div>
</form>
