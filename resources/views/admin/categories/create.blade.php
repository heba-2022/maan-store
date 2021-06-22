@extends('layouts.dashboard')
@section('content')


    <div class="container">

        <form action="/admin/categories/store" method="post">

                @csrf
                @include('admin.categories/_form')
                <!-- ألحقل في الفور نفس اسم الحقل في الداتا بيس -->

        </form>





    </div>
    @endsection