<form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{old('id', $socialicon->id )}}">
    <input type="hidden" value="PUT" name="_method">

    <div class="mb-3">
        <label for="name" style="margin-bottom: 10px;">Name</label>
        <div class="mb-3">
            <select class="custom-select" name="name" required>
                <option value="-1">----Select Name----</option>
                <option class="Twitter" value="twitter"{{ old('name',$socialicon->name)=='twitter' ? 'selected' : ''  }}>Twitter</option>
                <option class="Youtube" value="youtube"{{ old('name',$socialicon->name)=='youtube' ? 'selected' : ''  }}>Youtube</option>
                <option class="Facebook" value="facebook"{{ old('name',$socialicon->name)=='facebook' ? 'selected' : ''  }}>Facebook</option>
                <option class="LinkedIn" value="linkedin"{{ old('name',$socialicon->name)=='linkedin' ? 'selected' : ''  }}>LinkedIn</option>
                <option class="GooglePlus" value="google-plus"{{ old('name',$socialicon->name)=='google-plus' ? 'selected' : ''  }}>Google Plus</option>
                <option class="Pinterest" value="pinterest"{{ old('name',$socialicon->name)=='pinterest' ? 'selected' : ''  }}>Pinterest</option>
                <option class="Snapchat" value="snapchat"{{ old('name',$socialicon->name)=='snapchat' ? 'selected' : ''  }}>Snapchat</option>
                <option class="Tiktok" value="tiktok"{{ old('name',$socialicon->name)=='tiktok' ? 'selected' : ''  }}>Tiktok</option>
                <option class="Instagram" value="instagram"{{ old('name',$socialicon->name)=='instagram' ? 'selected' : ''  }}>Instagram</option>
            </select>
            @if($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>

        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
    </div>
    <div class="mb-3">
        <label for="name" style="margin-bottom: 10px;">Link</label>

        <input type="text" id="name" class="form-control" name="link" value="{{ old('link', $socialicon->link) }}"
               placeholder="Enter Link" required>

        @if($errors->has('link'))
            <p class="text-danger">{{ $errors->first('link') }}</p>
        @endif
    </div>


    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-1 mb-1">
            {{ $socialicon->id != 0 ? 'Save Changes' : 'Submit' }}
        </button>
        @if($socialicon->id != 0)
            <a href="{{ route('admin.socialicon.index') }}">
                <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
            </a>
        @else
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        @endif
    </div>


</form>

