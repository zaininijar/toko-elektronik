<x-customer-layout title="{{ config('app.name') }}">
    <div class="carousel relative container mx-auto" style="max-width:1600px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide-->
            @foreach ($slides as $key => $slide)
                <input class="carousel-open" type="radio" id="carousel-{{ $key + 1 }}" name="carousel"
                    aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item absolute opacity-0 " style="height:50vh;">
                    <div class="h-full w-full mx-auto flex  pt-6 md:pt-0 md:items-center bg-cover bg-right"
                        style="background-image: url('{{ $slide['picture_path'] }}');">
                        <div class="container mx-auto">
                            <div class="flex flex-col w-8/12 mx-auto items-center px-6 tracking-wide py-4"
                                style="background-color: rgba(0, 0, 0, 0.8)">
                                <p class="text-white text-2xl my-4">{{ $slide['title'] }}</p>
                                <a class="text-xl inline-block no-underline border-b border-gray-300 text-gray-400 leading-relaxed hover:text-white hover:border-white"
                                    href="{{ route('customer.product') }}">view product</a>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="carousel-{{ $key }}"
                    class="prev control-{{ $key + 1 }} w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-{{ $key + 1 + 1 }}"
                    class="next control-{{ $key + 1 }} w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
            @endforeach

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                @foreach ($slides as $slide)
                    <li class="inline-block mr-3">
                        <label id="label-carousel-{{ $slide['id'] }}" for="carousel-{{ $slide['id'] }}"
                            class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                    </li>
                @endforeach
            </ol>

        </div>
    </div>

    <section class="bg-white py-8">
        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                        href="#">
                        Store
                    </a>

                    <div class="flex items-center" id="store-nav-content">

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </nav>

            @foreach ($products as $product)
                <div class="w-1/2 md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <a href="#">
                        <div class="w-full overflow-hidden hover:grow hover:shadow-lg relative"
                            style="aspect-ratio: 1 / 1;">
                            <div class="bg-black text-white ml-auto px-4 py-2 absolute text-xs md:text-base">
                                {{ $product->spesification }}
                            </div>
                            <img class="object-cover object-center h-full w-full"
                                src="{{ Str::startsWith($product->picture_path, 'https://') ? $product->picture_path : asset('storage/' . $product->picture_path) }}"
                                alt="{{ $product->name }}" loading="lazy">
                        </div>
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $product->name }}</p>
                            <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                            </svg>
                        </div>
                        <p class="pt-1 text-gray-900">{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}
                        </p>
                    </a>
                </div>
            @endforeach

        </div>

    </section>

    @push('scripts')
        <script>
            window.document.addEventListener('DOMContentLoaded', () => {
                const slideFirstIndex = document.querySelector(
                    "#label-carousel-1");
                if (slideFirstIndex) {
                    slideFirstIndex.click();
                }
            });
        </script>
    @endpush

</x-customer-layout>
