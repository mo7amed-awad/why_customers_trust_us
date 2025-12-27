<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\About\Entities\Model as About;
use Modules\Bidding\Entities\Model as Bidding;
use Modules\BidRequest\Entities\Model as BidRequest;
use Modules\Brand\Entities\Model as Brand;
use Modules\Contact\Entities\Model as Contact;
use Modules\FAQ\Entities\Model as FAQ;
use Modules\Limousine\Entities\Model as Limousine;
use Modules\Payment\Entities\Model as Payment;
use Modules\Privacy\Entities\Model as Privacy;
use Modules\Rental\Entities\Model as Rental;
use Modules\RentalRequest\Entities\Model as RentalRequest;
use Modules\Service\Entities\Model as Service;
use Modules\Term\Entities\Model as Term;
use Modules\Testimonial\Entities\Model as Testimonial;
use App\Mail\RentalRequestConfirmationMail;
use Illuminate\Support\Facades\Mail;


class HomeController extends BasicController
{
    public function home()
    {
        $Abouts = About::Active()->get();
        $Testimonials = Testimonial::Active()->get();
        $Services = Service::Active()->get();
        $FAQs = FAQ::Active()->get();

        $Rentals = Rental::query()->with('Image', 'Specifications')->where('home', 1)->take(3)->get();

        return view('Client.home', compact('Abouts', 'Testimonials', 'FAQs', 'Services', 'Rentals'));
    }

    public function select_rental()
    {
        return view('Client.select-rental');
    }

    public function rental(Request $request)
    {
        if (! $request->has(['pickup_location', 'pickup_date', 'pickup_time', 'return_location', 'return_date', 'return_time'])) {
            if (! session()->has('rental_details')) {
                return redirect()->route('client.rental.select');
            }
        } else {
            session([
                'rental_details' => [
                    'pickup_location' => $request->pickup_location,
                    'pickup_lat' => $request->pickup_lat,
                    'pickup_lng' => $request->pickup_lng,
                    'return_location' => $request->return_location,
                    'return_lat' => $request->return_lat,
                    'return_lng' => $request->return_lng,
                    'pickup_date' => $request->pickup_date,
                    'pickup_time' => $request->pickup_time,
                    'return_date' => $request->return_date,
                    'return_time' => $request->return_time,
                ],
            ]);
        }

        $Brands = Brand::Active()->get();

        $Rentals = Rental::query()->with('Image', 'Specifications')
            ->when($request->brand_id, function ($query) use ($request) {
                return $query->where('brand_id', $request->brand_id);
            })
            ->when($request->price, function ($query) use ($request) {
                $price = $request->price;
                if ($price === '20000+') {
                    return $query->where('price', '>=', 20000);
                } else {
                    [$min, $max] = explode('-', $price);

                    return $query->whereBetween('price', [(int) $min, (int) $max]);
                }
            })
            ->when(request('filter_by') == 'date', function ($query) {
                return $query->orderBy('created_at', request('ordering_rule', 'desc'));
            })
            ->paginate(15)
            ->appends($request->query());

        return view('Client.rental', compact('Rentals', 'Brands'));
    }

    public function checkout_rental()
    {
        if (! session()->has('rental_details')) {
            return redirect()->route('client.rental.select');
        }

        $Rental = Rental::query()->where('id', request('id'))->with('Image', 'Specifications')->firstorfail();
        $Payments = Payment::Active()->get();

        return view('Client.checkout_rental', compact('Rental', 'Payments'));
    }

    public function rent(Request $request)
    {
        $Rental = Rental::query()->where('id', request('rental_id'))->firstorfail();
        $sub_total = $Rental->price;
        $vat = $Rental->price / 100 * setting('vat');
        $net_total = $sub_total + $vat;

        $RentalRequest = RentalRequest::create($request->only('rental_id', 'payment_id', 'name', 'email', 'phone', 'phone_code', 'country_code') + [
            'sub_total' => $sub_total,
            'vat' => $vat,
            'net_total' => $net_total,
        ]);

        if ($request->payment_id == 1) {

            // Mail::to($RentalRequest->email)->send(new RentalRequestConfirmationMail($RentalRequest));
            // Mail::to(setting('email'))->send(new RentalRequestConfirmationMail($RentalRequest));

            return redirect()->route('client.success');
        } else {
            return redirect()->away($this->TapPaymentLink($RentalRequest->id, $RentalRequest->net_total, $RentalRequest->name, $RentalRequest->phone, $RentalRequest->country_code, $RentalRequest->email, $RentalRequest->Payment->key));
        }

        return redirect()->route('client.success', $RentalRequest);
    }

