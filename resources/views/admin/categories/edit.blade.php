@extends('layouts.dashboard')
@section('content')



    <div class="container">




        <form action="/admin/categories/{{$category->id}}" method="post">

                @csrf
                @method('put')
                <!-- معناها هات الملف واعرضلي اياه هان  -->
                @include('admin.categories/_form')
                <!-- ألحقل في الفور نفس اسم الحقل في الداتا بيس -->
          
        </form>




    </div>
    @endsection