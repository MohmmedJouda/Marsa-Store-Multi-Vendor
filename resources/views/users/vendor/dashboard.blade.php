@extends('layout')
@section('content')


<div class=" container d-sm-flex align-items-center justify-content-between" style="margin-top: -20px">

<div>
    <h1 class=" text-gray-800" >الاحصائيات</h1>
</div>

<div>
</div>

<div class="d-sm-flex align-items-center justify-content-between">


    <a href="{{route('vendor.categories.index')}}" class="btn btn-sm btn-primary shadow-sm mr-2"> الأقسام</a>
    {{-- <a href="{{route('category.trashed')}}" class="btn btn-sm btn-danger shadow-sm "><i class="fa-solid fa-plus"></i> Trash</a> --}}

</div>

</div>

@endsection
