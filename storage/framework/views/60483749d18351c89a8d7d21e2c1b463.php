<!--Nav-->

<style>
@media (min-width: 768px) {
    .mobile-hidden {
        display: flex;
        width: auto;
    }
}
</style>

<nav id="header" class="w-full fixed z-40 top-0 py-1 bg-white shadow-sm">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">
        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />
        <div class="mobile-hidden hidden md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li>
                        <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                            href="<?php echo e(route('home')); ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                            href="<?php echo e(route('customer.product')); ?>">
                            Products
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="order-1 md:order-2">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                href="<?php echo e(config('app.url')); ?>">
                <svg class="fill-current text-gray-800/20 mr-2" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path
                        d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
                </svg>
                <?php echo e(config('app.name')); ?>

            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content" s>

            <?php if(Route::has('login')): ?>
            <?php if(auth()->guard()->check()): ?>
            <div x-data="{isOpenMenu: false}" class="dropdown-menu">
                <button @click="isOpenMenu = !isOpenMenu"
                    class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                    @keydown.escape="isOpenMenu" aria-label="Account" @click.away="isOpenMenu = false">
                    <img class="object-cover w-8 h-8 rounded-full" src="<?php echo e(Auth::user()->profile_photo_url); ?>"
                        alt="<?php echo e(Auth::user()->name); ?>" aria-hidden="true" />
                </button>

                <div x-show="isOpenMenu" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0  transform translate-y-1/2"
                    class="bg-white rounded-lg shadow-xl px-4 mt-6 -ml-14 absolute">

                    <svg class="absolute bottom-full right-4" width="30" height="20" viewBox="0 0 30 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <polygon points="15, 0 30, 20 0, 20" fill="#fff" />
                    </svg>

                    <div class="py-3 flex items-center w-full hover:bg-gray-50">
                        <a href="<?php echo e(route('customer.order')); ?>" class="flex-1">
                            <div class="text-gray-400 text-sm font-semibold">Pesanan</div>
                        </a>
                        <div>
                            <svg class="w-6 h-6" width="40" height="20" viewBox="0 0 40 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>
                    <div class="py-3 flex items-center w-full hover:bg-gray-50">
                        <a href="<?php echo e(route('profile.show')); ?>" class="flex-1">
                            <div class="text-gray-400 text-sm font-semibold">Profile</div>
                        </a>
                        <div>
                            <svg class="w-6 h-6" width="40" height="20" viewBox="0 0 40 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>

                    <div class="py-0 flex items-center w-full border-t">
                        <form class="w-full" method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <a class="flex items-center w-full py-3 text-sm font-semibold text-gray-400  transition-colors duration-150 hover:bg-gray-50"
                                href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="flex-1"><?php echo e(__('Logout')); ?></span>
                                <div>
                                    <svg class="w-6 h-6" width="40" height="20" viewBox="0 0 40 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                        <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                        <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                                    </svg>
                                </div>
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <a class="pl-3 inline-block no-underline hover:text-black" href="<?php echo e(route('customer.shopping-chart')); ?>">
                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path
                        d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />
                </svg>
            </a>

            <?php else: ?>
            <div x-data="{isOpenMenu: false}" class="dropdown-menu">
                <button @click="isOpenMenu = !isOpenMenu"
                    class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                    @keydown.escape="isOpenMenu" aria-label="Account" @click.away="isOpenMenu = false">
                    <div class="flex no-underline hover:text-black">
                        <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24">
                            <circle fill="none" cx="12" cy="7" r="3" />
                            <path
                                d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                        </svg>
                        </>
                </button>

                <div x-show="isOpenMenu" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0  transform translate-y-1/2"
                    class="bg-white rounded-lg shadow-xl px-4 mt-6 -ml-14 absolute">

                    <svg class="absolute bottom-full right-4" width="30" height="20" viewBox="0 0 30 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <polygon points="15, 0 30, 20 0, 20" fill="#fff" />
                    </svg>

                    <div class="py-3 flex items-center w-full hover:bg-gray-50">
                        <a href="<?php echo e(route('login')); ?>" class="flex-1">
                            <div class="text-gray-400 text-sm font-semibold">Login</div>
                        </a>
                        <div>
                            <svg class="w-6 h-6" width="40" height="20" viewBox="0 0 40 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>
                    <div class="py-3 flex items-center w-full hover:bg-gray-50">
                        <a href="<?php echo e(route('register')); ?>" class="flex-1">
                            <div class="text-gray-400 text-sm font-semibold">Register</div>
                        </a>
                        <div>
                            <svg class="w-6 h-6" width="40" height="20" viewBox="0 0 40 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="30" y1="2" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="30" y1="18" x2="40" y2="10" stroke="#9CA3AF" />
                                <line x1="20" y1="10" x2="40" y2="10" stroke="#9CA3AF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
</nav>
<?php /**PATH /Users/macbook/Documents/Development/toko-elektronik/resources/views/layouts/_customer-nav.blade.php ENDPATH**/ ?>