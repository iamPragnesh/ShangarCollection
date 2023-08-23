<!DOCTYPE html>
<html>

    <?php
    //require './headerlink.php';
    $this->load->view('admin/headerlink');
    ?>

    <body class="menu-position-side menu-side-left full-screen with-content-panel">
        <div class="all-wrapper with-side-panel solid-bg-all">
            <div class="layout-w">
                <?php
                //require './menu.php';
                $this->load->view('admin/menu');
                ?>
                <div class="content-w">

                    <?php
                    //require './topbar.php';
                    $this->load->view('admin/topbar');
                    ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Home</a></li>
                        <li class="breadcrumb-item"><span>Product</span></li>
                        <li class="breadcrumb-item"><span>Product Reviews</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <div class="element-actions">
                                            <form class="form-inline justify-content-sm-end">
                                            </form>
                                        </div>
                                        <h4 class="element-header">Product Reviews</h4>
                                        <div class="element-box">
                                            <div class="row"> 
                                            <div class="col-6">
                                            <h5 class="form-header">View All Review</h5>
                                        </div>
                                        <div class="col-6">
                                            <p class="form-header" align="right">
                                                <button onclick="delete_link('review/<?php echo base64_encode(base64_encode(0)); ?>')" class="btn btn-danger" data-target="#exampleModal1" data-toggle="modal">Delete All Record</button>
                                            </p>
                                        </div>
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>User</th>
                                                            <th>Product</th>
                                                            <th>Review</th>
                                                            <th>Rate</th>
                                                            <th>Status</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $c=0;
                                                        foreach ($allp as $data)
                                                        {
                                                            $c++;
                                                            $productinfo = $this->md->my_select('tbl_product','*',array('product_id'=>$data->product_id))[0];
                                                            $imageinfo = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                                            $user = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                                                            
                                                            $allpath = explode(",", $imageinfo->path);
                                                            
                                                            
                                                            ?>
                                                            <tr class="text-center">
                                                                <td><?php echo $c; ?></td>
                                                                <td class="avatar-w">
                                                                    <a style="cursor: pointer" target="_new" data-toggle="tooltip" data-placement="bottom" title="<?php echo $user->name; ?>" href="<?php echo base_url().$user->profile_pic; ?>">
                                                                        <img  src="<?php echo base_url().$user->profile_pic; ?>" alt="" width="90" >
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="<?php echo $productinfo->name; ?>" target="_new" href="<?php echo base_url().$allpath[0]; ?>">
                                                                        <img src="<?php echo base_url().$allpath[0]; ?>" alt="Workplace" usemap="#workmap" width="70">
                                                                    </a>
                                                                </td>
                                                                <td><?php echo $data->message; ?></td>
                                                                <td style="width: 10%;">
                                                                    <a style="cursor: pointer">
                                                                        <?php
                                                                            $rate = $data->rating;
                                                                            $blank = 5 - $rate;

                                                                            for( $i=1 ; $i<=$rate ; $i++ )
                                                                            {
                                                                        ?>
                                                                        <span class="pre-icon os-icon os-icon-star-full"></span>
                                                                        <?php 
                                                                        }
                                                                        //blank star
                                                                       for($i=1; $i<=$blank; $i++)
                                                                        {
                                                                         ?>
                                                                        <span class="pre-icon os-icon os-icon-star"></span>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                        
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        if ($data->status == 1) {
                                                                            ?>
                                                                            <a>
                                                                                <i class="pre-post os-icon os-icon-toggle-right"  onclick="change_status('review',<?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>"  style="cursor:pointer;color:#5156be;" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"></i></a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a>
                                                                                <i class="pre-post os-icon os-icon-toggle-left"  onclick="change_status('review',<?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>"  style="cursor:pointer" style="cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Deactive"></i></a>

                                                                            <?php
                                                                        }
                                                                        ?>
                                                                </td>
                                                                <td>
                                                                    <a onclick="delete_link('review/<?php echo base64_encode(base64_encode($data->review_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
                                                                        <i class="pre-icon os-icon os-icon-trash text-danger" data-target="#exampleModal1" data-toggle="modal" type="button"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="floated-colors-btn second-floated-btn">
                        <div class="os-toggler-w">
                            <div class="os-toggler-i">
                                <div class="os-toggler-pill">
                                </div>
                            </div>
                        </div><span>Dark </span><span>Colors</span></div>
                </div>
            </div>
            <div class="display-type"></div>
        </div>
        <?php
        //require './footerscript.php';
        $this->load->view('admin/footerscript');
        ?>


    </div>   
</body>
</html>