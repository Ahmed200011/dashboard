@extends('dashboardA.layout.app')

@section('main')
    <h1> {{ trans('validation.custom.header') }}</h1>

    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">data</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">image</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">text</h6>
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
                                    <img src="{{ asset('storage/'. $user->img) }}" width="50" height="50">

                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{$user->name}}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{$user->text}}</p>
                                </td>

                                <td class="border-bottom-0 d-flex">
                                    <p class="mb-0 fw-normal ">
                                        <a href="{{route('dashboard.portfolioHeader.edit',$user->id)}}" type="button" class="btn btn-secondary m-1">Edit</a>
                                    </p>
                                </td>

                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

@section('page_title', trans('validation.custom.header'))
