<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('/vendor/kaguya/favicon.ico') }}">

  <meta name="robots" content="noindex, nofollow">

  <title>Settings{{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>

  <link href="{{ asset(mix('app.css', 'vendor/kaguya')) }}" rel="stylesheet" type="text/css">
 </head>

 <body>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
   <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
     {{ config('app.name', 'Kaguya') }}
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
     <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
       </a>

       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('settings') }}">
         {{ __('Settings') }}
        </a>

        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
        </form>
       </div>
      </li>
     </ul>
    </div>
   </div>
  </nav>

  <main class="py-4">
   <div class="container">
    <div class="row justify-content-center">
     <div class="col-md-8">
      @if (session('status'))
       <div class="alert alert-success" role="alert">
        {{ session('status') }}
       </div>
      @endif

      <form method="POST" action="{{ route('settings') }}">
       @foreach (config('kaguya.settings') as $item)
        <div class="card mb-4">
         <div class="card-header">{{ $item['title'] }}</div>

         <div class="card-body">
          @csrf

          @foreach ($item['fields'] as $field)
           <div class="form-group row">
            <label for="{{ $field['name'] }}" class="col-md-4 col-form-label text-md-right">{{ $field['label'] }}</label>

            <div class="col-md-6">
             <input id="{{ $field['name'] }}" type="text" class="form-control @error($field['name']) is-invalid @enderror" name="{{ $field['name'] }}" value="{{ old($field['name'], setting($field['name'], $field['value'])) }}">

             @error($field['name'])
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
             </span>
             @enderror
            </div>
           </div>
          @endforeach

         </div>
        </div>
       @endforeach

       <div class="text-right">
        <button type="submit" class="btn btn-primary mr-2">{{ __('kaguya::messages.button.save') }}</button>
        <button type="submit" class="btn btn-primary" name="reset" value="true">{{ __('kaguya::messages.button.reset') }}</button>
       </div>
      </form>
     </div>
    </div>
   </div>
  </main>

  <script src="{{asset(mix('app.js', 'vendor/kaguya'))}}"></script>
 </body>
</html>
