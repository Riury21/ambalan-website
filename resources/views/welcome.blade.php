@extends('layouts.main')

@section('title', 'Home - Kamajaya Kamaratih')

@section('content')
<div class="position-relative w-100" style="height: 100vh; overflow: hidden;">
    <img src="/logo/kjkr2015.jpg" alt="Foto KJKR 2015"
         class="position-absolute top-0 start-0 w-100 h-100"
         style="object-fit: cover; z-index: 1;">
    
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: rgba(13,71,161,0.4); z-index: 2;">
        <div class="d-flex align-items-end h-100 p-5">
            <h1 class="display-4 fw-bold text-white" style="text-shadow: 2px 2px 8px #000;">
                Pramuka Ambalan<br>Kamajaya Kamaratih
            </h1>
        </div>
    </div>
</div>
@endsection
