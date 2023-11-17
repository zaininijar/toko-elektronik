<x-app-layout title="Products">
    <div class="container grid px-6 mx-auto">
        @if ($errors->any())
            <div class="bg-red-300 px-4 py-2 rounded-md mt-8 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="list-disc list-inside">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-300 px-4 py-2 rounded-md mt-8 text-green-600">
                <div class="list-disc list-inside">{{ session('success') }}</div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-300 px-4 py-2 rounded-md mt-8 text-red-600">
                <div class="list-disc list-inside">{{ session('error') }}</div>
            </div>
        @endif

        <div class="flex w-full justify-between items-center">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 underline ">
                Product list
            </h2>
            <button @click="openModal"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <svg class="w-4 h-4 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    viewBox="0 0 24 24">
                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z" clip-rule="evenodd" fill-rule="evenodd"
                        fill="currentColor"></path>
                </svg>
                <span>Add Product</span>
            </button>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Qty</th>
                            <th class="px-4 py-3">Picture</th>
                            <th class="px-4 py-3">Spesification</th>
                            <th class="px-4 py-3">Desc</th>
                            <th class="px-4 py-3">Created</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($products as $key => $product)
                            <tr class="text-gray-700 dark:text-gray-400" id="product-{{ $product->id }}">
                                <td class="px-4 py-3 text-sm">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $product->name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                10x Sell
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $product->product_category->category_name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ 'Rp ' . number_format($product->price, 2, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $product->quantity . ' unit' }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ Str::startsWith($product->picture_path, 'https://') ? $product->picture_path : asset('storage/' . $product->picture_path) }}"
                                            alt="{{ $product->name }}" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $product->spesification }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <summary>
                                        <details>
                                            <div class="whitespace-pre-line">
                                                {{ $product->description }}
                                            </div>
                                        </details>
                                    </summary>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $product->created_at }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button onclick="showToast({{ $product->id }})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <button
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    1
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    2
                                </button>
                            </li>
                            <li>
                                <button
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    3
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    4
                                </button>
                            </li>
                            <li>
                                <span class="px-3 py-1">...</span>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    8
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    9
                                </button>
                            </li>
                            <li>
                                <button
                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </span>
            </div>
        </div>
    </div>
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
            @keydown.escape="closeModal"
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Add product
                </p>
                <form id="product-add-form" action="{{ route('product.store') }}" method="POST"
                    enctype="multipart/form-data" class="my-8 flex flex-col gap-3">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                        <input name="name" type="text"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Price</span>
                        <input name="price" type="number"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">QTY</span>
                        <input name="quantity" type="number"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Picture</span>
                        <input name="picture_path" type="file"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="" />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Specification</span>
                        <input name="spesification" type="text"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="" />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Description</span>
                        <textarea name="description"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Enter description product."></textarea>
                    </label>
                </form>
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                    eligendi repudiandae voluptatem tempore!
                </p>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="closeModal"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button onclick="productStore()"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </footer>
        </div>
    </div>
    @push('scripts')
        <script>
            function deleteRequest(id) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/product/' + id,
                    type: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        iziToast.success({
                            title: 'OK',
                            message: response,
                        });
                        $('#product-' + id).remove();
                    },
                    error: function(err) {
                        iziToast.error({
                            title: 'Error : ',
                            message: err.responseText.slice(0, 50),
                        });
                    }
                });
            }

            function showToast(id) {
                iziToast.show({
                    theme: 'dark',
                    icon: 'icon-person',
                    title: 'Hey',
                    message: 'Sure to Delete Product ? id: ' + id,
                    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    progressBarColor: 'rgb(0, 255, 184)',
                    buttons: [
                        ['<button>Ok</button>', function(instance, toast) {

                            instance.hide({
                                transitionOut: 'fadeOutUp',
                                onClosing: function(instance, toast, closedBy) {
                                    console.info('closedBy: ' + closedBy);
                                    deleteRequest(id)
                                }
                            }, toast, 'success');

                        }, true], // true to focus

                        ['<button>Close</button>', function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOutUp',
                                onClosing: function(instance, toast, closedBy) {
                                    console.info('closedBy: ' +
                                        closedBy); // The return will be: 'closedBy: success'
                                }
                            }, toast, 'success');
                        }]
                    ],
                    onOpening: function(instance, toast) {
                        console.info('callback abriu!');
                    },
                    onClosing: function(instance, toast, closedBy) {
                        console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                    }
                });

            }

            function productStore() {
                $('#product-add-form').submit();
            }
        </script>
    @endpush
</x-app-layout>
