@extends('layouts.master')
@section('menuDzikir', 'active')
@section('title', 'Dzikir')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Dzikir</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="{{url('/')}}">Doa & Dzikir</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Dzikir</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Gallery Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Materi Doa dan Dzikir</span>
                </p>
                <h1 class="mb-4">Macam-macam Doa dan Dzikir</h1>
            </div>
            <div class="row portfolio-container">
                @foreach ($dzikirs as $dzikir)
                    <div class="col-lg-4 col-md-6 mb-4 portfolio-item">
                        <div class="position-relative overflow-hidden mb-2">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $dzikir->image) }}" alt="" />
                            {{-- Judul --}}
                            <div class="portfolio-info bg-white p-3">
                                <h4>{{ $dzikir->title }}</h4>
                                <p>{{ $dzikir->language->name }}</p>
                                <a class="link-dzikir" href="{{ route('dzikir.show', ['slug' => $dzikir->id]) }}">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Dzikir Recommendations -->
            <div class="row">
                <div class="col-12 mb-5">
                    <h2 class="mb-4">Rekomendasi Dzikir Saat ini</h2>
                    @if ($morningDzikir->isNotEmpty())
                        @foreach ($morningDzikir as $dzikir)
                            <div class="col-lg-4 col-md-6 mb-4 portfolio-item recommended-dzikir-card">
                                <div class="position-relative overflow-hidden mb-2">
                                        <img class="img-fluid" src="{{ asset('storage/' . $dzikir->image) }}" alt="" />
                                    {{-- Judul --}}
                                    <div class="portfolio-info bg-white p-3">
                                        <h4 style="margin-bottom: 1rem;">{{ $dzikir->title }}</h4>
                                        <a class="link-dzikir" href="{{ route('dzikir.show', ['slug' => $dzikir->id]) }}">
                                            Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif($eveningDzikir->isNotEmpty())
                        @foreach ($eveningDzikir as $dzikir)
                            <div class="col-lg-4 col-md-6 mb-4 portfolio-item recommended-dzikir-card">
                                <div class="position-relative overflow-hidden mb-2">
                                    <a href="{{ route('dzikir.show', ['slug' => $dzikir->id]) }}">
                                        <img class="img-fluid w-100 h-200" src="{{ asset('storage/' . $dzikir->image) }}" alt="" />
                                    </a>
                                    {{-- Judul --}}
                                    <div class="portfolio-info bg-white p-3">
                                        <h4>{{ $dzikir->title }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Tidak ada rekomendasi tersedia.</p>
                    @endif
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- Gallery End -->

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#portfolio-filters li').on('click', function() {
                var filterValue = $(this).attr('data-filter');
                $('#portfolio-filters li').removeClass('active');
                $(this).addClass('active');

                if (filterValue == '*') {
                    $('.portfolio-item').show();
                } else {
                    $('.portfolio-item').not(filterValue).hide();
                    $(filterValue).show();
                }
            });
        });
    </script>
@endpush
