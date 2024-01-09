@extends('dashboardA.layout.app')

@section('main')
    {{-- <h1> {{ trans('validation.custom.header') }}</h1> --}}
    <h1> category</h1>

    <div class="card w-100">
        <div class="card-body p-4">
            <a href="{{route('dashboard.portfolioCategory.create')}}" class="btn btn-success">Add category</a>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">image</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">name</h6>
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
                        @foreach ($data as $cat)
                            <tr>
                                {{-- @dd($data) --}}

                                <td class="border-bottom-0">
                                    <img src="{{ asset('storage').'/' .$cat->img}}" width="50" height="50">

                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{$cat->name}}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{$cat->text}}</p>
                                </td>

                                <td class="border-bottom-0 d-flex">
                                    <p class="mb-0 fw-normal ">
                                        <a href="{{route('dashboard.portfolioCategory.edit',['portfolioCategory'=>$cat->id])}}" type="button" class="btn btn-secondary m-1">Edit</a>
                                        <form method="post" action="{{route('dashboard.portfolioCategory.destroy',$cat->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1 ">Delet</button>
                                        </form>
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

{{-- @section('page_title', trans('validation.custom.header')) --}}
@section('page_title', 'category')
