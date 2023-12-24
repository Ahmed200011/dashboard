@extends('dashboardA.layout.app')

@section('main')
    <h1> {{ trans('validation.custom.main_users_control') }}</h1>

    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">USERS</h5>
            <div class="table-responsive">
                <a href="{{route('dashboard.users.create')}}" type="button" class="btn btn-success m-1 ">{{ trans('validation.custom.Add_user') }}</a>
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Id</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Email</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Roul</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Permission</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr>
                                {{-- @dd($data) --}}
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $user->id }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $user->name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $user->email }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">

                                        @foreach ($user->roles as $role)
                                            <p class="mb-0 fw-normal"> {{ $role->name }}</p>
                                            {{-- <p class="mb-0 fw-normal"> {{$role->permissions->name}}</p> --}}
                                        @endforeach

                                    </p>
                                </td>
                                <td class="border-bottom-0">

                                    <select  class="form-select">
                                        @foreach ($user->roles as $role)
                                        @foreach ($role->permissions as $permission)
                                            <option>
                                                <p class="mb-0 fw-normal"> {{ $permission->display_name }}</p>
                                            </option>
                                            {{-- <p class="mb-0 fw-normal"> {{$role->permissions->name}}</p> --}}
                                        @endforeach
                                        @endforeach
                                    </select>

                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">
                                        <a href="#" type="button" class="btn btn-secondary m-1 ">Edit</a>
                                        <a href="#" type="button" class="btn btn-danger m-1 ">Delet</a>

                                    </p>
                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

@endsection

@section('page_title', trans('validation.custom.main_users_control'))
