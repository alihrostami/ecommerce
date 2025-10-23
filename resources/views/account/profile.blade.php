@extends('account.layouts.app')
@section('account-content')
    <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
        <div class="flex items-center justify-between">
            <h2 class="font-DanaMedium text-lg">اطلاعات حساب کاربری</h2>
        </div>
        @error('general')
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                {{$message}}
            </div>

        </div>
        @enderror

        @if(session()->has('success'))
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    {{session('success')}}
                </div>

            </div>
        @endif
        <form class="mt-5 grid grid-cols-12 gap-5 "
              action="{{route('account.profile.post')}}"
              method="POST">
            <!-- ITEM -->
            @csrf
            @method('PUT')


            <div class="col-span-12 col-span-6">
                <label for="first_name" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    نام
                </label>
                <div class="mt-3 relative">
                    <input id="first_name"
                           name="first_name"
                           value="{{old('first_name',auth()->user()->first_name)}}"
                           type="text" placeholder="{{auth()->user()->first_name}}" class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                    <button type="button" class="absolute left-3 top-3 z-10">
                        <svg class="size-5 text-gray-500">
                            <use href="#edit"></use>
                        </svg>
                    </button>
                </div>
                @error('first_name')
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        {{$message}}
                    </div>

                </div>
                @enderror
            </div>
            <div class="col-span-12 col-span-6">
                <label for="first_name" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    نام خانوادگی
                </label>
                <div class="mt-3 relative">
                    <input id="last_name"
                           name="last_name"
                           value="{{old('last_name',auth()->user()->last_name)}}"
                           type="text" placeholder="{{auth()->user()->last_name}}" class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                    <button type="button" class="absolute left-3 top-3 z-10">
                        <svg class="size-5 text-gray-500">
                            <use href="#edit"></use>
                        </svg>
                    </button>
                </div>
                @error('last_name')
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        {{$message}}
                    </div>

                </div>
                @enderror
            </div>
            <div class="col-span-12 col-span-6">
                <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    ایمیل
                </label>
                <div class="mt-3 relative">
                    <input id="email"
                           name="email"
                           value="{{old('email',auth()->user()->email)}}"
                           type="text" placeholder="{{auth()->user()->email}}" class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                    <button type="button" class="absolute left-3 top-3 z-10">
                        <svg class="size-5 text-gray-500">
                            <use href="#edit"></use>
                        </svg>
                    </button>
                </div>
                @error('email')
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        {{$message}}
                    </div>

                </div>
                @enderror
            </div>
            <div class="col-span-12 col-span-6">
                <label for="mobile" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    موبایل
                </label>
                <div class="mt-3 relative">
                    <input id="mobile"
                           name="mobile"
                           value="{{old('mobile',auth()->user()->mobile)}}"
                           type="text" placeholder="{{auth()->user()->mobile}}" class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                    <button type="button" class="absolute left-3 top-3 z-10">
                        <svg class="size-5 text-gray-500">
                            <use href="#edit"></use>
                        </svg>
                    </button>
                </div>
                @error('mobile')
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        {{$message}}
                    </div>

                </div>
                @enderror
            </div>
            <div class="col-span-12 col-span-6">
                <label for="password" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                    رمز عبور
                </label>
                <small>در صورت نیاز به تغییر رمز این فیلد را پر نمایید.</small>
                <div class="mt-3 relative">
                    <input id="password"
                           name="password"

                           type="text" class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                    <button type="button" class="absolute left-3 top-3 z-10">
                        <svg class="size-5 text-gray-500">
                            <use href="#edit"></use>
                        </svg>
                    </button>
                </div>
                @error('password')
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        {{$message}}
                    </div>

                </div>
                @enderror
            </div>
            <div class="col-span-12">
                <button type="submit" class="submit-btn">ثبت تغییرات</button>
            </div>
        </form>
    </div>

@endsection
