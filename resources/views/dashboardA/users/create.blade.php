@extends('dashboardA.layout.app')

@section('main')
    <h1> {{ trans('validation.custom.Add_user') }}</h1>

    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('dashbord/assets/images/default.jpg') }}" alt="" srcset="" width="200"
                    height="200" name='img' id="previewImage" style="object-fit: cover">
            </div>
            <div class="card">
                <div class="card-body">


                    <form role="form text-left" method="POST" action="{{ route('dashboard.users.store') }}">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <x-input-label for="exampleInputName" class="form-label" :value="__('Name')" />
                            <x-text-input type="name" class="form-control" id="exampleInputName" name="name"
                                :value="old('name')" required autocomplete="username" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="exampleInputEmail1" class="form-label" :value="__('Email')" />
                            <x-text-input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="exampleInputPassword1" class="form-label" :value="__('Password')" />
                            <x-text-input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="imageInput">
                        </div>
                        <div class="mb-3">
                            <x-input-label for="Role" class="form-label" :value="__('Role')" />
                            @foreach ($data as $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name= "role"
                                        id="flexRadioDefault{{ $role->id }}" value="{{ $role->id }}"
                                        {{ $role->name == 'user' ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="flexRadioDefault{{ $role->id }}">
                                        {{ $role->display_name }}
                                    </label>
                                </div>
                            @endforeach
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />

                        </div>
                        <div class="mb-3">
                            <x-input-label for="Role" class="form-label" :value="__('Permission')" />
                            @foreach ($data2 as $perm)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name= "perm[]"
                                        id="flexRadioDefault{{ $perm->id }}" value="{{ $perm->id }}">
                                    <label class="form-check-label fw-bold" for="flexRadioDefault{{ $perm->id }}">
                                        {{ $perm->display_name }}
                                    </label>
                                </div>
                            @endforeach
                            <x-input-error :messages="$errors->get('perm')" class="mt-2" />

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <script>
                        const imageInput = document.getElementById("imageInput");
                        const previewImage = document.getElementById("previewImage");

                        imageInput.addEventListener("change", function(event) {
                            const file = event.target.files[0];

                            // Check for valid image file
                            if (file && file.type.startsWith("image/")) {
                                const reader = new FileReader();

                                reader.onload = function(event) {
                                    previewImage.src = event.target.result;
                                };

                                reader.readAsDataURL(file);
                            } else {
                                previewImage.src = ""; // Clear preview if not an image
                                alert("Please select an image file.");
                            }
                        });
                    </script>
                </div>
            </div>
            <a href="{{ url()->previous() }}" type="button" class="btn btn-light m-1 "> back</a>
        </div>
    </div>



@endsection

@section('page_title', trans('validation.custom.Add_user'))
