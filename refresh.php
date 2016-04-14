<?php
  //aliyun-php-sdk-core下载地址：https://develop.aliyun.com/sdk/php?spm=5176.7926450.210367.3.9mkyVD
  //aliyun-php-sdk-cdn下载地址：https://help.aliyun.com/document_detail/cdn/sdk/sdk-doc.html?spm=5176.2020520103.108.11.cTC3xD
  //修改aliyun-php-sdk-core/Config.php,引入cdn相关产品
  $user_id = "1276098";
  include_once 'aliyun-php-sdk-core/Config.php';
  include_once 'aliyun-php-sdk-cdn/Request/v20141111/RefreshObjectCachesRequest.php';

  //getprofile的三个参数依次是：gregion,Tigerwit Access Key ID,Tigerwit Access Key Secret 
  $iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "******", "******");
  $client = new DefaultAcsClient($iClientProfile);
  $request = new \Cdn\Request\V20141111\RefreshObjectCachesRequest();
  $path = "www.tigerwit.com/avatar/".$user_id."_*.jpg";
  $request->setObjectPath($path);
  $response = $client->doAction($request);
  $result = $response->getBody();
  echo '<br>';
  var_dump($result);
  echo '<br>';
  echo '<br>';
  echo '<br>';
  $oResult = json_decode($result,true);
  if($oResult && $oResult["RefreshTaskId"]){
    echo "<br>refresh success! url is:".$path."<br>";
  }else{
    echo "<br>refresh fail!url is:".$path."<br>";
  }
    echo "response:".$response->getBody();
?>
