@extends('layouts.app')

@section('content')
<section>
    @yield('progressbar')
</section>

<article class="max-w-4xl flex-grow mx-auto pt-6 px-8 md:pt-12 my-16 md:my-8">
    @yield('formContent')
</article>
@endsection