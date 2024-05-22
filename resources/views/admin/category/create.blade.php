@extends('admin.layouts.app')

@section('body')
<div class="py-5">
    Add Category
</div>
<div class="row  w-[80%]">
    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mt-5">
            <label for="name" class="font-medium"> Name</label>
            <input type="text" placeholder="Type category name here" name="name" id="name" class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1" value="{{ old('name') }}">
        </div>
      

        <button class="bg-black text-white  py-2 px-5 text-sm mt-5 font-medium rounded-lg">Add</button>
    </form>
</div>
@endsection