@extends('layouts.app')

@section('livewire-css')
    <livewire:styles />
@endsection

@section('content')
    <livewire:timeline.store-tweet />
    <livewire:timeline.tweets />
@endsection

@section('livewire-scripts')
    <livewire:scripts />

    <script>
        // window.addEventListener('toastr:success', event => {
        //     toastr.success(event.detail.message);
        // });

        window.addEventListener('toastr:success', function(event) {
            toastr.success(event.detail.message);
        });
    </script>
@endsection