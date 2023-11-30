<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['title' => 'Orders'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div>
        <div class="container grid px-6 mx-auto">
            <?php if($errors->any()): ?>
            <div class="bg-red-300 px-4 py-2 rounded-md mt-8 text-red-600">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-disc list-inside"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
            <div class="bg-green-300 px-4 py-2 rounded-md mt-8 text-green-600">
                <div class="list-disc list-inside"><?php echo e(session('success')); ?></div>
            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="bg-red-300 px-4 py-2 rounded-md mt-8 text-red-600">
                <div class="list-disc list-inside"><?php echo e(session('error')); ?></div>
            </div>
            <?php endif; ?>

            <div class="flex w-full justify-between items-center">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 underline ">
                    Order list
                </h2>
            </div>

            <input id="APP_URL" type="hidden" value="<?php echo e(config('app.url')); ?>">

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Total Amount</th>
                                <th class="px-4 py-3">Products</th>
                                <th class="px-4 py-3">Payment Status</th>
                                <th class="px-4 py-3">Order Status</th>
                                <th class="px-4 py-3">Created</th>
                                <th class="px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-gray-700 dark:text-gray-400" id="orders" data-id="<?php echo e($order->id); ?>">
                                <td id="number" class="px-4 py-3 text-sm">
                                    <?php echo e($key + 1); ?>

                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">
                                                <?php echo e($order->id); ?>#<?php echo e(preg_replace('/\D/', '', $order->created_at)); ?>

                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?php echo e('Rp ' . number_format($order->payment->total_amount, 2, ',', '.')); ?>

                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex flex-col gap-2">
                                        <?php $__currentLoopData = $order->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="justify-between rounded-lg bg-white p-3 border sm:flex sm:justify-start">
                                            <div class="w-3/12">
                                                <div class="w-12 h-12 overflow-hidden relative rounded-full ">
                                                    <img src="<?php echo e($order_product->product->picture_path); ?>"
                                                        alt="product-image"
                                                        class="object-cover object-center w-full h-full" />
                                                </div>
                                            </div>
                                            <div class="w-7/12 mt-5 sm:mt-0">
                                                <h2 class="text-sm font-bold text-gray-900">
                                                    <?php echo e($order_product->product->name); ?>

                                                </h2>
                                                <h3 class="text-xs font-bold text-gray-900">
                                                    Rp<?php echo e(number_format($order_product->product->price * $order_product->qty, 2, ',', '.')); ?>

                                                </h3>
                                                <p class="mt-1 text-xs text-gray-700">
                                                    <?php echo e($order_product->product->spesification); ?></p>
                                            </div>
                                            <div class="w-2/12 h-12 border-gray-100">
                                                <div
                                                    class="cursor-pointer flex text-sm rounded bg-gray-100 py-1 px-3.5 duration-100 hover:bg-black hover:text-white">
                                                    <span><?php echo e($order_product->qty); ?></span> <span>x</span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <?php switch($order->payment->payment_status):
                                    case ('PAID'): ?>
                                    <form action="<?php echo e(route('order.updatePayment', $order->payment->id)); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            <?php echo e($order->payment->payment_status); ?>

                                        </button>
                                    </form>
                                    <?php break; ?>
                                    <?php case ('PROCCESS'): ?>
                                    <form action="<?php echo e(route('order.updatePayment', $order->payment->id)); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            <?php echo e($order->payment->payment_status); ?>

                                        </button>
                                    </form>
                                    <?php break; ?>
                                    <?php case ('REJECTED'): ?>
                                    <form action="<?php echo e(route('order.updatePayment', $order->payment->id)); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                                            <?php echo e($order->payment->payment_status); ?>

                                        </button>
                                    </form>
                                    <?php break; ?>

                                    <?php default: ?>
                                    <form action="<?php echo e(route('order.updatePayment', $order->payment->id)); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            <?php echo e($order->payment->payment_status); ?>

                                        </button>
                                    </form>
                                    <?php endswitch; ?>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <?php switch($order->status):
                                    case ('SUCCESS'): ?>
                                    <form action="<?php echo e(route('order.update', $order->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            <?php echo e($order->status); ?>

                                        </button>
                                    </form>
                                    <?php break; ?>
                                    <?php case ('PROCCESS'): ?>
                                    <form action="<?php echo e(route('order.update', $order->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            <?php echo e($order->status); ?>

                                        </button>
                                    </form>
                                    <?php break; ?>
                                    <?php case ('SHIPPING'): ?>
                                    <form action="<?php echo e(route('order.update', $order->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                            <?php echo e($order->status); ?>

                                        </button>
                                    </form>
                                    <?php break; ?>
                                    <?php case ('REJECT'): ?>
                                    <form action="<?php echo e(route('order.update', $order->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100">
                                            <?php echo e($order->status); ?>

                                        </button>
                                    </form>
                                    <?php break; ?>

                                    <?php default: ?>
                                    <form action="<?php echo e(route('order.update', $order->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <button type="submit"
                                            class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            <?php echo e($order->status); ?>

                                        </button>
                                    </form>
                                    <?php endswitch; ?>
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <?php echo e($order->created_at); ?>

                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <svg onclick="alertDelete(event)" data-id="<?php echo e($order->id); ?>"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </div>

    <script>
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
                            destroy(e)
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

    const destroy = (e) => {
        updateNumber()

        var xhr = new XMLHttpRequest();
        const parenOrderById = document.querySelectorAll("#orders")

        let id = e.target.dataset.id
        let APP_URL = document.getElementById('APP_URL').value
        let csrfToken = document.querySelector('meta[name="csrf-token"]').content

        console.log(APP_URL);

        xhr.open('DELETE', `${APP_URL}/admin/order/${id}`, true)
        xhr.setRequestHeader('Content-Type', 'application/json')
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken)

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                iziToast.success({
                    title: 'OK',
                    message: JSON.parse(xhr.responseText),
                });
                parenOrderById.forEach(el => {
                    if (el.dataset.id == id) {
                        el.remove()
                    }
                })
                setTimeout(() => {
                    updateNumber()
                }, 300)
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

    window.addEventListener('click', () => {
        updateNumber()
    })

    const updateNumber = () => {
        const numberRow = document.querySelectorAll('#number')

        numberRow.forEach((el, key) => {
            el.innerText = key + 1
            console.log(el.innerText);
        })
    }
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /Users/macbook/Documents/Development/toko-elektronik/resources/views/admin/orders.blade.php ENDPATH**/ ?>