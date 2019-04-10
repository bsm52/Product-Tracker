<?php
  error_reporting(0);

  $name = $_POST['name'];
  
  // Your Access Key ID, as taken from the Your Account page
  $access_key_id = "AKIAJJO5EPD46ZBKZMVQ";

  // Your Secret Key corresponding to the above ID, as taken from the Your Account page
  $secret_key = "dWuoEGBleFe3axMzJwQ2HMJIXd58soGscx3Rj8EE";

  // The region you are interested in
  $endpoint = "webservices.amazon.com";

  $uri = "/onca/xml";

  $params = array(
      "Service" => "AWSECommerceService",
      "Operation" => "ItemSearch",
      "AWSAccessKeyId" => "AKIAJJO5EPD46ZBKZMVQ",
      "AssociateTag" => "brandon082-20",
      "SearchIndex" => "All",
      "Keywords" => "$name",
      "ResponseGroup" => "Images,ItemAttributes,Offers"
  );

  // Set current timestamp if not set
  if (!isset($params["Timestamp"])) {
      $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
  }

  // Sort the parameters by key
  ksort($params);

  $pairs = array();

  foreach ($params as $key => $value) {
      array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
  }

  // Generate the canonical query
  $canonical_query_string = join("&", $pairs);

  // Generate the string to be signed
  $string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;

  // Generate the signature required by the Product Advertising API
  $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $secret_key, true));

  // Generate the signed URL
  $request_url = 'https://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

  //echo "Signed URL: \"".$request_url."\"";
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="mainStyle.css">
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body style="height: 1500px;">

  <?php
  $xml = simplexml_load_file($request_url);
  foreach ($xml->Items->Item as $item) 
  {
   echo "<div class=\"amazonItem\"><img src=\"" . $item->MediumImage->URL . "\"><p>" . $item->ItemAttributes->Title . "</p><br><p class=\"w3-button w3-black\" onclick=\"showForm('" . $item->ItemAttributes->Title . "')\">Choose Item</p></div>";
  }
  ?>
  <br><br><br><br><br><br><br>
  
  <div id="getPrice">
  </div>
  
<script type="text/javascript">
  function showForm(value){
    var AboutDiv = document.getElementById("getPrice");
    var AboutDivOffset = AboutDiv.offsetTop;
    var AboutDivPosition = AboutDivOffset - 40;
    window.scrollTo(0, AboutDivPosition);
    document.getElementById("getPrice").innerHTML = "<div><form name=\"getPrice\" method='get' class=\"amazonForm\" action=\"additem.php\" target=\"_blank\"><input type=\"text\" name=\"name\" value=\"" + value + "\" placeholder=\"Name\"><br><input type=\"text\" name=\"price\" placeholder=\"Price\"><br><input type=\"text\" name=\"quantity\" placeholder=\"quantity\"><br><span>Item Condition:</span><br><input type=\"checkbox\" name=\"condition\" value=\"new\">New <br><input name=\"onAmazon\" type=\"hidden\" value=\"1\"><input type=\"checkbox\" name=\"condition\" value=\"used\">Used <br><input type=\"submit\" name=\"submit\"></form></div>";
  }
</script>
</body>
</html>