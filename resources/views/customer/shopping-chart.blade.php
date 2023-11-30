<x-customer-layout title="Shopping Chart">
    <style>
    @layer utilities {

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    }
    </style>
    <section class="bg-white py-8" x-data="{openModalCheckout: false}">
        @if (session('success'))
        <div class="container pb-12 mx-auto  mt-8" x-data="{ openBanner: true }"
            x-init="() => setTimeout(() => openBanner = true, 500)">
            <div x-show="openBanner" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter="transition duration-200 transform ease"
                x-transition:leave="transition duration-200 transform ease" x-transition:leave-end="opacity-0 scale-90"
                class="w-full mx-auto border bg-white inset-x-5 p-5 bottom-40 drop-shadow-2xl flex gap-4 text-left items-center justify-between">
                <div class="w-full">{{ session('success') }}
                    <a href="{{ route('customer.order') }}"
                        class="text-indigo-600 whitespace-nowrap  hover:underline">Cek Pesanan</a>
                </div>
                <div class="flex gap-4 items-center flex-shrink-0">
                    <button @click="openBanner = false, setTimeout(() => openBanner = true, 1500)"
                        class="focus:outline-none hover:underline text-black">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="container mx-auto flex flex-col items-center pt-4 pb-12">
            <input id="APP_URL" type="hidden" value="{{ config('app.url') }}">
            <div class="mx-auto w-full justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="rounded-lg md:w-2/3">
                    @foreach ($shopping_charts as $key => $shopping_chart)
                    <div id="product" data-id="product-{{ $shopping_chart->product->id }}"
                        class="justify-between mb-6 rounded-lg bg-white p-6 border shadow-md sm:flex sm:justify-start">
                        <div class="w-3/12 h-24 overflow-hidden relative rounded-lg ">
                            <img src="{{ Str::startsWith($shopping_chart->product->picture_path, 'https://') ? $shopping_chart->product->picture_path : asset('storage/' . $shopping_chart->product->picture_path) }}"
                                alt="{{ $shopping_chart->product->name }}" loading="lazy"
                                class="object-cover object-center" />
                        </div>
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between items-start">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-900">{{ $shopping_chart->product->name }}</h2>
                                <p class="mt-1 text-xs text-gray-700">{{ $shopping_chart->product->spesification }}</p>
                                <p class="mt-1 text-xs text-gray-700">Sisa Stok :
                                    {{ $shopping_chart->product->quantity }}
                                </p>
                            </div>
                            <div class="flex flex-col justify-start gap-4 items-end">
                                <div class="flex items-center border-gray-100">
                                    <span onclick="decrement(event)" data-is-form="false"
                                        class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-black hover:text-white">
                                        - </span>
                                    <input class="h-8 w-8 border bg-white text-center text-xs outline-none"
                                        type="number" value="{{ $shopping_chart->qty }}" min="1" id="qty-perproduct"
                                        max="{{ $shopping_chart->product->qty }}" />
                                    <span onclick="increment(event)" data-is-form="false"
                                        class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-black hover:text-white">
                                        + </span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <p class="font-semibold text-lg">
                                        Rp{{ number_format($shopping_chart->product->price * $shopping_chart->qty, 2, ',', '.')  }}
                                    </p>
                                    <input type="hidden" id="price-default"
                                        value="{{ $shopping_chart->product->price }}">
                                    <input type="hidden" id="price-total-perproduct"
                                        value="{{ $shopping_chart->product->price * $shopping_chart->qty }}">
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 flex items-center ml-4">
                            <svg onclick="alertDelete(event)" data-id="{{ $shopping_chart->id }}"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Sub total -->
                <div class=" h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">Subtotal</p>
                        <p id="display-subtotal" class="text-gray-700">
                            Rp{{ number_format($amount_default['subtotal'], 2, ',', '.') }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-gray-700">Shipping</p>
                        <p class="text-gray-700">Rp{{ number_format($amount_default['shipping_cost'], 2, ',', '.') }}
                        </p>
                    </div>
                    <hr class="my-4" />
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total</p>
                        <div class="">
                            <p id="display-total" class="mb-1 text-lg font-bold">
                                Rp{{ number_format($amount_default['total'], 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <button @click="openModalCheckout = true" onclick="initForm()"
                        class="mt-6 w-full rounded-md bg-black py-1.5 font-medium text-white hover:bg-gray-700">
                        Check out
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div style="backdrop-filter: blur(2px) grayscale(90%);" x-show="openModalCheckout"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal Body -->
            <div x-show="openModalCheckout" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="openModalCheckout = false"
                @keydown.escape="openModalCheckout = false"
                class="w-full px-6 py-4 overflow-hidden bg-white  dark:bg-gray-800 sm:m-4 container" role="dialog"
                id="modal">
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="openModalCheckout = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <div class="w-full bg-white px-5 pb-10 pt-5 text-gray-800">
                    <form action="{{ route('customer.create-order') }}" method="post" class="w-full">
                        @csrf
                        <div class="-mx-3 md:flex">
                            <div class="px-3 md:w-7/12 lg:pr-10 flex flex-col justify-between min-h-full">
                                <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">
                                    @foreach ($shopping_charts as $key => $shopping_chart )

                                    <div id="product" data-id="product-{{ $shopping_chart->product->id }}"
                                        class="w-full flex items-center">
                                        <div class="overflow-hidden w-16 h-16 bg-gray-50 border-b border-gray-200">
                                            <img class="object-cover object-center w-full h-full hover:grow hover:shadow-md"
                                                src="{{ Str::startsWith($shopping_chart->product->picture_path, 'https://') ? $shopping_chart->product->picture_path : asset('storage/' . $shopping_chart->product->picture_path) }}"
                                                alt="{{ $shopping_chart->product->name }}" loading="lazy">
                                        </div>
                                        <input type="hidden" name="products[{{ $key }}][id]"
                                            value="{{ $shopping_chart->product->id }}">
                                        <div class="flex-grow pl-3">
                                            <h6 class="font-semibold uppercase text-gray-600">
                                                {{ $shopping_chart->product->name }}</h6>
                                            <div class="flex gap-4">
                                                <div class="flex items-center">
                                                    <input type="number" id="qty-perproduct-form"
                                                        class="w-12 bg-white p-0 focus:outline-none text-center font-semibold text-md outline-none"
                                                        name="products[{{ $key }}][qty]"
                                                        value="{{ $shopping_chart->qty }}" min="1"
                                                        max="{{ $shopping_chart->product->quantity }}" />
                                                </div>
                                                <div class="">MAX : {{ $shopping_chart->product->quantity }}</div>
                                            </div>
                                        </div>
                                        <div>
                                            <span id="price-perproduct-display"
                                                class="font-semibold text-gray-600 text-xl">
                                                {{ 'Rp ' . number_format($shopping_chart->product->price, 2, ',', '.') }}
                                            </span>
                                            <input id="product-price-default" type="hidden"
                                                value="{{ $shopping_chart->product->price }}">
                                            <input id="product-price-input" type="hidden"
                                                value="{{ $shopping_chart->product->price }}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="flex flex-col justify-end">
                                    <div class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                                        <div class="w-full flex mb-3 items-center">
                                            <div class="flex-grow">
                                                <span class="text-gray-600">Subtotal</span>
                                            </div>
                                            <div class="pl-3">
                                                <span class="font-semibold"
                                                    id="subtotal-amount-display">{{ 'Rp ' . number_format($amount_default['subtotal'], 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <div class="w-full flex items-center">
                                            <div class="flex-grow">
                                                <span class="text-gray-600">Pengiriman</span>
                                            </div>
                                            <div class="pl-3">
                                                <span class="font-semibold">Rp12.500,00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b border-gray-200 md:border-none text-gray-800 text-xl">
                                        <div class="w-full flex items-center">
                                            <div class="flex-grow">
                                                <span class="text-gray-600">Total Bayar</span>
                                            </div>
                                            <div class="pl-3">
                                                <span class="font-semibold text-gray-400 text-sm">IDR</span>
                                                <span class="font-semibold"
                                                    id="total-amount-display">{{ number_format($amount_default['total'], 2, ',', '.') }}</span>
                                                <input type="hidden" value={{ $amount_default['total'] }}"
                                                    id="total-amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 md:w-5/12">
                                <div
                                    class="w-full mx-auto bg-white border border-gray-200 p-3 text-gray-800 font-light mb-6">
                                    <div class="w-full flex mb-3 items-center">
                                        <div class="w-32">
                                            <span class="text-gray-600 font-semibold">Nama Penerima</span>
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <input class="border text-sm w-full px-2 py-1 outline-none"
                                                name="recipient_name" type="text" placeholder="Alberta Turner">
                                        </div>
                                    </div>
                                    <div class="w-full flex mb-3 items-center">
                                        <div class="w-32">
                                            <span class="text-gray-600 font-semibold">Nomor Hp</span>
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <input class="border text-sm w-full px-2 py-1 outline-none"
                                                name="phone_number" type="text" placeholder="+62 880">
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center">
                                        <div class="w-32">
                                            <span class="text-gray-600 font-semibold">Alamat</span>
                                        </div>
                                        <div class="flex-grow pl-3">
                                            <textarea class="border text-sm w-full px-2 py-1 outline-black outline-none"
                                                name="shipped_address" id="address"
                                                placeholder="1113 Gaozi View"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="w-full mx-auto bg-white border border-gray-200 text-gray-800 font-light mb-6">
                                    <div class="w-full p-3 border-b border-gray-200">
                                        <div class="mb-5">
                                            <label for="payment-rekening" class="flex items-center cursor-pointer">
                                                <input type="radio" class="form-radio h-5 w-5 text-black"
                                                    name="payment_type" id="payment-rekening" value="REKENING" checked>
                                                <div class="flex">
                                                    <img src="{{ asset('img/payment/mandiri.png') }}" class="h-6 ml-3">
                                                    <img src="{{ asset('img/payment/bni.svg') }}" class="h-6 ml-3">
                                                    <img src="{{ asset('img/payment/bri.png') }}" class="h-6 ml-3">
                                                </div>
                                            </label>
                                        </div>
                                        <div>
                                            <div class="mb-3">
                                                <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">
                                                    Atas Nama
                                                </label>
                                                <div>
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 focus:outline-none focus:border-black transition-colors"
                                                        name="account_name" placeholder="John Smith" type="text" />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="text-gray-600 font-semibold text-sm mb-2 ml-1">
                                                    Nomor Rekening
                                                </label>
                                                <div>
                                                    <input
                                                        class="w-full px-3 py-2 mb-1 border border-gray-200 focus:outline-none focus:border-black transition-colors"
                                                        name="account_number" placeholder="0000 0000 0000 0000"
                                                        type="text" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full p-3">
                                        <label for="payment-ewallet" class="flex items-center cursor-pointer">
                                            <input type="radio" class="form-radio h-5 w-5 text-black"
                                                name="payment_type" id="payment-ewallet" value="E-WALLET">
                                            <div class="flex ml-3">
                                                <div class="bg-blue-500 flex justify-center items-center rounded p-1">
                                                    <img src="{{ asset('img/payment/dana.png') }}" class="h-2" />
                                                </div>
                                                <div class="flex justify-center items-center rounded p-1">
                                                    <img src="{{ asset('img/payment/ovo.svg') }}" class="h-2" />
                                                </div>
                                                <div class="bg-green-500 flex justify-center items-center rounded p-1">
                                                    <img src="{{ asset('img/payment/gopay.png') }}" class="h-2" />
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="flex w-full items-center justify-center ml-auto text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">
                                        PAY NOW
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
    function decrement(e) {
        let target = e.target;
        let inputQty = '';

        inputQty = target.nextElementSibling;

        let priceElement = inputQty.parentElement.nextElementSibling.children[0]
        let priceDefault = inputQty.parentElement.nextElementSibling.children[1]
        let pricePerproduct = inputQty.parentElement.nextElementSibling.children[2]

        let value = Number(inputQty.value)

        if (value == 1) {
            return false;
        }

        value--;
        inputQty.value = value;
        let price = Number(priceDefault.value) * value
        priceElement.innerText = IDRFormmaterCurrencry(price)
        pricePerproduct.value = price

        getAmount()
    }

    function IDRFormmaterCurrencry(number) {
        const formattedNumber = new Intl.NumberFormat('id-ID', {
            style: "currency",
            currency: 'IDR'
        }).format(number);

        return formattedNumber
    }

    function increment(e) {

        let target = e.target;
        let inputQty = '';

        inputQty = target.previousElementSibling;

        let priceElement = inputQty.parentElement.nextElementSibling.children[0]
        let priceDefault = inputQty.parentElement.nextElementSibling.children[1]
        let pricePerproduct = inputQty.parentElement.nextElementSibling.children[2]

        let value = Number(inputQty.value)

        if (value == Number(inputQty.max)) {
            return false
        }

        value++;
        inputQty.value = value;
        let price = Number(priceDefault.value) * value
        priceElement.innerText = IDRFormmaterCurrencry(price)
        pricePerproduct.value = price

        getAmount()

    }

    const priceTotalPerproduct = document.querySelectorAll('#price-total-perproduct')
    const displayTotal = document.getElementById('display-total')
    const displaySubtotal = document.getElementById('display-subtotal')
    const qtyPerproduct = document.querySelectorAll('#qty-perproduct');

    const getAmount = () => {

        let priceSubtotal = 0
        let shippingCost = 12500

        priceTotalPerproduct.forEach(el => {
            priceSubtotal += Number(el.value)
        })

        displaySubtotal.innerText = IDRFormmaterCurrencry(priceSubtotal)
        displayTotal.innerText = IDRFormmaterCurrencry(priceSubtotal + shippingCost)
    }

    const initForm = () => {
        const totalAmountDisplay = document.getElementById("total-amount-display")
        const subtotalAmountDisplay = document.getElementById("subtotal-amount-display")
        const pricePerproductDisplay = document.querySelectorAll("#price-perproduct-display")
        const qtyPerproductForm = document.querySelectorAll("#qty-perproduct-form")

        totalAmountDisplay.innerText = displayTotal.innerText
        subtotalAmountDisplay.innerText = displaySubtotal.innerText

        pricePerproductDisplay.forEach((el, key) => {
            el.innerText = IDRFormmaterCurrencry(priceTotalPerproduct[key].value)
        })

        qtyPerproductForm.forEach((el, key) => {
            el.value = qtyPerproduct[key].value
        })
    }

    const alertDelete = (e) => {

        iziToast.show({
            theme: 'dark',
            icon: 'icon-person',
            title: 'Hey',
            message: 'Sure to Delete Shopping Chart ? id: ' + e.target.dataset.id,
            position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
                ['<button>Ok</button>', function(instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOutUp',
                        onClosing: function(instance, toast, closedBy) {
                            console.info('closedBy: ' + closedBy);
                            destroyShoppingChart(e)
                        }
                    }, toast, 'success');

                }, true], // true to focus

                ['<button>Close</button>', function(instance, toast) {
                    instance.hide({
                        transitionOut: 'fadeOutUp',
                        onClosing: function(instance, toast, closedBy) {
                            console.info('closedBy: ' +
                                closedBy
                            ); // The return will be: 'closedBy: success'
                        }
                    }, toast, 'success');
                }]
            ],
            onOpening: function(instance, toast) {
                console.info('callback abriu!');
            },
            onClosing: function(instance, toast, closedBy) {
                console.info('closedBy: ' +
                    closedBy); // tells if it was closed by 'drag' or 'button'
            }
        });
    }

    const destroyShoppingChart = (e) => {
        var xhr = new XMLHttpRequest();
        const parentProduct = e.target.parentElement.parentElement.dataset.id
        const parenProductById = document.querySelectorAll("#product")

        let id = e.target.dataset.id
        let APP_URL = document.getElementById('APP_URL').value
        let csrfToken = document.querySelector('meta[name="csrf-token"]').content

        console.log(APP_URL);

        xhr.open('DELETE', `${APP_URL}/shopping-chart/${id}`, true)
        xhr.setRequestHeader('Content-Type', 'application/json')
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken)

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                iziToast.success({
                    title: 'OK',
                    message: JSON.parse(xhr.responseText),
                });
                parenProductById.forEach(el => {
                    if (el.dataset.id == parentProduct) {
                        el.remove()
                    }
                })
                console.log(JSON.parse(xhr.responseText));
            } else {
                iziToast.error({
                    title: 'OK',
                    message: xhr.statusText,
                });
                console.error('Error:', xhr.status, xhr.statusText);
            }
        };

        xhr.onerror = function() {
            console.error('Request failed');
        };

        xhr.send(data);

    }
    </script>
    @endpush









</x-customer-layout>