<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<?php
session_start();
$digits = 4;
$code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
$_SESSION['otp']=$code;

$mo=$_POST['mobile'];
$mess=$_POST['message'];
echo $mo;
echo $mess;
$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "$code",
    "language" => "english",
    "route" => "p",
    "numbers" => "$mo",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: nIwkuUzLtlhseMXJb214HvQD0f89ciRWC7Bo5mpVPF6grYGOKZ4bHgzpj8BEJrQIRiwqP10GcVMkm3u7",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>


<script>
    $(document).ready(function() {
        $('#for').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: 'verified.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {

                    console.log(data);
                }

            });
        })

    })
</script>
