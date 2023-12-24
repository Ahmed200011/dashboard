@extends('dashboardA.layout.app')

@section('main')
    <h1> {{ trans('validation.custom.Add_user') }}</h1>

    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form role="form text-left" accept="{{ route('register') }}" method="POST">
                        @csrf
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
                            <x-input-label for="Role" class="form-label" :value="__('Role')" />
                            @foreach ($data as $role  )
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name= "role" id="flexRadioDefault{{$role->id}}" {{$role->name=='user'?'checked':''}}>
                                <label  class="form-check-label fw-bold" for="flexRadioDefault{{$role->id}}" >
                                  {{$role->display_name}}
                                </label>
                              </div>

                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <a href="{{ url()->previous() }}" type="button" class="btn btn-light m-1 "> back</a>
        </div>
    </div>



@endsection

@section('page_title', trans('validation.custom.Add_user'))
