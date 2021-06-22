<!-- توضيح للارفل انو هذا الملف بستخدم ملف الاي اوت -->
{{-- @extends('layouts.dashboard') --}}

@section('sidebar')
@parent
<ul>
    <li>child</li>
</ul>

@endsection

<!-- 
    طرق العرض للاشياء المتكررة
    1-inhretance (section and yield)

    2-component (slot)
    الافضل استخدم طريقة واحدة 
 -->
{{-- @section('content') --}}

<!-- بفضل بين الكلمات ب داش -->
<!-- page-title = PageTitle في نظام الارفل في ملف الاياوت لازم اكتبو هيك -->
<x-dashboard-layout  page-title='Categories-Layout'>



    <div class="container">
        <h2 class="mb-2">categories</h2>
        <div class="table toolbar mb-4">
            <a href="/admin/categories/create" class="btn btn-sm btn-primary">create
            </a>
        </div>
        {{--
    <!-- بدل ما اقرأ القيمة من الكونترولر وامررها لملف فيو بقرأها مباشر من السشن -->
    <!-- @if($flash_message)
    <div class="alert alert-success">
        {{$flash_message}}
    </div>
    @endif -->
    <!-- @include('partials.flash-message') -->
    --}}
    <x-flash-message />
    <!-- dynamic component -->
    <!-- اي محتوى داحل الكومبوننت تاج الاكس اسمه slot -->
    <x-alert type="danger">
        <x-slot name='title'>
            Alert Title
        </x-slot>
        <p>alert body</p>
    </x-alert>


    <table class="table">
        <thead>

            <tr>
                <th>id</th>
                <th>name</th>
                <th>slug</th>
                <th>parent_id</th>
                <th>created at</th>
                <th>status</th>
                <th></th>
                <th></th>
        </thead>

        <tbody>
            @if (count($entries) >0)
               @foreach ($entries as $category)

            <tr>
                <!--  {{$category->id}} ==  echo  $category->id  == -->
                <td> {{$category->id}} </td>
                <td><a href="/admin/categories/{{$category->id}}">{{ $category->name}}</td>
                <td><?php echo  $category->slug ?></td>
                <td><?php echo  $category->parent_id ?></td>
                <td><?php echo  $category->created_at ?></td>
                <td><?php echo  $category->status ?></td>
                <td>
                    <form action="/admin/categories/{{$category->id}}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>

                <td>
                    <a href="/admin/categories/{{$category->id}}/edit" class="btn btn-sm btn-dark">Edit</a>
                </td>
            </tr>

              @endforeach

            @else
            <tr aria-colspan="6"> no cat</tr>
            @endif

        </tbody>
        </tr>
        </tr>
    </table>
    {{ $entries->links() }}
    </div>




    {{-- @endsection --}}
</x-dashboard-layout>