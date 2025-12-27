<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Automatic Email</title>
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
        <tr>
            <td align="center">
                <table align="center" border="1" cellpadding="0" cellspacing="0" width="600px" style="margin:15px; border: none;" bgcolor="#FFFFFF">
                    <tr>
                        <td align="center" style="padding:5px;">
                            <a href="https://talentak.com" target="_blank">
                                <img src="https://talentak.com/uploads/Settings/1698827023_4368.webp" alt="Logo" style="width:50%;border:0;" />
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table align="center" cellpadding="0" cellspacing="0" width="95%%" style="padding:15px;">
        <tr>
            <td align="center">
                <table align="center" border="1" cellpadding="0" cellspacing="0" width="600px" style="margin:15px;padding:15px;border-collapse: separate; border-spacing: 5px 5px;border: 1px solid #DDB864;" bgcolor="#FFFFFF">
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 30px 0;text-align: center;font-size: 24px;background: #3986ba;">
                            New Message
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding:10px 0;">
                            <table>
                                <tr>
                                    You&#39;ve recived a new Message from {{ $Client->name }}
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding:10px 0;">
                            <table>
                                <tr>
                                    <span style="color: #DDB864">( {{ $Message->created_at->format("F j, Y, g:i a") }} )</span>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>