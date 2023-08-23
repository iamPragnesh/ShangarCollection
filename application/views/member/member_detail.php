<!DOCTYPE html>
<html lang="en">

    <title>Order Invoice - Shangar Collection</title>

    <?php
    $this->load->view('head');
    ?>

    <body>
        <div id="ec-overlay"><span class="loader_img"></span></div>

        <?php
        $this->load->view('header');
        ?>

        <!-- Ec breadcrumb start -->
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="ec-breadcrumb-title">Order Invoice</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Order Invoice</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->


        <!-- User profile section -->
        <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
            <div class="container">
                <div class="row">
                <div class="ec-vendor-dashboard-card ec-vendor-profile-card">
                    <div class="row" style="padding: 11px;">
                        <div class="col-md-6"><h3>Order Invoice</h3></div>
                    <div class="col-md-6" style="padding-left: 39%;">
                        <button class="btn btn-primary" onclick="printDiv('printableArea');">Print Invoice</button></div>
                </div>
                </div>
                </div>
                <div class="row">
                        <div class="ec-vendor-dashboard-card ec-vendor-profile-card">
                            <div class="ec-vendor-card-body" id="printableArea">
                                <div class="row" style="padding: 11px;">
                                    <div class="row">
                                    <div class="col-6">
                                        <div style="border-left: 15px solid #fff;font-size: 45px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 75px;">Tax Invoice</div> 
                                    </div>  
                                        <div class="col-6">
                                            <div style="margin-left: 87%;border-left: 15px solid #fff;font-size: 45px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 75px;">
                                                <div id="qrcode"></div>
                                            <input type="hidden" value="Order Id : <?php echo $bill_detail->order_id; ?>" name="qrvalue" />
                                            </div>
                                    </div>  
                                    </div>
                                    <h3>Sold By : Shangar Collection Private Limited </h3>
                                    <b>C.B.Patel Computer College, Bharthana, Vesu,395017 Surat.</b><p style="text-align:right;" > Invoice Number <?php echo $bill_detail->bill_id; ?></p><br/>

                                    <table width="100%" style="border-top: 1px solid black ;">
                                        <tr>
                                            <td widdth="50%" style="padding:20px;">
                                                <strong>Order Id :<?php echo $bill_detail->order_id; ?></strong> <br>
                                                <strong>Order Date :</strong> <?php echo date('d-m-Y', strtotime($bill_detail->bill_date)); ?><br>
                                                <strong>Invoice Date:</strong> <?php echo date('d-m-Y', strtotime($bill_detail->bill_date)); ?><br>
                                                <strong>PAN:</strong> AAKCS9251N<br>
                                                <strong>GST No:</strong> RRRHSCS92251N<br>
                                                <?php
                                                if ($bill_detail->pay_type == 'online') {
                                                    ?>
                                                    <strong>Payment MOde:</strong> Online Payment<br>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <strong>Payment MOde:</strong> Cash On delivery<br>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td style="padding:20px;">
                                                <?php
                                                $user_info = $this->md->my_select('tbl_register', '*', array('register_id' => $bill_detail->register_id))[0];
                                                $ship_info = $this->md->my_select('tbl_shipment', '*', array('shipment_id' => $bill_detail->shipment_id))[0];
                                                ?>
                                                <strong>Bill To</strong>
                                                <P><?php echo $user_info->name; ?></P>
                                                <p><?php echo $ship_info->address; ?></p>
                                                <strong>Phone : </strong> <?php echo $user_info->mobile; ?>
                                            </td>
                                            <td style="padding:20px;">
                                                <strong>Ship To</strong>
                                                <p><?php echo $ship_info->name; ?></p>
                                                <p><?php echo $ship_info->address; ?></p>
                                                <strong>Phone : </strong> <?php echo $user_info->mobile; ?>
                                            </td>
                                        </tr>

                                    </table><br>
                                    <table width="100%" style="border-top: 2px solid black ;border-bottom: 2px solid black;"  >
                                        <tr class="text-center">
                                            <td width="10%" class="column-header"><strong>No</strong></td>
                                            <td width="10%" class="column-header"><strong>Product</strong></td>
                                            <td width="10%" class="column-header"><strong>Gross price</strong></td>
                                            <td width="10%" class="column-header"><strong>Discount</strong></td>
                                            <td width="10%" class="column-header"><strong>Net Price</strong></td>
                                            <td width="10%" class="column-header"><strong>Qty</strong></td>
                                            <td width="10%" class="column-header"><strong>Total</strong></td>

                                        </tr>
                                        <?php
                                        $c = 0;
                                        $w['bill_id'] = $bill_detail->bill_id;
                                        $trans_detail = $this->md->my_select('tbl_transaction', '*', $w);

                                        foreach ($trans_detail as $trans) {
                                            $c++;
                                            $name = $this->md->my_select('tbl_product', '*', array('product_id' => $trans->product_id))[0]->name;
                                            ?>
                                            <tr style="border-top: 1px solid black ;">
                                                <td class="text-center"><?php echo $c; ?></td>
                                                <td  style="padding:10px;">
                                                    <strong><?php echo $name; ?></strong><br>
                                                </td>
                                                <td class="text-center" style="padding:20px;">
                                                    <strong><?php echo $trans->gross_price; ?></strong>
                                                </td>
                                                <td class="text-center" style="padding:20px;">
                                                    <strong><?php echo $trans->discount; ?></strong>
                                                </td>
                                                <td class="text-center" style="padding:10px;">
                                                    <strong><?php echo $trans->net_price; ?></strong>
                                                </td>
                                                <td class="text-center" style="padding:10px;">
                                                    <strong><?php echo $trans->qty; ?></strong>
                                                </td>
                                                <td class="text-center" style="padding:10px;">
                                                    <strong><?php echo $trans->total_price; ?></strong>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr class="column-header" style="border-top: 1px solid black ;">
                                            <td style="padding-left:10px;">
                                                <strong></strong>
                                            </td>  
                                            <td style="padding-left:20px;">
                                                <h5></h5>
                                            </td>
                                            <td style="padding:20px;">
                                                <h5></h5>
                                            </td>
                                            <td style="padding:20px;">
                                                <h5></h5>
                                            </td>
                                            <td style="padding:10px;">
                                                <h5></h5>
                                            </td>
                                            <td style="padding:10px;text-align: right;border-bottom: 1px solid black ;">
                                                <h5>Sub Total</h5>
                                                <h6>+Shipping charge</h6>
                                                <?php
                                                if ($bill_detail->promocode_id > 0) {
                                                    $promocode = $this->md->my_select('tbl_promocode', '*', array('promocode_id' => $bill_detail->promocode_id))[0];
                                                    ?>
                                                    <h6>- Promocode(<?php echo $promocode->code; ?>)</h6>
                                                    
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td widdth="50%" style="padding:10px;border-bottom: 1px solid black ;">
                                                <h5>Rs. <?php echo $bill_detail->amount; ?>/-</h5>
                                                <h6>Rs. 100/-</h6>
                                                <?php
                                                $amount = 0;
                                                if ($bill_detail->promocode_id > 0) {
                                                    $promocode = $this->md->my_select('tbl_promocode', '*', array('promocode_id' => $bill_detail->promocode_id))[0];
                                                    $amount = $promocode->amount;
                                                    ?>
                                                    <h6>Rs.<?php echo $amount; ?>/-</h6>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="padding-left:100px;text-align: right;">
                                                <h5><strong>Grand total: </strong></h5>
                                            </td> 
                                            
                                            <td  style="text-align:left;">
                                                <?php
                                                $gtotal = ( $bill_detail->amount + 100 ) - $amount;
                                                ?>
                                                <h5>&nbsp;<?php echo $gtotal; ?>/-</h5>
                                            </td>
                                        </tr>
                                    </table><br>
                                    <p style="text-align:right;margin-top: 24px;"> Shangar Collection Private Limited</p><br/><br/>
                                    <p style="margin-top: 20px;text-align: right;">Authorized Signatory</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
        <!-- End User profile section -->

        <style>

/*            body {
                font-family: Helvetica, sans-serif;
                font-size:13px;
            }
            .container{
                max-width: 680px;
                margin:0 auto;
                border: 2px solid black;
            }*/
            .logotype{
                background:#000;
                color:#fff;
                width:75px;
                height:75px;
                line-height: 75px;
                text-align: center;
                font-size:11px;
            }
/*            .column-title{
                background:#eee;
                text-transform:uppercase;
                padding:15px 5px 15px 15px;
                font-size:11px
            }
            .column-detail{
                border-top:1px solid #eee;
                border-bottom:1px solid #eee;
            }
            .column-header{
                text-transform:uppercase;
                padding:15px;
                font-size:11px;
                border-bottom: 1px solid black;
                border-top: 1px solid black;
            }
            .row{
                padding:7px 14px;
                border-left:1px solid #eee;
                border-right:1px solid #eee;
                border-bottom:1px solid #eee;
            }
            .alert{
                background: #ffd9e8;
                padding:20px;
                margin:20px 0;
                line-height:22px;
                color:#333
            }
            .socialmedia{
                background:#eee;
                padding:20px;
                display:inline-block
            }
            .tr.td{
                border: 1px solid blue
            }*/
        </style>
        
        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>

        <script>
        function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
        </script>
       
        
    </body>

</html>