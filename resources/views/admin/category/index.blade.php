@extends('admin.layouts.app')

@section('body')
    <div class="px-5 bg-background w-full">

        <div class="flex justify-between">

            <div class="text-2xl font-bold">Categories</div>


            <a href='{{ route('category.create') }}'
                class='bg-blue-500 text-white h-10 p-2 text-sm flex items-center font-main rounded-lg'>
                <svg xmlns="http://www.w3.org/2000/svg" class="svgicon" height="1em" viewBox="0 0 448 512">
                    <style>
                        .svgicon {
                            fill: #ffffff;
                        }
                    </style>
                    <path
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                </svg>
                <span>Add Category</span>
            </a>



        </div>
    </div>


    <div class='product-table bg-white p-3 rounded-lg mt-10 font-main font-light shadow'>

        <div class="relative overflow-x-auto">
            <table class="w-full divide-y divide-gray-200">
                <thead class="font-normal p-10">
                    <tr class="">
                        <th scope="col " class="p-2 font-semibold ">
                            Name
                        </th>


                        <th scope="col" class="font-semibold ">
                            Slug
                        </th>
                        <th scope="col" class="font-semibold ">
                            Actions
                        </th>
                    </tr>
                </thead>

                @foreach ($categories as $key => $category)
                    <tbody class="bg-white divide-y divide-gray-200 text-center">
                        <tr>
                            <td class="">
                                <div>{{ $category->name }}</div>
                            </td>
                            <td class="">
                                <div>{{ $category->slug }}</div>
                            </td>





                            <td>
                                <div class="flex p-2 justify-center items-center">








                                    <form
                                        action="
                                {{ route('category.destroy', $category->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            delete
                                        </button>
                                    </form>


                                </div>
                            </td>
                        </tr>


                    </tbody>
                @endforeach
            </table>
        </div>


    </div>









    </div>
@endsection
