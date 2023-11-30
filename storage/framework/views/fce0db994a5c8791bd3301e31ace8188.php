<?php if (isset($component)) { $__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f = $component; } ?>
<?php $component = App\View\Components\CustomerLayout::resolve(['title' => 'Product Detail'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div x-data="{ open: false, openModalShoppingChart: false }">
        <?php if(session('success')): ?>
        <div class="container pb-12 mx-auto  mt-8" x-data="{ openBanner: true }"
            x-init="() => setTimeout(() => openBanner = true, 500)">
            <div x-show="openBanner" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter="transition duration-200 transform ease"
                x-transition:leave="transition duration-200 transform ease" x-transition:leave-end="opacity-0 scale-90"
                class="w-full mx-auto border bg-white inset-x-5 p-5 bottom-40 drop-shadow-2xl flex gap-4 text-left items-center justify-between">
                <div class="w-full"><?php echo e(session('success')); ?>

                    <a href="<?php echo e(route('customer.order')); ?>"
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
        <?php endif; ?>

        <section class="text-gray-700 body-font overflow-hidden bg-white">
            <div class="container px-5 py-24 mx-auto border">
                <div class="md:w-4/5 mx-auto flex flex-wrap">
                    <div onmousemove="zoom(event)" class="md:w-1/2 w-full relative overflow-hidden rounded"
                        style="cursor: zoom-in;aspect-ratio: 1/1; background-position: 50% 50%; background-image: url(<?php echo e(Str::startsWith($product->picture_path, 'https://') ? $product->picture_path : asset('storage/' . $product->picture_path)); ?>);">
                        <img style="transition: all 5 ease;"
                            class="w-full h-full object-cover hover:opacity-0 rounded object-center border border-gray-200"
                            src="<?php echo e(Str::startsWith($product->picture_path, 'https://') ? $product->picture_path : asset('storage/' . $product->picture_path)); ?>"
                            alt="<?php echo e($product->name); ?>" loading="lazy">
                    </div>
                    <div class="md:w-1/2 w-full md:pl-10 md:py-6 mt-6 md:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest">BOLA LAMPU</h2>
                        <h1 class="text-gray-900 text-3xl title-font font-bold mb-1"><?php echo e($product->name); ?></h1>
                        <h2>
                            <?php echo e($product->spesification); ?>

                        </h2>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-black"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-black"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-black"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-black"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 text-black" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z">
                                    </path>
                                </svg>
                                <span class="text-gray-600 ml-3">4 sold</span>
                            </span>
                            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                </a>
                                <a class="ml-2 text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path
                                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                        </path>
                                    </svg>
                                </a>
                                <a class="ml-2 text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>
                                </a>
                            </span>
                        </div>
                        <p class="leading-relaxed">
                            <?php echo e($product->description); ?>

                        </p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                            <?php echo e($product->quantity); ?> Unit Tersedia
                        </div>
                        <div class="flex mt-6 items-center pb-5 mb-5">
                            <span class="title-font text-2xl text-gray-900">
                                <?php echo e('Rp' . number_format($product->price, 2, ',', '.')); ?>

                            </span>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex gap-2">
                                <button @click="open = true"
                                    class="flex items-center justify-center ml-auto text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">
                                    Checkout Now
                                </button>
                                <button @click="openModalShoppingChart = true" data-product-id="<?php echo e($product->id); ?>"
                                    class="flex items-center justify-center gap-2 ml-auto text-black bg-white border border-black py-2 px-6 focus:outline-none hover:bg-black hover:text-white rounded">
                                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                                        <circle cx="10.5" cy="18.5" r="1.5" />
                                        <circle cx="17.5" cy="18.5" r="1.5" />
                                    </svg>
                                    <span>Add to chart</span>
                                </button>
                            </div>
                            <button
                                class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 hover:text-black ml-4">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    class="w-5 h-5" viewBox="0 0 24 24">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-white py-8">
            <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                            href="#">
                            Related Products
                        </a>

                        <div class="flex items-center" id="store-nav-content">

                            <a class="pl-3 inline-block no-underline hover:text-black"
                                href="<?php echo e(route('customer.product')); ?>">
                                View All
                            </a>

                        </div>
                    </div>
                </nav>

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productRelate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-1/2 md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <a href="<?php echo e(route('customer.product.show', $productRelate->id)); ?>">
                        <div class="w-full overflow-hidden hover:grow hover:shadow-lg relative"
                            style="aspect-ratio: 1 / 1;">
                            <div class="bg-black text-white ml-auto px-4 py-2 absolute text-xs md:text-base">
                                <?php echo e($productRelate->spesification); ?>

                            </div>
                            <img class="object-cover object-center h-full w-full"
                                src="<?php echo e(Str::startsWith($productRelate->picture_path, 'https://') ? $productRelate->picture_path : asset('storage/' . $productRelate->picture_path)); ?>"
                                alt="<?php echo e($productRelate->name); ?>" loading="lazy">
                        </div>
                        <div class="pt-3 flex items-center justify-between">
                            <p class=""><?php echo e($productRelate->name); ?></p>
                            <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                            </svg>
                        </div>
                        <p class="pt-1 text-gray-900"><?php echo e('Rp ' . number_format($productRelate->price, 2, ',', '.')); ?>

                        </p>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </section>

        <!-- Modal -->
        <div style="backdrop-filter: blur(2px) grayscale(90%);" x-show="open"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal Body -->
            <div x-show="open" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="open = false"
                @keydown.escape="open = false"
                class="w-full px-6 py-4 overflow-hidden bg-white  dark:bg-gray-800 sm:m-4 container" role="dialog"
                id="modal">
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="open = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <div class="w-full bg-white px-5 pb-10 pt-5 text-gray-800">
                    <form action="<?php echo e(route('customer.create-order')); ?>" method="post" class="w-full">
                        <?php echo csrf_field(); ?>
                        <div class="-mx-3 md:flex">
                            <div class="px-3 md:w-7/12 lg:pr-10 flex flex-col justify-between min-h-full">
                                <div class="w-full mx-auto text-gray-800 font-light mb-6 border-b border-gray-200 pb-6">

                                    <div class="w-full flex items-center">
                                        <div class="overflow-hidden w-16 h-16 bg-gray-50 border-b border-gray-200">
                                            <img class="object-cover object-center w-full h-full hover:grow hover:shadow-md"
                                                src="<?php echo e(Str::startsWith($product->picture_path, 'https://') ? $product->picture_path : asset('storage/' . $product->picture_path)); ?>"
                                                alt="<?php echo e($product->name); ?>" loading="lazy">
                                        </div>
                                        <input type="hidden" name="products[0][id]" id="id" value="<?php echo e($product->id); ?>">
                                        <div class="flex-grow pl-3">
                                            <h6 class="font-semibold uppercase text-gray-600"><?php echo e($product->name); ?></h6>
                                            <div class="flex gap-4">
                                                <div class="flex items-center">
                                                    <button type="button" onclick="decrement(event)"
                                                        class="bg-white text-black hover:text-white hover:bg-black border border-black rounded-full flex justify-center items-center w-4 h-4 cursor-pointer outline-none">
                                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path d="M5 11V13H19V11H5Z" fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                    <input type="number" id="input-qty"
                                                        class="w-12 bg-white p-0 focus:outline-none text-center font-semibold text-md outline-none"
                                                        name="products[0][qty]" value="1" min="1"
                                                        max="<?php echo e($product->quantity); ?>" />
                                                    <button type="button" onclick="increment(event)"
                                                        class="bg-white -ml-4 text-black hover:text-white hover:bg-black border border-black rounded-full flex justify-center items-center w-4 h-4 cursor-pointer outline-none">
                                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="">MAX : <?php echo e($product->quantity); ?></div>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-gray-600 text-xl">
                                                <?php echo e('Rp ' . number_format($product->price, 2, ',', '.')); ?>

                                            </span>
                                            <input id="product-price-default" type="hidden"
                                                value="<?php echo e($product->price); ?>">
                                            <input id="product-price-input" type="hidden" value="<?php echo e($product->price); ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="flex flex-col justify-end">
                                    <div class="mb-6 pb-6 border-b border-gray-200 text-gray-800">
                                        <div class="w-full flex mb-3 items-center">
                                            <div class="flex-grow">
                                                <span class="text-gray-600">Subtotal</span>
                                            </div>
                                            <div class="pl-3">
                                                <span class="font-semibold"
                                                    id="subtotal-amount-display"><?php echo e('Rp ' . number_format($product->price, 2, ',', '.')); ?></span>
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
                                                    id="total-amount-display"><?php echo e(number_format($product->price, 2, ',', '.')); ?></span>
                                                <input type="hidden" value=<?php echo e($product->price); ?>" id="total-amount">
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
                                                    <img src="<?php echo e(asset('img/payment/mandiri.png')); ?>" class="h-6 ml-3">
                                                    <img src="<?php echo e(asset('img/payment/bni.svg')); ?>" class="h-6 ml-3">
                                                    <img src="<?php echo e(asset('img/payment/bri.png')); ?>" class="h-6 ml-3">
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
                                                    <img src="<?php echo e(asset('img/payment/dana.png')); ?>" class="h-2" />
                                                </div>
                                                <div class="flex justify-center items-center rounded p-1">
                                                    <img src="<?php echo e(asset('img/payment/ovo.svg')); ?>" class="h-2" />
                                                </div>
                                                <div class="bg-green-500 flex justify-center items-center rounded p-1">
                                                    <img src="<?php echo e(asset('img/payment/gopay.png')); ?>" class="h-2" />
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
        <!-- Modal Shopping Chart -->
        <div style="backdrop-filter: blur(2px) grayscale(90%);" x-show="openModalShoppingChart"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal Body -->
            <div x-show="openModalShoppingChart" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2"
                @click.away="openModalShoppingChart = false" @keydown.escape="openModalShoppingChart = false"
                class="px-6 py-4 w-full md:container overflow-hidden bg-white dark:bg-gray-800 sm:m-4" role="dialog"
                id="modal">
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="openModalShoppingChart = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <div class="w-full bg-white px-5 pb-10 pt-5 text-gray-800">
                    <form id="shopping-chart-form" action="<?php echo e(route('customer.create-shopping-chart', $product->id)); ?>"
                        method="post" class="w-full">
                        <?php echo csrf_field(); ?>
                        <div class="px-3 flex flex-col justify-between min-h-full">
                            <div class="w-full mx-auto text-gray-800 font-light mb-6 pb-6">
                                <div class="w-full flex items-center">
                                    <div class="overflow-hidden w-16 h-16 bg-gray-50 border-b border-gray-200">
                                        <img class="object-cover object-center w-full h-full hover:grow hover:shadow-md"
                                            src="<?php echo e(Str::startsWith($product->picture_path, 'https://') ? $product->picture_path : asset('storage/' . $product->picture_path)); ?>"
                                            alt="<?php echo e($product->name); ?>" loading="lazy">
                                    </div>
                                    <input type="hidden" name="product_id" id="id" value="<?php echo e($product->id); ?>">
                                    <div class="flex-grow pl-3">
                                        <h6 class="font-semibold uppercase text-gray-600"><?php echo e($product->name); ?></h6>
                                        <div class="flex gap-4">
                                            <div class="flex items-center">
                                                <button type="button" onclick="decrement(event)"
                                                    data-modal-status="shopping-chart"
                                                    class="bg-white text-black hover:text-white hover:bg-black border border-black rounded-full flex justify-center items-center w-4 h-4 cursor-pointer outline-none">
                                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24">
                                                        <path d="M5 11V13H19V11H5Z" fill="currentColor"></path>
                                                    </svg>
                                                </button>
                                                <input type="number" id="input-qty"
                                                    class="w-12 bg-white p-0 focus:outline-none text-center font-semibold text-md outline-none"
                                                    name="product_qty" value="1" min="1"
                                                    max="<?php echo e($product->quantity); ?>" />
                                                <button type="button" onclick="increment(event)"
                                                    data-modal-status="shopping-chart"
                                                    class="bg-white -ml-4 text-black hover:text-white hover:bg-black border border-black rounded-full flex justify-center items-center w-4 h-4 cursor-pointer outline-none">
                                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24">
                                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="">MAX : <?php echo e($product->quantity); ?></div>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-600 text-xl">
                                            <?php echo e('Rp ' . number_format($product->price, 2, ',', '.')); ?>

                                        </span>
                                        <input id="product-price-default" type="hidden" value="<?php echo e($product->price); ?>">
                                        <input id="product-price-input-shopping-chart" type="hidden"
                                            value="<?php echo e($product->price); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full gap-4">
                                <button type="button" @click="openModalShoppingChart = false"
                                    class="flex w-full md:w-1/2 items-center justify-center ml-auto text-black bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded">
                                    CANCEL
                                </button>
                                <button type="submit" @click="openModalShoppingChart = false"
                                    class="flex w-full md:w-1/2 items-center justify-center ml-auto text-white bg-black border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">
                                    SAVE TO CHART
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
    const qtyForm = document.getElementById('qty');
    const recipientNameForm = document.getElementById('recipient-name')
    const phoneNumberForm = document.getElementById('phone-number-form')
    const shippedAddressForm = document.getElementById('shipped-address-form')

    const inputQty = document.getElementById('input-qty')
    const productPriceInput = document.querySelectorAll('#product-price-input')
    const totalAmountDisplay = document.getElementById('total-amount-display')
    const subTotalAmountDisplay = document.getElementById('subtotal-amount-display')
    const totalAmount = document.getElementById('total-amount')

    const shippingCost = 12500

    const paymentEwalletBtn = document.getElementById('payment-ewallet')

    function decrement(e) {
        let target = e.target;
        let inputQty = '';

        if (target.tagName == 'BUTTON') {
            inputQty = target.nextElementSibling;
        }

        if (target.tagName == 'svg') {
            inputQty = target.parentElement.nextElementSibling;
        }

        let priceElement = inputQty.parentElement.parentElement.parentElement.nextElementSibling.children[0]
        let priceDefault = inputQty.parentElement.parentElement.parentElement.nextElementSibling.children[1]
        let price = inputQty.parentElement.parentElement.parentElement.nextElementSibling.children[2]

        let value = Number(inputQty.value)

        if (value == 1) {
            return false;
        }

        value--;
        inputQty.value = value;

        if (e.target.dataset.modalStatus == 'shopping-chart') {
            return false;
        }

        getAmount(priceElement, price, priceDefault, value)

    }

    function increment(e) {

        let target = e.target;
        let inputQty = '';

        if (target.tagName == 'BUTTON') {
            inputQty = target.previousElementSibling;
        }

        if (target.tagName == 'svg') {
            inputQty = target.parentElement.previousElementSibling;
        }

        let priceElement = inputQty.parentElement.parentElement.parentElement.nextElementSibling.children[0]
        let priceDefault = inputQty.parentElement.parentElement.parentElement.nextElementSibling.children[1]
        let price = inputQty.parentElement.parentElement.parentElement.nextElementSibling.children[2]

        let value = Number(inputQty.value)

        if (value == Number(inputQty.max)) {
            return false
        }

        value++;
        inputQty.value = value;

        if (e.target.dataset.modalStatus == 'shopping-chart') {
            return false;
        }

        getAmount(priceElement, price, priceDefault, value)

    }

    paymentEwalletBtn.addEventListener('change', () => {
        alert('ok')
    })

    // Order Proccess

    const getAmount = (priceElement, price, priceDefault, count) => {
        priceElement.innerText = IDRFormmaterCurrencry((Number(priceDefault.value) * count))
        price.value = Number(priceDefault.value) * count

        let subtotal = 0;

        productPriceInput.forEach(e => {
            subtotal += Number(e.value)
        })

        subTotalAmountDisplay.innerText = IDRFormmaterCurrencry(subtotal)
        totalAmountDisplay.innerText = IDRFormmaterCurrencry(subtotal + shippingCost)

    }


    // IDR Formatter
    function IDRFormmater(number) {
        const formattedNumber = new Intl.NumberFormat('id-ID', {
            currency: 'IDR'
        }).format(number);

        return formattedNumber
    }

    function IDRFormmaterCurrencry(number) {
        const formattedNumber = new Intl.NumberFormat('id-ID', {
            style: "currency",
            currency: 'IDR'
        }).format(number);

        return formattedNumber
    }

    const shippingChartForm = document.getElementById('shopping-chart-form')

    shippingChartForm.addEventListener('submit', (e) => {
        e.preventDefault();

        var data = JSON.stringify({
            id: e.target[1].value,
            qty: e.target[3].value,
        })

        let method = e.target.attributes.method.value.toUpperCase()
        let action = e.target.attributes.action.value
        let csrfToken = document.querySelector('meta[name="csrf-token"]').content

        shoppingChartAdd(action, method, data, csrfToken);
        // console.log(action);

    })

    const shoppingChartAdd = (action, method, data, csrfToken) => {

        var xhr = new XMLHttpRequest();

        xhr.open(method, action, true)
        xhr.setRequestHeader('Content-Type', 'application/json')
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken)

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                iziToast.success({
                    title: 'OK',
                    message: JSON.parse(xhr.responseText),
                });

                console.log(JSON.parse(xhr.responseText));
            } else {

                const errorResponse = JSON.parse(xhr.responseText);
                iziToast.info({
                    title: 'Error',
                    message: errorResponse,
                });

                console.error('Error:', xhr.status, errorMessage);
            }
        };

        xhr.onerror = function() {
            console.error('Request failed');
        };

        xhr.send(data);

    }


    // IMG Zoom
    function zoom(e) {
        var zoomer = e.currentTarget;
        e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
        e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
        x = offsetX / zoomer.offsetWidth * 100
        y = offsetY / zoomer.offsetHeight * 100
        zoomer.style.backgroundPosition = x + '% ' + y + '%';
    }
    </script>


    <?php $__env->stopPush(); ?>



 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f)): ?>
<?php $component = $__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f; ?>
<?php unset($__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f); ?>
<?php endif; ?>
<?php /**PATH /Users/macbook/Documents/Development/toko-elektronik/resources/views/customer/product/show.blade.php ENDPATH**/ ?>