@extends('dashboardA.layout.app')

@section('main')
    <h1> {{ trans('validation.custom.edit_user') }}</h1>
    {{-- @dd($user_role) --}}

    <div class="card">
        <div class="card-body">
            <div class="card">
                <img src="{{ asset('storage').'/' .$category->img}}" width="150" height="150">

                <div class="card-body">

                    {{-- <form action="{{route('item.update',['item'=>$item->id])}}"   > --}}

                    <form role="form text-left" action="{{ route('dashboard.portfolioCategory.update', ['portfolioCategory'=>$category->id])}}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <x-input-label for="exampleInputName" class="form-label" :value="__('name')" />
                            <x-text-input type="name" class="form-control" id="exampleInputName"
                                value="{{ $category->name }}" name="name" required autocomplete="username" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="exampleInputEmail1" class="form-label" :value="__('text')" />
                            <x-text-input type="text" class="form-control" id="exampleInputEmail1" name="text"
                                value="{{ $category->text }}" required autocomplete="username" />
                        </div>
                        <div class="mb-3">

                            <input type="file" class="form-label" name="img" >

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
