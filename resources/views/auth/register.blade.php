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
    <title>Sign up - School Health Unit</title>
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
        <div class="text-center mb-4">
        </div>
        <form class="card card-md" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <!-- Name -->
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input id="name" type="text" class="form-control" placeholder="Enter name" name="name" :value="old('name')" required autofocus autocomplete="name">
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Email Address -->
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input id="email" type="email" class="form-control" placeholder="Enter email" name="email" :value="old('email')" required autocomplete="username">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
            </div>
            <!-- Confirm Password -->
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <div class="input-group input-group-flat">
                <input id="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>
            </div>
            <!-- Terms and Policy -->
            <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" class="form-check-input" name="terms" id="terms"/>
                <span class="form-check-label">Agree to the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
                <x-input-error :messages="$errors->get('terms')" class="mt-2" />
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">{{ __('Create new account') }}</button>
            </div>
          </div>
        </form>
        <div class="text-center text-secondary mt-3">
          Already have an account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1692870487" defer></script>
    <script src="./dist/js/demo.min.js?1692870487" defer></script>
  </body>
</html>
