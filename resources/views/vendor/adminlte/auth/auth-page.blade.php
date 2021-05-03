@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
<div class="container">
    <div class="row">
      <div class="col-sm-6 no-gutters" style="padding-right: 0px;">
        <div class="card" style="width: 100%; height: 363px;">
        <img src="{{asset('img/login.jpg')}}" alt="gb" style="height: 363px;">
        </div>
      </div>
      <div class="col-sm-6 no-gutters" style="padding-left: 0px;">
            <div class="{{ $auth_type ?? 'login' }}-box">

            {{-- Logo --}}


            {{-- Card Box --}}
            <div class="card"  style="width: 400px; height: 363px;">

                {{-- Card Header
                @hasSection('auth_header')
                    <div class="card-header">
                        <h3 class="card-title float-none">
                            @yield('auth_header')
                        </h3>
                    </div>
                @endif--}}

                {{-- Card Body --}}
                <div class="card-body {{ $auth_type ?? 'login' }}">
                    @yield('auth_body')
                </div>

                {{-- Card Footer
                @hasSection('auth_footer')
                    <div class="card-footer">
                        @yield('auth_footer')
                    </div>
                @endif
                --}}
            </div>
      </div>
    </div>
</div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
