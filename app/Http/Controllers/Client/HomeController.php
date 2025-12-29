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
        return view('Client.index');
    }


}
