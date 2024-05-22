@extends('admin.layouts.app')

@section('body')
    <div class="px-5 bg-background w-full">

        <div class="flex justify-between">

            <div class="text-2xl font-bold">News</div>


            <a href='{{ route('news.create') }}'
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
                <span>Add news</span>
            </a>



        </div>
    </div>


    <div class='product-table bg-white p-3 rounded-lg mt-10 font-main font-light shadow'>

        <div class="relative overflow-x-auto">
            <table class="w-full divide-y divide-gray-200">
                <thead class="font-normal p-10">
                    <tr class="">
                        <th scope="col " class="p-2 font-semibold ">
                            title
                        </th>


                        <th scope="col" class="font-semibold ">
                            image
                        </th>
                        <th scope="col" class="font-semibold ">
                            description
                        </th>

                        <th scope="col" class="font-semibold ">
                            Actions
                        </th>
                    </tr>
                </thead>

                @foreach ($newes as $key => $news)
                    <tbody class="bg-white divide-y divide-gray-200 text-center">
                        <tr>
                            <td class="">
                                <div>{{ $news->title }}</div>
                            </td>

                            <td class="p-2" style="width: 100px;">
                                <img class="" src="{{ asset('/images/' . $news->image) }}" alt="Card"
                                    style="width: 70px;">
                            </td>

                            <td>

                                <div>{{ $news->description }}</div>
                            </td>





                            <td>
                                <div class="flex p-2 justify-center items-center">


                                    <a href="{{ route('news.edit', $news->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white">
                                        edit
                                    </a>





                                    <form action="
                                {{ route('news.destroy', $news->id) }}"
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
