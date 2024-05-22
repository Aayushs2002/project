@extends('admin.layouts.app')

@section('body')
    <form method="post" action="{{ route('user.store') }}">
        @csrf

        <div class="mt-5">
            <label for="username" class="font-medium">User Name</label>
            <input type="text" placeholder="Type Username here" name="name" id="username"
                class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                value="{{ old('username') }}">
        </div>
        <div class="mt-5">
            <label for="email" class="font-medium">Email</label>
            <input type="text" placeholder="Your email address" name="email" id="email"
                class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                value="{{ old('email') }}">
        </div>
        <div class="mt-5">
            <label for="password" class="font-medium">Password</label>
            <input type="password" placeholder="Your password" name="password" id="password"
                class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                value="{{ old('password') }}">
        </div>
        <div class="mt-5">
            <label for="password_confirmation" class="font-medium">Confirm Password</label>
            <input type="password" placeholder="Confirm password" name="password_confirmation" id="password_confirmation"
                class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1">
        </div> 

        <div class="mt-5">
            <label for="image" class="font-medium">Choose Category</label>
            {{-- @dd($categories) --}}
            <select name="category_id" class="w-full border py-2 mt-1 text-black outline-none px-3 rounded-md">

                <option disabled selected>Choose category</option>
                @foreach ($categories as $category)
                    <option class="text-black" value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <button class="bg-black text-white py-2 px-5 text-sm mt-5 font-medium rounded-lg">Add User</button>
    </form>
@endsection