    public function bidding(Request $request)
    {
        $Brands = Brand::Active()->get();

        $Biddings = Bidding::query()->with('Image', 'Specifications')
            ->when($request->brand_id, function ($query) use ($request) {
                return $query->where('brand_id', $request->brand_id);
            })
            ->when(request('filter_by') == 'date', function ($query) {
                return $query->orderBy('created_at', request('ordering_rule', 'desc'));
            })
            ->paginate(15)
            ->appends($request->query());

        return view('Client.bidding', compact('Biddings', 'Brands'));
    }

    public function checkout_bidding()
    {
        $Bidding = Bidding::query()->where('id', request('id'))->with('Image', 'Specifications')->firstorfail();
        $Payments = Payment::Active()->get();

        return view('Client.checkout_bidding', compact('Bidding', 'Payments'));
    }

    public function bid(Request $request)
    {
        $BidRequest = BidRequest::create($request->only('bidding_id', 'name', 'email', 'phone', 'phone_code', 'country_code', 'bid'));

        return redirect()->route('client.success', $BidRequest);
    }

    public function privacy()
    {
        $Privacy = Privacy::Active()->get();

        return view('Client.privacy', compact('Privacy'));
    }

    public function limousine()
    {
        $Limousines = Limousine::Active()->get();

        return view('Client.limousine', compact('Limousines'));
    }

    public function terms()
    {
        $Term = Term::Active()->get();

        return view('Client.terms', compact('Term'));
    }

    public function services()
    {
        $Services = Service::Active()->get();

        return view('Client.services', compact('Services'));
    }

    public function contact(Request $request)
    {
        $Contact = Contact::create($request->only('name', 'email', 'phone', 'phone_code', 'subject', 'message'));

        toast(__('trans.We_received_purchase'), 'success');

        return redirect()->back();
    }

    public function success()
    {
        return view('Client.success');
    }

    public function failed()
    {
        return view('Client.failed');
    }

    public function TapResponse($id, Request $request)
    {
        $RentalRequest = RentalRequest::where('tap_id',request('tap_id'))->firstorfail();
        $charge_data = $this->TapCheckResponse($RentalRequest->tap_id);
        $lang = lang();
        if (isset($charge_data['status']) && ($charge_data['status'] == 'PAID' || $charge_data['status'] == 'CAPTURED')) {

            $RentalRequest->paid = 1;
            $RentalRequest->save();

            // Mail::to($RentalRequest->email)->send(new RentalRequestConfirmationMail($RentalRequest));
            // Mail::to(setting('email'))->send(new RentalRequestConfirmationMail($RentalRequest));

            return redirect()->away(env('APP_URL')."/$lang/success/{$RentalRequest->id}");
        } else {
            return redirect()->away(env('APP_URL')."/$lang/failed/{$RentalRequest->id}");
        }
    }

    public function TapPaymentLink($id, $net, $name, $phone, $country_code, $email = 'apps@emcan-group.com', $src = 'src_all')
    {
        $fields = (object) (object) [];

        $fields->amount = (float) $net;
        $fields->currency = 'BHD';
        $fields->save_card = false;
        $fields->description = '';
        $fields->statement_descriptor = '';

        $fields->metadata = (object) [];
        $fields->metadata->udf1 = $id;

        $fields->reference = (object) [];
        $fields->reference->transaction = '';
        $fields->reference->order = '';

        $fields->receipt = (object) [];
        $fields->receipt->email = true;
        $fields->receipt->sms = true;

        $fields->customer = (object) [];
        $fields->customer->first_name = $name;
        $fields->customer->middle_name = '';
        $fields->customer->last_name = '';
        $fields->customer->email = $email;
        $fields->customer->phone = (object) [];
        $fields->customer->phone->country_code = $country_code;
        $fields->customer->phone->number = $phone;

        $fields->merchant = (object) [];
        $fields->merchant->id = '';

        $fields->source = (object) [];
        $fields->source->id = $src;
        $fields->source->phone = (object) [];
        $fields->source->phone->country_code = $country_code;
        $fields->source->phone->number = $phone;

        $fields->post = (object) [];
        $fields->post->url = env('APP_URL');

        $fields->redirect = (object) [];
        $lang = lang();
        $fields->redirect->url = env('APP_URL')."/$lang/rental_requests/tap/payments/response/$id";

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.tap.company/v2/charges',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => [
                'authorization: Bearer '.env('TAP_SECRET'),
                'content-type: application/json',
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo 'cURL Error #:'.$err;
        } else {
            $data = json_decode($response);

            if (isset($data->id)) {
                RentalRequest::where('id', $id)->update([
                    'tap_id' => $data->id,
                ]);

                return $data->transaction->url;
            }
            dd($data);

        }
    }

    public function TapCheckResponse($charge_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.tap.company/v2/charges/$charge_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => '{}',
            CURLOPT_HTTPHEADER => [
                'authorization: Bearer '.env('TAP_SECRET'),
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $response['status'] = 'cURL Error #:'.$err;
        }
        $response = json_decode($response, true);

        return $response;
    }
}
