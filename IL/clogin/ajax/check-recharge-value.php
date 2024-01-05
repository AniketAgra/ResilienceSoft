<?php
session_start();
include("../includes/config.php");

$iccid  = mysqli_real_escape_string($con,$_POST['iccid']);

$post_body = array();
$post_body['auth_info'] = json_encode(array('login' => 'esimAPI', 'password' => '$0%6YrU$jJRh'));
$params = array('id' => $iccid);
$post_body['params'] = json_encode($params);
$URL = "https://mybilling.globalvoiceconnect.com:443/rest/Account/get_account_info";
$response = sendCurlPost($URL, $post_body);
http_response_code($response['info']['http_code']);
$iccidresult = json_decode($response['data'],true); 
if($iccidresult['account_info']['activation_date'])
{
    if($iccidresult['account_info']['assigned_addons']['0']['name'])
    {
        // $end = date("Y-m-d",strtotime($iccidresult['account_info']['activation_date']. ' +29 days'));
        $end =date("d-M-Y",strtotime($iccidresult['account_info']['activation_date']. ' +29 days')).' ('.date("D",strtotime($iccidresult['account_info']['activation_date']. ' +29 days').")").')';
        echo "<b>Current Plan Name : </b>".$iccidresult['account_info']['assigned_addons']['0']['name'];
        echo "<br>";
        echo "<b>Activation Date : </b>".date("d-M-Y",strtotime($iccidresult['account_info']['activation_date']))." (".date("D",strtotime($iccidresult['account_info']['activation_date'])).")";
        echo "<br>";
        echo "<b>Expire On : </b>".date("d-M-Y",strtotime($iccidresult['account_info']['activation_date']. ' +29 days'))." (".date("D",strtotime($iccidresult['account_info']['activation_date']. ' +29 days')).")";
        echo '<script>$("#date").val("'.$end.'");</script>';
        
        $plandetail = mysqli_query($con, "select * from plans where sku='".$iccidresult['account_info']['assigned_addons']['0']['name']."'");
        $planrow = mysqli_fetch_assoc($plandetail);
        $brandid = $planrow['brandId'];
        $planid  = $planrow['id'];
        echo '<script>$("#brands option[value='.$brandid.']").attr("selected", "selected");</script>';
        if($brandid)
        {
        ?>
            <script>
                var brand_id  = $("#brands").val();
                $.ajax({
                    url: "ajax/change-brands.php",
                    type: "POST",
                    data: { brand_id: brand_id },
                    cache: false,
                    success: function(result){
                        $("#plans").html(result); 
                        $('#plans option[value="<?php echo $planid; ?>"]').attr("selected", "selected");
                        var plan_id = $("#plans").val();
                        $.ajax({
                            url: "ajax/retail-rate.php",
                            type: "POST",
                            data: { plan_id: plan_id },
                            dataType:"json",  
                            success: function(data){
                                $('#retail').val(data.retailRate);
                                $('#rate').val(data.dealerRate);
                            }
                        });
                    }
                });
                
              
                
            </script>
        <?php
        }
    }   
    else
    {
        echo "<b>Activation Date : </b>".date("d-M-Y",strtotime($iccidresult['account_info']['activation_date']))." (".date("D",strtotime($iccidresult['account_info']['activation_date'])).")";
    }
}
else
{
    echo "";
}



function sendCurlPost($url, $post_body)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $res = curl_exec($ch);
    $info = curl_getinfo($ch);
    return array('data'=>$res, 'info'=>$info);
}
?>
