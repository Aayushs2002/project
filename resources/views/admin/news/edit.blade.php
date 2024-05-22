@extends('admin.layouts.app')

@section('body')
    <div class="py-5">
        Edit News
    </div>
    <div class="row  w-[80%]">
        <form method="post" action="{{ route('news.update',$news->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mt-5">
                <label for="title" class="font-medium"> title</label>
                <input type="text" placeholder="Type category name here" name="title" id="title"
                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                    value="{{ old('title',$news->title) }}">
            </div>
            <div class="mt-5">
                <label for="description" class="font-medium"> description</label>

                <input type="text" placeholder="Type category name here" name="description" id="description"
                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                    value="{{ old('description',$news->description) }}">
            </div>
            <div class="mt-5">
                <label for="image" class="font-medium">Category Image</label>
                <input type="file" name="image" id="image"
                    class="w-full border py-2 mt-1 outline-none px-3 rounded-md">

            </div>
            <div class="mt-5">
                <label for="date" class="font-medium">date</label>
                <input type="date" name="date" id="date" value="{{ old('date', $news->date) }}" class="w-full border py-2 mt-1 outline-none px-3 rounded-md">

            </div>
            <div class="mt-5">
                <label for="image" class="font-medium">Choose Category</label>
                {{-- @dd($categories) --}}
                <select name="category_id" class="w-full border py-2 mt-1 text-black outline-none px-3 rounded-md">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ old('category_id', $news->category_id) == $category->id? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

            </div>


            <button class="bg-black text-white  py-2 px-5 text-sm mt-5 font-medium rounded-lg">Add</button>
        </form>
    </div>
@endsection
