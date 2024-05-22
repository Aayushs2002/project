@extends('admin.layouts.app')

@section('body')
    <div class="py-5">
        Add News
    </div>
    <div class="row  w-[80%]">
        <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-5">
                <label for="title" class="font-medium"> title</label>
                <input type="text" placeholder="Type category name here" name="title" id="title"
                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                    value="{{ old('title') }}">
            </div>
            <div class="mt-5">
                <label for="description" class="font-medium"> description</label>

                <input type="text" placeholder="Type category name here" name="description" id="description"
                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                    value="{{ old('description') }}">
            </div>
            <div class="mt-5">
                <label for="image" class="font-medium">Category Image</label>
                <input type="file" name="image" id="image"
                    class="w-full border py-2 mt-1 outline-none px-3 rounded-md">

            </div>
            <div class="mt-5">
                <label for="date" class="font-medium">date</label>
                <input type="date" name="date" id="date"
                    class="w-full border py-2 mt-1 outline-none px-3 rounded-md">

            </div>
            <div class="mt-5">
                <label for="image" class="font-medium">Choose Category</label>
                {{-- @dd($categories) --}}
                <select name="category_id" class="w-full border py-2 mt-1 text-black outline-none px-3 rounded-md">

                    @if (Auth::user()->isSuperUser())
                        <option disabled value="" selected>Choose Category
                        </option>
                    @endif
                    @foreach ($categories as $category)
                        <option class="text-black" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>


            <button class="bg-black text-white  py-2 px-5 text-sm mt-5 font-medium rounded-lg">Add</button>
        </form>
    </div>
@endsection
