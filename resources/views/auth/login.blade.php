<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login - School Health Unit</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1692870487" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body class="d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <!-- Session Status -->
              <x-auth-session-status class="mb-4" :status="session('status')" />

              <!-- Email Address -->
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input id="email" type="email" class="form-control" placeholder="your@email.com" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <!-- Password -->
              <div class="mb-2">
                <label class="form-label">Password</label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control" placeholder="Your password" id="password" name="password" required autocomplete="current-password">
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
              </div>

              <!-- Remember Me -->
              <div class="mb-2">
                <label class="form-check">
                  <input id="remember_me" type="checkbox" class="form-check-input" name="remember"/>
                  <span class="form-check-label">{{ __('Remember me') }}</span>
                </label>
              </div>

              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Log in') }}</button>
              </div>

              <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                  </a>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1692870487" defer></script>
    <script src="./dist/js/demo.min.js?1692870487" defer></script>
  </body>
</html>
