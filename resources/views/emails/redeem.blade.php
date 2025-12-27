<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ env("APP_NAME") }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="telephone=no" name="format-detection">
    <meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" name="viewport">
    <style>
        tr,
        td {
            border: none !important;
        }
    </style>
</head>

<body style="margin:0; padding:10px 0 0 0;" bgcolor="#FFFFFF">

    <table align="center" cellpadding="0" cellspacing="0" width="95%%" style="padding:15px;">
        <h1>Redeem Coupon - {{ env("APP_NAME") }}</h1>
        <p>
            <b>
                Coupon Code Successfully Redeemed at  {{ now()->format("F j, Y, g:i a") }}
            </b>
        </p>
        <p>{{ $Coupon->title_en }} - {{ $Brand->title_en }}</p>
        @if($Client->name)
            <p>Client Name:     {{ $Client->name }}</p>
        @endif
        @if($Client->phone)
            <p>Client Phone:    {{ $Client->phone_code }} {{ $Client->phone }}</p>
        @endif
        @if($Client->email)
            <p>Client Email:    {{ $Client->email }}</p>
        @endif
        <p>
            Powered By <a href="https://emcan-group.com">Emcan Solutions</a>
        </p>
    </table>
</body>

</html>