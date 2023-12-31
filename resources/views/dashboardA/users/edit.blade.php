@extends('dashboardA.layout.app')

@section('main')
    <h1> {{ trans('validation.custom.edit_user') }}</h1>
    {{-- @dd($user_role) --}}

    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form role="form text-left" method="POST" action="{{ route('dashboard.users.update',$user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <x-input-label for="exampleInputName" class="form-label" :value="__('Name')" />
                            <x-text-input type="name" class="form-control" id="exampleInputName" value="{{$user->name}}" name="name"
                                 required autocomplete="username" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="exampleInputEmail1" class="form-label"  :value="__('Email')" />
                            <x-text-input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}"
                                 required autocomplete="username" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="exampleInputPassword1" class="form-label" :value="__('Password')" />
                            <x-text-input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                 />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="Role" class="form-label" :value="__('Role')" />
                            @foreach ($data as $role  )
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name= "role" id="flexRadioDefault{{$role->id}}" value="{{$role->id}}" {{$user->hasRole($role->name)?'checked':''}} >
                                <label  class="form-check-label fw-bold" for="flexRadioDefault{{$role->id}}"  >
                                  {{$role->display_name}}
                                </label>
                              </div>
                            @endforeach
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />

                        </div>
                        <div class="mb-3">
                            <x-input-label for="Role" class="form-label" :value="__('Permission')" />
                            @foreach ($data2 as $perm  )
                            <div class="form-check">
                                {{-- @foreach ($user_perm as $user_p  ) --}}
                                <input class="form-check-input" type="checkbox"  name= "perm[]" id="flexRadioDefault{{$perm->id}}" value="{{$perm->id}}"  {{$user->hasPermission($perm->name)?'checked':''}} >
                                {{-- @endforeach --}}
                                <label  class="form-check-label fw-bold" for="flexRadioDefault{{$perm->id}}"  >
                                  {{$perm->display_name}}
                                </label>
                              </div>

                            @endforeach
                            <x-input-error :messages="$errors->get('perm')" class="mt-2" />

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <a href="{{ url()->previous() }}" type="button" class="btn btn-danger m-1 "> back</a>
        </div>
    </div>



@endsection

@section('page_title', trans('validation.custom.Add_user'))
