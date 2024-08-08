@extends('client.layouts.main')

@section('container')
    <div class="flex flex-col md:flex-row">
        <div class="h-screen w-register-left mx-auto p-20 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/register-bg.png') }}');">
            <div
                class="h-full bg-blue-500 bg-opacity-30 backdrop-blur-lg rounded-2xl border-[6px] border-[#5882C1] border-opacity-50">
                <div class="h-full flex flex-col items-center justify-center">
                    <div class="mx-auto w-[350px] h-[300px] 2xl:w-[502px] 2xl:h-[502px]">
                        <img src="{{ asset('/assets/images/chat-image.png') }}" alt="Person Image" />
                    </div>
                    <p class="text-center font-extrabold text-3xl 2xl:text-5xl text-white px-14">
                        <span class="font-extrabold text-3xl 2xl:text-5xl text-[#F7B217]">
                            Simplify
                        </span>
                        Social Media Strategy with Sharein
                    </p>
                    <div class="flex mx-auto mt-16 2xl:mt-20 mb-6">
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="md:w-register-right w-full h-full">
            <div class="bg-white px-24 py-10 2xl:px-32 2xl:py-52">
                <div
                    class="w-10 h-10 2xl:w-16 2xl:h-16 bg-gradient-to-b from-primary-base to-secondary-base rounded-lg flex items-center justify-center mb-3 2xl:mb-6">
                    <div class="w-7 h-7 2xl:w-[50px] 2xl:h-[50px]">
                        <img src="/assets/images/logo-white.png" />
                    </div>
                </div>
                <h1 class="font-bold text-3xl 2xl:text-4xl text-neutral-80 mb-2 2xl:mb-4">Sign In</h1>
                <p class="text-xs 2xl:text-base font-light text-neutral-70">Welcome back! Please enter your details</p>
                <form action="{{ route('user.loginPost') }}" method="POST">
                    {{-- <form action="/login" method="POST"> --}}
                    @csrf
                    <div class="flex flex-col mt-3 2xl:mt-6 w-full">
                        <div class="flex mb-1">
                            <p class="font-normal text-base text-neutral-70">Email</p>
                            <p class="font-normal text-base text-error-base">*</p>
                        </div>
                        <input
                            class="border border-[#CFCFCF] p-3 text-neutral-70 focus:outline-none w-full flex-grow h-11 rounded-md text-xs 2xl:text-base font-light"
                            type="email" name="email" placeholder="your email" value="{{ old('email') }}" required
                            autofocus>

                    </div>
                    <div class="flex flex-col mt-3 2xl:mt-6 w-full">
                        <div class="flex mb-1">
                            <p class="font-normal text-base text-neutral-70">Password</p>
                            <p class="font-normal text-base text-error-base">*</p>
                        </div>
                        <div class="relative">
                            <input
                                class="border border-[#CFCFCF] p-3 text-neutral-70 focus:outline-none w-full flex-grow h-11 rounded-md text-xs 2xl:text-base font-light"
                                type="password" id="password" name="password" placeholder="your password" required>
                            <button type="button" id="showPassword"
                                class="absolute right-3 top-3 text-primary-base font-light">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    {{-- @error('credentials')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-red-500 text-sm font-normal">{{ $message }}</strong>
                        </span>
                    @enderror --}}
                    <div class="w-full flex items-center justify-between mt-4">
                        <div class="w-full flex items-center">
                        </div>
                        <a href="/forgot-password" class="text-sm  font-bold whitespace-nowrap text-[#2652FF]">Forgot
                            Password?</a>
                    </div>
                    <button type="submit"
                        class="bg-[#2652FF] w-full h-[51px] mt-10 rounded-md py-2 px-4 text-xl font-semibold text-white">
                        Sign In
                    </button>
                </form>
                <div class="flex mx-auto mt-3 justify-center">
                    <p class="font-normal text-base text-neutral-70">Already have an account?&nbsp;</p>
                    <a class="font-semibold text-base text-primary-base" href="{{ route('user.register') }}">Sign up</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        @if ($errors->any())
            // Pass the first error message to a JavaScript variable
            var errorTitle = "{{ isset($errors) && $errors->any() ? $errors->first() : '' }}";
            var errorMessage = "{{ isset($errors) && $errors->count() > 1 ? $errors->all()[1] : '' }}";


            Swal.fire({
                imageUrl: "/assets/icons/alert-circle-danger.png",
                imageHeight: 70,
                imageWidth: 70,
                title: errorTitle,
                text: errorMessage,
                confirmButtonText: "Okey",
                buttonsStyling: false,
                customClass: {
                    title: "sweet_titleImportant",
                    htmlContainer: "sweet_textImportant",
                    confirmButton: "alert-btn",
                },
                width: '400px',
            });
        @endif
        document.getElementById('showPassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var showPasswordButton = document.getElementById('showPassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordButton.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                showPasswordButton.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
@endsection
