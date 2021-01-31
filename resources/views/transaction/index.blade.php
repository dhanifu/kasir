@extends('_layouts.app')

@section('title', 'Transaksi')

@section('content')
    
    <livewire:transaction.create />

    <div class="row">
        <livewire:transaction.data />
        <livewire:transaction.payment />
    </div>

    @push('js')
        <script>
            jQuery(function ($) {
                $('.submit').attr('disabled', 'disabled')

                $('[name=money]').on('keyup', function() {
                    const number = Number(this.value.replace(/\D/g, ''))
                    const price = new Intl.NumberFormat().format(number)
                    
                    this.value = price.replace('.', ',')
                })
            })
        </script>
    @endpush

@endsection
