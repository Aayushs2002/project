<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <nav class="bg-gray-100 border-gray-200 fhf:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">

                <span class="self-center text-2xl font-semibold whitespace-nowrap fhf:text-white">User</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 fhf:text-gray-400 fhf:hover:bg-gray-700 fhf:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white fhf:bg-gray-800 md:fhf:bg-gray-900 fhf:border-gray-700">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 fhf:text-white md:fhf:text-blue-500"
                            aria-current="page">News</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <section>
    
  
            
            <div class="border">
                <img src="{{ asset('/images/' . $news->image) }}" />
                <h1 class="font-bold">{{$news->title}}</h1>
            </div>

           <h2>Comment</h2>
           <form method="POST" action="{{route('comment')}}">
            @csrf
               <input type="hidden" name="news_id" value="{{$news->id}}"/>   
               <input type="text" name="body" placeholder="enter comment here"/>   
               <button type="submit">send</button>
            </form>
           
    </section>

</body>

</html>
