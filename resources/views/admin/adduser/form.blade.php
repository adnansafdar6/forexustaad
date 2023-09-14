<form class="form form-vertical" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="{{ $adduser->img }}" name="image">
    @csrf
    <input type="hidden" name="id" value="{{old('id', $adduser->id )}}">
    <input type="hidden" value="PUT" name="_method">

    <div class="row">
        <div class="col">
            @if(!is_null($adduser->img))
                <img class="ml-4 mb-3" src="{{ asset($adduser->img) }}" style="width: 100px; height: 100px;"
                     alt="no image">
            @endif
        </div>
        <div class="row">
            <div class="col-4 mt-3">
                <label for="img" style="margin-bottom: 10px;">Image</label>
                <input type="file" id="img" class="form-control" name="img"
                       value="{{ old('img', $adduser->img) }}" {{ (($adduser->id == 0 ) ? 'required' : '') }}>
                @if($errors->has('img'))
                    <p class="text-danger">{{ $errors->first('img') }}</p>
                @endif

            </div>
            <div class="col-4 mt-3">
                <label for="value" style="margin-bottom: 10px;">Role</label>
                <select class="custom-select" name="role_id" required>
                    <option value="">----Select Role----</option>
                    @foreach($roles as $key => $role)

                        <option
                            value="{{ $role->id }}" {{ ($adduser->role_id== old('id', $role->id))?'selected':'' }}>{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
                @if($errors->has('role-id'))
                    <p class="text-danger">{{ $errors->first('role-id') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">First Name</label>
                <input type="text" id="title" class="form-control" name="fname" value="{{ old('fname', $adduser->fname) }}"
                       placeholder="Enter Title" required>
                @if($errors->has('fname'))
                    <p class="text-danger">{{ $errors->first('fname') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">Last Name</label>
                <input type="text" id="title" class="form-control" name="lname" value="{{ old('lname', $adduser->lname) }}"
                       placeholder="Enter First Name" required>
                @if($errors->has('lname'))
                    <p class="text-danger">{{ $errors->first('lname') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">Email</label>
                <input type="email" id="title" class="form-control" name="email" value="{{ old('email', $adduser->email) }}"
                       placeholder="Enter Email" required>
                @if($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">Mobile</label>
                <input type="number" id="title" class="form-control" name="phone" value="{{ old('phone', $adduser->phone) }}"
                       placeholder="Enter Phone No..." required>
                @if($errors->has('phone'))
                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">WebSite</label>
                <input type="text" id="title" class="form-control" name="web" value="{{ old('web', $adduser->web) }}"
                       placeholder="Enter WebSite Url" required>
                @if($errors->has('web'))
                    <p class="text-danger">{{ $errors->first('web') }}</p>
                @endif
            </div>
            <div class="col-4 mt-3">
                <label for="title" style="margin-bottom: 10px;">Date of Birth</label>
                <input type="date" id="title" class="form-control" name="dob" value="{{ old('dob', $adduser->dob) }}"
                       placeholder="Enter Date of Birth" required>
                @if($errors->has('dob'))
                    <p class="text-danger">{{ $errors->first('dob') }}</p>
                @endif
            </div>
            <div class="col mt-3">
                <label for="desc" style="margin-bottom: 10px;">Address</label>

                <textarea type="text" id="ckeditor" class="form-control" name="address"
                          placeholder="Enter Address"  >{{ old('address', $adduser->address) }}</textarea>

                @if($errors->has('address'))
                    <p class="text-danger">{{ $errors->first('address') }}</p>
                @endif
            </div>
            @if($adduser->id == 0 )
                <div class="col-4 mt-3">
                    <label for="password" style="margin-bottom: 10px;">New Password</label>
                    <div class="icon-eye d-flex align-items-center justify-content-center">
                        <input type="password" id="password" name="password" class="form-control" placeholder="********" required>
                        <i class="fas fa-eye-slash" id="pass"></i>
                    </div>
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-4 mt-3">
                    <label for="password_confirmation" style="margin-bottom: 10px;">Confirm New Password</label>
                    <div class="icon-eye d-flex align-items-center justify-content-center">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="********" required>
                        <i class="fas fa-eye-slash" id="confirm"></i>
                    </div>
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            <div class="row ml-2 mt-4">
                <div class="col-2 ">
                    <input class="form-check-input" id="is_active" type="checkbox"
                           name="is_active" {{ old('is_active', $adduser->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        &nbsp;&nbsp;Is Active
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    {{ $adduser->id != 0 ? 'Save Changes' : 'Submit' }}
                </button>
                @if($adduser->id != 0)
                    <a href="{{ route('admin.adduser.index') }}">
                        <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                    </a>
                @else
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                @endif
            </div>


        </div>
    </div>
</form>
