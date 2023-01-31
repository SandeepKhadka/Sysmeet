<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="{{ asset('src/login.js') }}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('src/login.css') }}"> --}}
    {{-- @vite('resources/css/app.css') --}}
    <title>Sysmeet | Login</title>
</head>

<body>
    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    <!-- <?php if (isset($_SESSION['error'])) { ?> -->
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3"
                        id="warningMsg" role="alert">
                        <span class="block sm:inline">
                            <!-- <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            // session_destroy();
                            ?> -->
                        </span>
                    </div>

                    <script>
                        const targetDiv = document.getElementById("warningMsg");
                        const btn = document.getElementById("toggle");
                        btn.onclick = function() {
                            if (targetDiv.style.display !== "none") {
                                targetDiv.style.display = "none";
                            } else {
                                targetDiv.style.display = "block";
                            }
                        };
                    </script>
                    <!-- <?php } ?> -->
                    <h2 class="text-center mb-10 text-2xl">Welcome to <a href="{{ route('front.home') }}"
                            class="text-blue-900 font-bold">Sysmeet</a>! Please login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="mb-6">
                            <input id="email" name="email" type="text" required
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput1" placeholder="{{ __('Email Address') }}" />
                            @error('email')
                                <span class="invalid-feedback" style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input id="password" name="password" type="password" required
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="{{ __('Password') }}" />
                            @error('password')
                                <span class="invalid-feedback" style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="checkbox" onclick="myFunction()" style="margin-top: 10px"> Show Password
                        </div>

                        <div class="flex justify-between items-center mb-6">
                            <div class="form-group form-check">
                                <input type="checkbox"
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    id="remember" name="remember" />
                                <label class="form-check-label inline-block text-gray-800"
                                    for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <a href="#!" class="text-gray-800">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </a>
                        </div>

                        <div class="text-center lg:text-left">
                            <button type='submit'
                                class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
