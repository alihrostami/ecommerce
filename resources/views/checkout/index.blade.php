@extends('layouts.app')
@section('content')
    <main class="container">
        <!-- Breadcrumb -->
        <nav class="flex mt-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route('index')}}"
                       class="inline-flex items-center text-sm gap-x-1  text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="size-4 mb-0.5">
                            <use href="#home"></use>
                        </svg>
                        صفحه اصلی
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4"></path>
                    </svg>
                    <a href="{{route('cart.index')}}"
                       class="inline-flex items-center text-sm gap-x-1  text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        سبد خرید
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4"></path>
                        </svg>
                        <span class="ms-1 text-sm  text-gray-500 md:ms-2 dark:text-gray-400">
                            آدرس و زمان ارسال
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        <section class="flex flex-col lg:flex-row justify-between items-start gap-4 mt-5">
            <!-- Form -->
            <div
                class="w-full lg:w-3/4 flex flex-col gap-y-4 child:rounded-lg child:bg-white child:dark:bg-gray-800 child:shadow child:p-4">
                <div class="w-full flex flex-col">
                <span class="flex items-center gap-x-2">
                    <a href="{{route('cart.index')}}">
                        <svg class="size-5">
                            <use href="#arrow-right"></use>
                        </svg>
                    </a>
                    <p class="font-DanaDemiBold text-lg">آدرس و زمان ارسال</p>
                </span>
                    <p class="text-gray-500 dark:text-gray-400 font-DanaMedium mt-4 mb-8 text-sm lg:text-base">
                        لطفا اطلاعات خود را به درستی وارد نمایید
                    </p>
                    <div class="flex flex-col lg:flex-row items-start ">
                        <form name="checkout-form" id="checkout-form" action="{{ route('checkout.store') }}"
                              method="post" class="w-full grid grid-cols-12 gap-4">
                            @csrf
                            <div class="col-span-12">
                            @error('general')
                            <div role="alert">
                                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                    {{$message}}
                                </div>

                            </div>
                            @enderror
                            </div>
                            <input type="text" disabled value="{{auth()->user()->first_name}}" placeholder="نام*" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11">
                            <input type="text" disabled value="{{auth()->user()->last_name}}"
                                   placeholder="نام خانوادگی*" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11">
                            <div class="col-span-6">

                                <input type="text" value="{{old('user_province')}}" name="user_province" placeholder="استان*" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11">
                                @error('user_province')
                                <div role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        {{$message}}
                                    </div>

                                </div>
                                @enderror
                            </div>
                            <div class="col-span-6">

                                <input type="text" value="{{old('user_city')}}" name="user_city" placeholder="شهر*" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11">
                                @error('user_city')
                                <div role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        {{$message}}
                                    </div>

                                </div>
                                @enderror
                            </div>
                            <div class="col-span-6">

                                <input type="text" value="{{old('user_address')}}" name="user_address" placeholder="آدرس*" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-12
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11">
                                @error('user_address')
                                <div role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        {{$message}}
                                    </div>

                                </div>
                                @enderror
                            </div>
                            <div class="col-span-6">

                                <input type="text" value="{{old('user_mobile')}}" name="user_mobile" placeholder="موبایل*" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11">
                                @error('user_mobile')
                                <div role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        {{$message}}
                                    </div>

                                </div>
                                @enderror
                            </div>
                            <div class="col-span-6">

                                <input type="text" value="{{old('user_postal_code')}}" name="user_postal_code" placeholder="کد پستی*" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11">
                                @error('user_postal_code')
                                <div role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        {{$message}}
                                    </div>

                                </div>
                                @enderror
                            </div>
                            <div class="col-span-6">

                                <input type="text" value="{{old('description')}}" name="description" placeholder="توضیحات" class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-12 h-11
                            text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                                @error('description')
                                <div role="alert">
                                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                        {{$message}}
                                    </div>

                                </div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>

                <div>
                    <h1 class="font-DanaDemiBold text-lg">خلاصه سفارش</h1>

                    <div class="mt-8">

                        @foreach($userCartItems as $item)
                            @php
                                $product = $item['product'];
                                $qty     = $item['qty'];
                            @endphp

                            <div class="flex flex-col mt-8 gap-x-4">


                                <img src="{{ $product->image_url }}"
                                     class="w-36 h-20 object-cover rounded-lg"
                                     alt="{{ $product->name }}">

                                <ul class="flex flex-col items-start gap-y-2 font-DanaMedium text-gray-600 dark:text-gray-200 mt-5 mr-3">


                                    <li>
                                        <p>تعداد: {{ $qty }}</p>
                                    </li>


                                    <li>
                                        <p>مبلغ: {{ number_format($product->price * $qty) }} تومان</p>
                                    </li>

                                </ul>
                            </div>

                        @endforeach

                    </div>
                </div>

            </div>
            <!-- PRICE BOX -->
            <div
                class="w-full lg:w-1/4 lg:sticky top-5 flex flex-col gap-y-4 rounded-lg bg-white dark:bg-gray-800 shadow p-4">

                <ul class="child:flex child:items-center child:justify-between space-y-8">

                    <li>
                        <p>قیمت کالاها ({{ getProductsCount() }})</p>
                        <p class="flex gap-x-1 text-gray-600 dark:text-gray-300 ">
                            {{ number_format($summary['totalPrice']) }}
                            <span class="hidden xl:flex">تومان</span>
                        </p>
                    </li>

                    <li class="text-red-500 dark:text-red-400">
                        <p>تخفیف</p>
                        <p class="font-DanaMedium">
                            {{ number_format($summary['totalDiscount']) }} تومان
                        </p>
                    </li>

                    <li class="border-t-2 border-dashed border-gray-400 pt-8">
                        <p> مبلغ نهایی :</p>
                        <p>
                            {{ number_format($summary['finalPrice']) }} تومان
                        </p>
                    </li>

                </ul>

                <button type="button" onclick="$('#checkout-form').submit()"
                        class="w-full mt-4 flex items-center gap-x-1 justify-center bg-blue-500 text-white hover:bg-blue-600 transition-all rounded-lg shadow py-2">
                    تایید و تکمیل سفارش
                    <svg class="w-5 h-5">
                        <use href="#shopping-bag"></use>
                    </svg>
                </button>

            </div>
        </section>
    </main>
@endsection
