<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail | OTP</title>
</head>
<body>

    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
        <div style="margin:50px auto;width:70%;padding:20px 0">
            <div style="border-bottom:1px solid #eee">
                <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Verify Your Account By Using This OTP</a>
            </div>
            {{-- <p style="font-size:1.1em">Hi {{ $user['name'] }},</p> --}}
            <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
                {{ $otp }}
            </h2>
            <p>Use the following OTP to Verify your account. OTP is valid for 5 minutes. Thank you </p>

            {{-- <p style="font-size:0.9em;">Regards,<br />MD ASIF</p> --}}
            <hr style="border:none;border-top:1px solid #eee" />
            {{-- <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                <p>BDcalling IT LTD</p>
                <p>Joypurhat Tower, Banashree</p>
                <p>Dhaka</p>
            </div> --}}
        </div>
    </div>

</body>
</html>
