<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexPage extends Controller
{
    public function index(Request $request) {
        $result = [];

        if ($request->has('generate')) {
            $validated = $request->validate([
                'account' => 'required',
                'modal' => 'required|numeric',
                'entry_price' => 'required|numeric',
                'support' => 'required|numeric',
                'resistance' => 'required|numeric',
            ]);

            if ($validated) {
                $result = $validated;
                $result['target_price'] = $result['resistance'];
                $result['target_price_percentage'] = number_format((($result['target_price'] - $result['entry_price']) / $result['entry_price']) * 100, 2, '.', '');
                $result['cut_loss_1_bid'] = ($result['support'] < 1) ? $result['support'] - 0.005 : $result['support'] - 0.01;
                $result['cut_loss_1_bid_percentage'] = number_format((($result['cut_loss_1_bid'] - $result['entry_price']) / $result['entry_price']) * 100, 2, '.', '');
                $result['cut_loss_2_bid'] = ($result['support'] < 1) ? $result['support'] - 0.01 : $result['support'] - 0.02;
                $result['cut_loss_2_bid_percentage'] = number_format((($result['cut_loss_2_bid'] - $result['entry_price']) / $result['entry_price']) * 100, 2, '.', '');
                $result['broker_fee'] = ($result['modal'] < 50000) ? $result['modal'] * 0.0008 : $result['modal'] * 0.0005;
                $result['broker_fee'] = ($result['broker_fee'] < 8) ? 8 : $result['broker_fee'];
                $result['broker_fee'] = $result['broker_fee'] * 2;
                $result['broker_fee_percentage'] = ($result['modal'] < 50000) ? 0.08 : 0.05;
                $result['broker_fee_percentage'] = $result['broker_fee_percentage'] * 2;
                $result['clearing_fee'] = $result['modal'] * 0.0003;
                $result['clearing_fee_percentage'] = 0.03;
                $result['thousand_count'] = floor($result['modal'] / 1000);
                $result['stamp_duty_fee'] = $result['thousand_count'] * 1.5;
                $result['stamp_duty_fee_percentage'] = $result['thousand_count'] * 0.15;
                $result['other_fee'] = $result['clearing_fee'] + $result['stamp_duty_fee'];
                $result['other_fee'] = $result['other_fee'] * 2;
                $result['other_fee_percentage'] = $result['clearing_fee_percentage'] + $result['stamp_duty_fee_percentage'];
                $result['other_fee_percentage'] = $result['other_fee_percentage'] * 2;
                $result['total_fee'] = $result['broker_fee'] + $result['other_fee'];
                $result['total_fee_percentage'] = $result['broker_fee_percentage'] + $result['other_fee_percentage'];
                $result['invest'] = $result['modal'] - $result['total_fee'];
                $result['estimate_loss_1_bid'] = $result['invest'] * ($result['cut_loss_1_bid_percentage'] / 100);
                $result['estimate_loss_2_bid'] = $result['invest'] * ($result['cut_loss_2_bid_percentage'] / 100);
                $result['estimate_profit'] =$result['invest'] * ($result['target_price_percentage'] / 100);
                $result['unit'] = number_format($result['invest'] / $result['entry_price'], 0, '', '');
                $result['lot'] = number_format($result['unit'] / 100, 0, '', '');
            }

            $request->flash();
        }

        return view('web.index', [
            'result' => $result,
        ]);
    }
}
