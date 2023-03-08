<x-layout>
    <div class="w-full max-w-2xl p-5 mx-auto">
        <div>
            <p class="font-serif text-2xl font-black text-center">Trading Plan Generator</p>

            <div class="flex space-x-4">
                <div class="w-full">
                    <form method="post" class="w-full">
                        @csrf
                        <div class="p-4 space-y-4 border border-gray-100 rounded-lg">
                            <x-input name="account" label="Account" class="input_primary" value="{{ old('account') }}"/>
                            <x-input name="modal" label="Modal" class="input_primary" value="{{ old('modal') }}"/>
                            <x-input name="entry_price" label="Entry Price" class="input_primary" value="{{ old('entry_price') }}"/>
                            <x-input name="support" label="Support" class="input_primary" value="{{ old('support') }}"/>
                            <x-input name="resistance" label="Resistance" class="input_primary" value="{{ old('resistance') }}"/>
                            <div class="flex flex-col space-y-2">
                                <button type="submit" name="generate" class="w-full py-2 btn btn_primary">Generate Trading Plan</button>
                                <a href="{{ route('index') }}" class="w-full py-2 text-center btn btn_secondary">Clear</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="w-full bg-gray-100 rounded-lg">
                    @if ($result)
                        <div class="p-4 space-y-4 text-sm">
                            <div>
                                <p>{{ $result['account'] }}<br>{{ date('l, d/m/Y, H:i:s') }}</p>
                            </div>

                            <div>
                                <p>Support: {{ $result['support'] }} <br>Resistance: {{ $result['resistance'] }}</p>
                            </div>

                            <div>
                                <p>Entry Price: {{ $result['entry_price'] }}<br>Cut Loss 1 Bid (Risk): {{ $result['cut_loss_1_bid'] }} ({{ $result['cut_loss_1_bid_percentage'] }}%)<br>Cut Loss 2 Bids (Risk): {{ $result['cut_loss_2_bid'] }} ({{ $result['cut_loss_2_bid_percentage'] }}%)<br>Target Price (Reward): {{ $result['target_price'] }} ({{ $result['target_price_percentage'] }}%)</p>
                            </div>

                            <div>
                                <p>Modal: RM {{ number_format($result['modal'], 0, '.', ',') }}<br>Broker Fees: RM {{ number_format($result['broker_fee'], 0, '.', ',') }} ({{ $result['broker_fee_percentage'] }}%)<br>Others Fees: RM {{ number_format($result['other_fee'], 0, '.', ',') }} ({{ $result['other_fee_percentage'] }}%)<br>Total Fees: RM {{ number_format($result['total_fee'], 0, '.', ',') }} ({{ $result['total_fee_percentage'] }}%)<br>Invest: RM {{ number_format($result['invest'], 0, '.', ',') }}<br>Est. Loss 1 Bid: RM {{ number_format($result['estimate_loss_1_bid'], 0, '.', ',') }}<br>Est. Loss 2 Bids: RM {{ number_format($result['estimate_loss_2_bid'], 0, '.', ',') }}<br>Est. Profit: RM {{ number_format($result['estimate_profit'], 0, '.', ',') }}</p>
                            </div>

                            <div>
                                <p>Unit: {{ $result['unit'] }} units<br>Lot: {{ $result['lot'] }} lots</p>
                            </div>
                        </div>
                    @else
                        <div class="w-full h-full flex_center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            </svg>
                        </div >
                    @endif
                </div>
            </div >
        </div>
    </div >
</x-layout>
