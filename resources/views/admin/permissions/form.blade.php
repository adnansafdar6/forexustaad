
    <form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{old('id', $permission->id )}}">
            <input type="hidden" value="PUT" name="_method">

        <div class="mb-3">
            <label for="name" style="margin-bottom: 10px;">Route Name</label>

            <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $permission->name) }}"
                   placeholder="Enter Name" required>

            @if($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="mb-3">
            <label for="value" style="margin-bottom: 10px;">guard Name</label>
            <select class="choices custom-select" name="guard_name" required>
                <option value="">----Select Guard Name----</option>
                @foreach($guards as $key => $guard)
                    <option
                        value="{{ $guard }}" {{ ($guard == old('guard_name', $permission->guard_name))?'selected':'' }}>{{ ucfirst($guard) }}</option>
                @endforeach
            </select>
            @if($errors->has('guard_name'))
                <p class="text-danger">{{ $errors->first('guard_name') }}</p>
            @endif
        </div>


        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">
                {{ $permission->id != 0 ? 'Save Changes' : 'Submit' }}
            </button>
            @if($permission->id != 0)
                <a href="{{ route('admin.permissions.index') }}">
                    <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                </a>
            @else
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
            @endif
        </div>

    </form>


