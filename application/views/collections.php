<?php
if($this->uri->segment(2) == 'main-collection' || $this->uri->segment(2) == 'sub-collection' || $this->uri->segment(2) == 'peta-collection')
{
  $id = base64_decode(base64_decode($this->uri->segment(3)));  
  $title = $this->md->my_select('tbl_category','*',array('category_id'=>$id))[0]->name;
}
else if($this->uri->segment(2) == 'todays-offer')
{
    $title = "Today's Offer";
}
else if($this->uri->segment(2) == 'search')
{
    $val = str_replace("-", " ", $this->uri->segment(3));
    $title = 'Search Result For'.$this->uri->segment(3).'"';
}
else
{
    $title = "All Products";
}
?>
<!DOCTYPE html>
<html lang="en">

    <title><?php echo $title; ?> - Shangar Collection</title>

    <?php
    $this->load->view('head');
    ?>

    <body onload="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');">
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
                                <h2 class="ec-breadcrumb-title">All Products</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                                    <li class="ec-breadcrumb-item active">All Products</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Ec Shop page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                        <!-- Shop Top Start -->
                        <div class="ec-pro-list-top d-flex">
                            <div class="col-md-6 ec-grid-list">
                                <div class="ec-gl-btn">
                                    <button class="btn btn-grid active"><img src="<?php echo base_url(); ?>assets/images/icons/grid.svg"
                                                                             class="svg_img gl_svg" alt="" /></button>
                                    <button class="btn btn-list"><img src="<?php echo base_url(); ?>assets/images/icons/list.svg"
                                                                      class="svg_img gl_svg" alt="" /></button>
                                </div>
                            </div>
                            <div class="col-md-6 ec-sort-select">
                                <span class="sort-by">Show Products</span>
                                <div class="ec-select-inner">
                                    <select onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>',this.value)" name="ec-select" id="ec-select">
                                        <option selected disabled>Show 12</option>
                                        <option value="18">Show 18</option>
                                        <option value="24">Show 24</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Top End -->

                        <!-- Shop content Start -->
                        <div id="product-data"></div>
                        <!--Shop content End -->
                        
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                        <form id="filter-data">
                            <div id="shop_sidebar">
                            <div class="ec-sidebar-heading">
                                <h1>Filter Products By</h1>
                            </div>
                            <div class="ec-sidebar-wrap">
                                <!-- Sidebar Category Block -->
                                <div class="ec-sidebar-block">
                                    <?php
                                    if( $this->uri->segment(2) == "")
                                    {
                                    ?>
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Main Category</h3>
                                    </div>
                                    <div class="ec-sb-block-content" style="height: 300px;overflow-y: scroll;">
                                        <ul>
                                            <?php
                                            $main = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));
                                            foreach($main as $main_data)
                                            {
                                            ?>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="" />
                                                    <a href="<?php echo base_url(); ?>collections/main-collection/<?php echo base64_encode(base64_encode($main_data->category_id)); ?>"><?php echo $main_data->name; ?></a><span></span>
                                                </div>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                    }
                                    else if( $this->uri->segment(2) == "main-collection")
                                    {
                                        $where['parent_id'] = base64_decode(base64_decode($this->uri->segment(3)));
                                    ?>
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Sub Category</h3>
                                    </div>
                                    <div class="ec-sb-block-content" style="height: 300px;overflow-y: scroll;">
                                        <ul>
                                            <?php
                                            $sub = $this->md->my_select('tbl_category','*',$where);
                                            foreach($sub as $sub_data)
                                            {
                                            ?>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="" />
                                                    <a href="<?php echo base_url(); ?>collections/sub-collection/<?php echo base64_encode(base64_encode($sub_data->category_id)); ?>"><?php echo $sub_data->name; ?></a><span></span>
                                                </div>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                    }
                                    else if( $this->uri->segment(2) == "sub-collection")
                                    {
                                        $wherep['parent_id'] = base64_decode(base64_decode($this->uri->segment(3)));
                                    ?>
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Peta Category</h3>
                                    </div>
                                    <div class="ec-sb-block-content" style="height: 300px;overflow-y: scroll;">
                                        <ul>
                                            <?php
                                            $peta = $this->md->my_select('tbl_category','*',$wherep);
                                            foreach($peta as $peta_data)
                                            {
                                            ?>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="" />
                                                    <a href="<?php echo base_url(); ?>collections/peta-collection/<?php echo base64_encode(base64_encode($peta_data->category_id)); ?>"><?php echo $peta_data->name; ?></a><span></span>
                                                </div>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- Sidebar Size Block -->
                                <div class="ec-sidebar-block">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Color</h3>
                                    </div>
                                    <div class="ec-sb-block-content" style="height: 300px;overflow-y: scroll;">
                                        <ul>
                                            <?php
                                            $color = $this->md->my_query("SELECT DISTINCT `color` FROM `tbl_product_image`");
                                            foreach($color as $name)
                                            {
                                            ?>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" name="color[]" value="<?php  echo $name->color; ?>" /><a href=""><?php echo $name->color; ?></a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar price item -->
                                <div class="ec-sidebar-block">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Price</h3>
                                    </div>
                                    <div class="ec-sb-block-content" style="height: 300px;overflow-y: scroll;">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="0" name="price[]" /><a href="">Less then 1000</a><span class="checked"></span>
                                                </div>   
                                            </li>
                                            <li>
                                               <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="1000" name="price[]" /><a href="">1000-2000</a><span class="checked"></span>
                                                </div> 
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="2000" name="price[]" /><a href="">2000-3000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="3000" name="price[]" /><a href="">3000-4000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="4000" name="price[]" /><a href="">4000-5000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="5000"  name="price[]" /><a href="">5000-6000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="6000" name="price[]" /><a href="">6000-7000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="7000" name="price[]" /><a href="">7000-8000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="8000" name="price[]"/><a href="">8000-9000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="9000" name="price[]" /><a href="">9000-10000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');"  /><a href="">More then 10000</a><span class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Sidebar Price Block -->
                                <div class="ec-sidebar-block">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Offer</h3>
                                    </div>
                                    <div class="ec-sb-block-content" style="height: 300px;overflow-y: scroll;">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="1" name="offer[]" /><a href="">In offer</a><span class="checked"></span>
                                                </div>   
                                            </li>
                                            <li>
                                               <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" onchange="product_data('<?php echo $this->uri->segment(2); ?>','<?php echo $this->uri->segment(3); ?>','12');" value="0" name="offer[]" /><a href="">Not In offer</a><span class="checked"></span>
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shop page -->

        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>

    </body>

</html>