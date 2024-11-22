@extends('layout.main')
@section('meta-title', 'Dashboard')


@section('content')
    <x-layout.content.__row gap='4'>
        <x-layout.content.__col lg="9">
            {{-- <x-widgets.statistics title="Statistics" subtitle="Updated 1 month ago" :items="[
                [
                    'icon' => 'ti ti-chart-pie-2 ti-sm',
                    'count' => '230k',
                    'title' => 'Sales',
                ],
                [
                    'color' => 'info',
                    'icon' => 'ti ti-users ti-sm',
                    'count' => '8.549k',
                    'title' => 'Customers',
                ],
                [
                    'color' => 'danger',
                    'icon' => 'ti ti-shopping-cart ti-sm',
                    'count' => '1.423k',
                    'title' => 'Products',
                ],
                [
                    'color' => 'success',
                    'icon' => 'ti ti-currency-dollar ti-sm',
                    'count' => '$9745',
                    'title' => 'Revenue',
                ],
            ]" /> --}}
        </x-layout.content.__col>
    </x-layout.content.__row>
@endsection
