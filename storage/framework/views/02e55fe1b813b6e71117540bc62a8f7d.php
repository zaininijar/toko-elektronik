<?php if (isset($component)) { $__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f = $component; } ?>
<?php $component = App\View\Components\CustomerLayout::resolve(['title' => 'Orders'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="bg-white py-8">
        <div class="container mx-auto flex flex-col items-center pt-4 pb-12">
            <div class="mx-auto w-full justify-center px-6 md:flex md:space-x-6 xl:px-0">
                <div class="rounded-lg w-full">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class=" justify-between mb-6 rounded-lg bg-white p-6 border shadow-md sm:flex
                    sm:justify-start">
                        <div class="w-7/12 flex flex-col gap-3">
                            <?php $__currentLoopData = $order->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="justify-between rounded-lg bg-white p-3 border sm:flex sm:justify-start">
                                <div class="w-3/12">
                                    <div class="w-12 h-12 overflow-hidden relative rounded-full">
                                        <img src="<?php echo e(Str::startsWith($order_product->product->picture_path, 'https://') ? $order_product->product->picture_path : asset('storage/' . $order_product->product->picture_path)); ?>"
                                            alt="<?php echo e($order_product->product->name); ?>" loading="lazy"
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
                        <div class="ml-4 flex w-full justify-between items-start">
                            <div class="mt-0 border rounded-lg p-3 w-full">
                                <h2 class="font-bold text-xl underline">
                                    <?php echo e($order->id); ?>#<?php echo e(preg_replace('/\D/', '', $order->created_at)); ?></p>
                                </h2>
                                <div class="flex flex-col items-start w-full gap-1 mt-3">
                                    <div class="text-sm font-bold text-gray-900 gap-2 w-full flex items-start">
                                        <span class="w-1/4">Status Pesanan</span>
                                        : <div class="text-white bg-black rounded px-1">
                                            <?php echo e($order->status); ?>

                                        </div>
                                    </div>
                                    <div class="text-sm font-bold text-gray-900 gap-2 w-full flex items-start">
                                        <span class="w-1/4">Rekening Asal</span>
                                        <div>
                                            :
                                            <?php echo e($order->payment->account_number . ' AN.' . $order->payment->account_name); ?>

                                        </div>
                                    </div>
                                    <div class="text-sm font-bold text-gray-900 gap-2 w-full flex items-start">
                                        <span class="w-1/4">Rekening Tujuan</span>
                                        <div>
                                            :
                                            <?php echo e($store_rek[$order->payment->payment_type]['bank_name'] . ' | ' . $store_rek[$order->payment->payment_type]['account_number'] . ' AN.' . $store_rek[$order->payment->payment_type]['account_name']); ?>

                                        </div>
                                    </div>
                                    <div class="text-sm font-bold text-gray-900 gap-2 w-full flex items-start">
                                        <span class="w-1/4">Total Tagihan</span>
                                        <div>
                                            : Rp<?php echo e(number_format($order->payment->total_amount, 2, ',', '.')); ?>

                                        </div>
                                    </div>
                                    <div class="text-sm font-bold text-gray-900 gap-2 w-full flex items-start">
                                        <span class="w-1/4">
                                            Status Pembayaran
                                        </span>
                                        : <div class="text-white bg-black rounded px-1">
                                            <?php echo e($order->payment->payment_status); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->startPush('scripts'); ?>



    <?php $__env->stopPush(); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f)): ?>
<?php $component = $__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f; ?>
<?php unset($__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f); ?>
<?php endif; ?><?php /**PATH /Users/macbook/Documents/Development/toko-elektronik/resources/views/customer/order.blade.php ENDPATH**/ ?>