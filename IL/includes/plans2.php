<style>
	.text-dest {
    background-color: orange;
    text-align: center;
    color:white;
    display: table-cell;
    overflow: hidden;
    vertical-align:middle;
}
    .card-blog-entry figure{ text-align:center;}
    .hover-item:hover .hover-transition{ background-color:rgba(0,0,0,.65); }
</style>
<script>
     $('#date').datetimepicker({
    defaultDate: new Date()
});
</script>
<!-- Content -->
<div class="main-content py-0">


    <!-- Portfolio section -->
    <div class="section">

        <div class="container-fluid px-3 px-md-5 section py-5 pb-lg-0" id="eSim">

            <div class="row">
                <div class="col-xl-12">
                    <div class="vw-100 h-100 d-flex align-items-center ml-n3 ml-md-n5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                                    <div class="text-center">
                                        <h2 class="h1 section-title-3 font-weight-700">We offer data and voice.<br>Select your destination:</h2>
                                        <div class="lead-sm mb-5">
                                            <!--Cras aliquet condimentum nec vitae convallis nusce sapien malesuada consequat lectus sagittis interdum-->
                                        </div>
                                        <!--<a href="#" class="btn btn-round btn-primary mb-0">View all works</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="row">
                        
                        <?php
                        $select = mysqli_query($con, "select * from zones where status='A' ORDER BY position");
                        while($row = mysqli_fetch_assoc($select)){
                            if(empty($row['zone_url'])){
                        ?>
                        <div class="col-md-3">
							
                            <div class="card card-blog-entry border-0">
                                <div class="hover-item rounded-ultra shadow-mdz">
                                    <a href="#" data-toggle="modal" data-target="#modalZones<?php echo $row['id']; ?>" onclick="ChangeUrl('Page1', '<?php echo $row['tags']; ?>');">
                                        <div class="hover-transition rounded-ultra">
                                            <div class="hover-up">
                                                <h5 class="hover-title font-weight-700 mb-1"><?php //echo $row['zone_name']; ?></h5>
                                                <p class="text-white">All plans come with 100 free voice minutes and unlimited incoming texts</p>
                                                <!--<div class="hover-desc">Vestibulum vulputate semper</div>-->
                                            </div>
                                        </div>
                                        <figure>
                                            <img class="img-fluid" src="assets/images/continent/<?php echo $row['image']; ?>" alt="<?php echo $row['zone_name']; ?>">                         
                                            <div  style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;font-weight: 2000 !important;font-size: 1.25rem;" ><strong><?php echo $row['zone_name']; ?></strong></div>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } else{ ?>
                        <div class="col-md-3">
                            <div class="card card-blog-entry border-0">
                                <div class="hover-item rounded-ultra shadow-md">
                                    <a href="<?php echo $row['zone_url']; ?>">
                                        <div class="hover-transition rounded-ultra">
                                            <!--<div class="hover-down">-->
                                            <!--    <i class="fas fa-link fa-2x hover-icon"></i>-->
                                            <!--</div>-->
                                            <div class="hover-up">
                                                <h5 class="hover-title font-weight-700 mb-1"><?php //echo $row['zone_name']; ?></h5>
                                                <!--<div class="hover-desc">Vestibulum vulputate semper</div>-->
                                            </div>
                                        </div>
                                        <figure style="text-align:center">
                                            <img class="img-fluid" src="assets/images/continent/<?php echo $row['image']; ?>" alt="<?php echo $row['zone_name']; ?>" >
											<div  style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: #fff;font-weight: 2000 !important;font-size: 1.25rem;" ><strong><?php echo $row['zone_name']; ?></strong></div>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } }?>

                    </div>
                </div>

            </div>

        </div>

    </div>




    <!-- Modal zones -->
    <?php
    $select = mysqli_query($con, "select * from zones where status='A'");
    while($row = mysqli_fetch_assoc($select)){
    ?>
    <div class="modal fade" id="modalZones<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content rounded-ultra">
                <div class="modal-body p-0">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="CloseUrl();">
                        <span aria-hidden="true"></span>
                    </button>

                    <div class="row no-gutters">
                        <div class="col-lg-7 d-none d-lg-block border-right">
                            <div class="pl-4 pl-md-5 pl-lg-4 pl-xl-4 py-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="font-weight-700 text-center pb-2 mb-2"><?php echo $row['zone_name']; ?></h5>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <span class="font-weight-600">This plan includes the following </span><span class="font-weight-600 text-success"><?php echo count(explode(",", $row['countries'])); ?> Countries:</span>
                                    </div>
                                    <?php 
                                    foreach (explode(",", $row['countries']) as $value) { 
                                        $country_row = mysqli_fetch_assoc(mysqli_query($con, "select * from countries where id='$value'"));
                                    ?>
                                    <div class="col-lg-4 col-xl-3">
                                        <div class="hover-item">
                                            <div class="hover-inner-wrap">
                                                <figure  class="py-0">
                                                    <img class="img-fluid flag" src="assets/images/flag/<?php echo $country_row['flag']; ?>" alt="image">
                                                    <p>
                                                        <?php echo ucwords($country_row['country_name']); ?>
                                                    </p>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="px-4 px-md-3 px-lg-3 px-xl-3 px-xl-3 pt-5 pb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                            <?php
                                            $i = 1;
                                            $select_plan = mysqli_query($con, "select * from plans where zone_id='".$row['id']."' AND status='A' ORDER BY length(Days)");
                                            while($plan_row = mysqli_fetch_assoc($select_plan)){
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if($i == 1){ echo 'active'; } ?>" onclick="ChangeUrl('Page1', '<?php echo $row['tags'].'/'.$plan_row['tags']; ?>');" id="pills-first-tab<?php echo $plan_row['id']; ?>" data-toggle="pill" href="#pills-first_<?php echo $plan_row['id']; ?>" role="tab" aria-controls="pills-first" aria-selected="false"><?php echo $plan_row['Days']; ?> Days</a>
                                            </li>
                                            <?php $i++; } ?>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <?php
                                            $i = 1;
                                            $select_plan = mysqli_query($con, "select * from plans where zone_id='".$row['id']."' AND status='A'");
                                            while($plan_row = mysqli_fetch_assoc($select_plan)){
                                             $select_esimlive = mysqli_query($con, "select * from esimlive where status='A' AND id='1'");
                                             $esimlive_row = mysqli_fetch_assoc($select_esimlive);
                                            ?>
                                            <div class="tab-pane fade <?php if($i == 1){ echo 'active show';} ?>" id="pills-first_<?php echo $plan_row['id']; ?>" role="tabpanel" aria-labelledby="pills-first-tab">
                                                <h5 class="font-weight-700 pb-2 mb-0"><?php echo $plan_row['plan_name']; ?></h5>
                                                <p class="text-justify"><?php echo $plan_row['content']; ?></p>
                                                <div class="row">
                                                    <form method="post">
                                                        <div class="col-12">
                                                            <table class="table table-borderless mb-1">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="pb-0 bg-white font-weight-500" style="color:#717171">Plan Charge</th>
                                                                        <td class="font-weight-500 pb-0 text-right w-25 pr-3">$<?php echo $plan_row['USD']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-500 line-height pt-0" colspan="2">
                                                                            <ul class="m-0">
                                                                                <?php if(!empty($plan_row['GB'])){ ?>
                                                                                <li>Data - <?php echo $plan_row['GB']; ?> GB</li>
                                                                                <?php } if(!empty($plan_row['Mins'])){ ?>
                                                                                <li>Voice - <?php echo $plan_row['Mins']; ?> Mins</li>
                                                                                <?php } if(!empty($plan_row['SMS'])){ ?>
                                                                                <li>SMS - <?php echo $plan_row['SMS']; ?></li>
                                                                                <?php } if(!empty($plan_row['Days'])){ ?>
                                                                                <li>Validity - <?php echo $plan_row['Days']; ?> Days</li>
                                                                                <?php } ?>
                                                                                <li>Travel Date: 
                                                                                    <i class="fa fa-calendar" style="color:#000"></i>
                                                                                    <input type="text" class="datepicker" name="birthday" value="<?php echo date('d-M-y', strtotime("+1 day")).' ('.date('D', strtotime("+1 day")).')'; ?>" readonly>
                                                                                    <!--<?php //echo date('d-M-y', strtotime("+1 day")).' ('.date('D', strtotime("+1 day")).')'; ?>-->
                                                                                </li>
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <input type="hidden" class="usd<?php echo $plan_row['id']; ?>" value="<?php echo $plan_row['USD']; ?>">
                                                                    <?php
                                                                    $select_esim = mysqli_query($con, "select * from esimlive where status='A' ORDER BY id DESC");
                                                                    while($esim_row = mysqli_fetch_assoc($select_esim)){
                                                                    if($esim_row['status']=="A"){
                                                                    ?>
                                                                    <tr class="<?php if($esim_row['id']==1){ echo 'display-esim'.$plan_row['id']; if($esimlive_row['checked']=='Uncheck'){ echo ' text-white';} } ?> ">
                                                                        <th class="font-weight-500"><span class="<?php if($esim_row['id']==2){ echo 'display-activa'.$plan_row['id']; } ?>"><?php echo $esim_row['name']; ?></span></th>
                                                                        <td class="font-weight-500 pr-3 text-right esimamt<?php echo $plan_row['id']; ?> <?php if($esim_row['id']==2){ echo 'display-activa'.$plan_row['id']; } ?>">$<?php echo $esim_row['USD']; ?>
                                                                            <?php if($esim_row['id']==1){ ?>
                                                                            <input type="hidden" class="esim-amt<?php echo $plan_row['id']; ?>" value="<?php echo $esim_row['USD']; ?>">
                                                                            <?php 
                                                                            $esimamt = $esim_row['USD'];
                                                                            } else{ ?>
                                                                            <input type="hidden" class="activation<?php echo $plan_row['id']; ?>" value="<?php echo $esim_row['USD']; ?>">
                                                                            <?php 
                                                                            $actamt = $esim_row['USD'];
                                                                            } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } } ?>
                                                                    <tr>
                                                                        <th class="font-weight-600 pr-3">Total Charge</th>
                                                                        <td class="font-weight-600 text-right" style="border-top:1px solid">$<input type="text" class="total total<?php echo $plan_row['id']; ?>" name="charge" id="totalValue_<?php echo $plan_row['id']; ?>" value="<?php echo $plan_row['USD']+$esimamt+$actamt; ?>">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-12 pl-4">
                                                            <div class="form-check my-2 w-80">
                                                                <input class="form-check-input esim" type="checkbox" value="<?php echo $plan_row['id']; ?>" name="esim" id="esim<?php echo $plan_row['id']; ?>" <?php if($esimlive_row['checked']=='Check'){ echo 'checked';} ?>>
                                                                <label class="form-check-label" for="esim">
                                                                   <?php echo $esimlive_row['short_desc']; ?>
                                                                </label>
                                                            </div>
                                                            <!--<p>You must agree to the following to complete you order:</p>-->
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input compatibility compatibility<?php echo $plan_row['id']; ?>" type="checkbox" value="<?php echo $plan_row['id']; ?>">
                                                                <label class="form-check-label">
                                                                    I understand that in order to use an eSIM, I need an eSIM compatible phone (please see <a href="<?php echo constant("SITEURL"); ?>esim-phones" target="blank">list</a> here).
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input agree agree<?php echo $plan_row['id']; ?>" type="checkbox" value="<?php echo $plan_row['id']; ?>">
                                                                <label class="form-check-label">
                                                                    I am ok with the <font color="blue">gsm</font><font color="green">2go</font> eSIM <a href="<?php echo constant("SITEURL"); ?>tnc" target="blank">Term and Conditions and Privacy Policy</a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mx-auto">
                                                            <input type="hidden" name="direct" value="<?php echo $plan_row['id']; ?>">
                                                            <!-- <button id="buybutton_<?php echo $plan_row['id']; ?>" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 mb-4 buy-now<?php echo $plan_row['id']; ?>" disabled>Buy Now</button> -->
                                                            <?php if(isset($_SESSION['user'],$_SESSION['role']) && $_SESSION['role']=="U"){ ?>
                                                            <button type="submit" formaction="<?php echo constant("SITEURL"); ?>checkout" id="<?php echo $plan_row['id']; ?>" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 mb-4 buy-now<?php echo $plan_row['id']; ?>" disabled>Proceed</button>
                                                            <?php } else{ ?>
                                                            <button type="submit" formaction="<?php echo constant("SITEURL"); ?>signup" id="<?php echo $plan_row['id']; ?>" class="btn btn-block buybutton btn-round btn-md btn-primary mx-2 mt-4 mx-lg-3 mb-4 buy-now<?php echo $plan_row['id']; ?>" disabled>Proceed</button>
                                                            <?php } ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <?php $i++; } ?>
                                        </div>
                                    </div>
                                    
                                </div>
        
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
