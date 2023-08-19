<!DOCTYPE html>
<html>

    <?php
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
                        <li class="breadcrumb-item"><span>Add New Product</span></li>
                    </ul>
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h4 class="element-header">Add New Product</h4>
                                <?php
                                if ($this->session->userdata('product_form') == 1) {
                                    ?>
                                    <form action="" method="post" novalidate="" name="form1" class="myform" required="" >
                                        <div class="element-box">
                                            <div class="">
                                                <h5 class="form-header">Add Product Details</h5>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for=""> Main Category</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control <?php
                                                            if (form_error('main')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" name="main" required="" onchange="set_combo('subcategory', this.value);" >
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                foreach ($main as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('main', $data->category_id)) {
                                                                        echo set_select('main', $data->category_id);
                                                                    } else {
                                                                        if (isset($productdetail) && $productdetail->main_id == $data->category_id) {
                                                                            echo "selected";
                                                                        }
                                                                    }
                                                                    ?>><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                            </select>
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('main');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for=""> Sub Category</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control <?php
                                                            if (form_error('sub')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" id="subcategory" name="sub" required="" onchange="set_combo('petacategory', this.value);">
                                                                <option value="" >Select Category</option>
                                                                <?php
                                                                if ($this->input->post('main')) {
                                                                    $wh['parent_id'] = $this->input->post('main');
                                                                    $sub = $this->md->my_select('tbl_category', '*', $wh);

                                                                    foreach ($sub as $data) {
                                                                        ?>
                                                                        <option value="<?php echo $data->category_id; ?>" <?php
                                                                        if (!isset($success) && set_select('sub', $data->category_id)) {
                                                                            echo set_select('sub', $data->category_id);
                                                                        }
                                                                        ?>><?php echo $data->name; ?></option>
                                                                                <?php
                                                                            }
                                                                        } else if (isset($productdetail)) {
                                                                            $wh['parent_id'] = $productdetail->main_id;
                                                                            $sub = $this->md->my_select('tbl_category', '*', $wh);

                                                                            foreach ($sub as $data) {
                                                                                ?>
                                                                        <option value="<?php echo $data->category_id; ?>" <?php
                                                                        if (!isset($success) && set_select('sub', $data->category_id)) {
                                                                            echo set_select('sub', $data->category_id);
                                                                        } else {
                                                                            if ($productdetail->sub_id == $data->category_id) {
                                                                                echo "selected";
                                                                            }
                                                                        }
                                                                        ?>><?php echo $data->name; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('sub');
                                                        ?>
                                                    </p>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for=""> Peta Category</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control <?php
                                                            if (form_error('peta')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" name="peta" id="petacategory" required="">
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                if ($this->input->post('sub')) {
                                                                    $wh['parent_id'] = $this->input->post('sub');
                                                                    $peta = $this->md->my_select('tbl_category', '*', $wh);

                                                                    foreach ($peta as $data) {
                                                                        ?>
                                                                        <option value="<?php echo $data->category_id; ?>" <?php
                                                                        if (!isset($success) && set_select('peta', $data->category_id)) {
                                                                            echo set_select('peta', $data->category_id);
                                                                        }
                                                                        ?>><?php echo $data->name; ?></option>
                                                                                <?php
                                                                            }
                                                                        } else if (isset($productdetail)) {
                                                                            $wh['parent_id'] = $productdetail->sub_id;
                                                                            $peta = $this->md->my_select('tbl_category', '*', $wh);

                                                                            foreach ($peta as $data) {
                                                                                ?>
                                                                        <option value="<?php echo $data->category_id; ?>" <?php
                                                                        if (!isset($success) && set_select('peta', $data->category_id)) {
                                                                            echo set_select('peta', $data->category_id);
                                                                        } else {
                                                                            if ($productdetail->peta_id == $data->category_id) {
                                                                                echo "selected";
                                                                            }
                                                                        }
                                                                        ?>><?php echo $data->name; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('peta');
                                                        ?>
                                                    </p>
                                                    <div class="form-group ">
                                                        <label class="col-form-label col-sm-4" for=""> Product Description</label>
                                                        <textarea name="description" id="editor1"><?php
                                                            if (!isset($success) && set_value('description')) {
                                                                echo set_value('description');
                                                            } else if (isset($productdetail)) {
                                                                echo $productdetail->description;
                                                            }
                                                            ?></textarea>
                                                    </div>
                                                    <p class="err-msg">
                                                    <?php
                                                    echo form_error('description');
                                                    ?>
                                                </p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for=""> Product Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control <?php
                                                            if (form_error('name')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" name="name" required="" value="<?php
                                                                   if (!isset($success) && set_value('name')) {
                                                                       echo set_value('name');
                                                                   } else if (isset($productdetail)) {
                                                                       echo $productdetail->name;
                                                                   }
                                                                   ?>" placeholder="Enter Product name" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                        <?php
                                                        echo form_error('name');
                                                        ?>
                                                    </p>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for=""> Product Code</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control <?php
                                                            if (form_error('code')) {
                                                                echo "error-border";
                                                            }
                                                            ?>"name="code" required="" value="<?php
                                                                   if (!isset($success) && set_value('code')) {
                                                                       echo set_value('code');
                                                                   } else if (isset($productdetail)) {
                                                                       echo $productdetail->code;
                                                                   }
                                                                   ?>" placeholder="Enter Product code" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                        <?php
                                                        echo form_error('code');
                                                        ?>
                                                    </p>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for=""> Product Price</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control <?php
                                                            if (form_error('price')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" name="price" required="" value="<?php
                                                                   if (!isset($success) && set_value('price')) {
                                                                       echo set_value('price');
                                                                   } else if (isset($productdetail)) {
                                                                       echo $productdetail->price;
                                                                   }
                                                                   ?>" pattern="^[0-9]+$" placeholder="Enter Product price" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                        <?php
                                                        echo form_error('price');
                                                        ?>
                                                    </p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-form-label col-sm-4" for=""> Product Specification</label>
                                                        <textarea name="specification" id="editor2"><?php
                                                            if (!isset($success) && set_value('specification')) {
                                                                echo set_value('specification');
                                                            } else if (isset($productdetail)) {
                                                                echo $productdetail->specification;
                                                            }
                                                            ?></textarea>
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('specification');
                                                        ?>
                                                    </p>
                                                </div>
                                                &nbsp;
                                                <p class="form-header">
                                                    <button type="submit" name="next" value="yes" class="btn btn-primary">Next></button>
                                                    <button type="reset" class="btn btn-default">Clear</button>
                                                </p>
                                            </div>

                                        </div>
                                    </form>
                                    <?php
                                } else if ($this->session->userdata('product_form') == 2) {
                                    ?>
                                    <div class="element-box">
                                        <div class="">
                                            <h5 class="form-header">Add New Product Image</h5>
                                        </div>
                                        <form method="post" action="" novalidate="" name="form2" class="myform" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for="">Product Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" value="<?php echo $productdetail->name; ?>" disabled="" placeholder="Enter Sub Category" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" >
                                                        <label class="col-form-label col-sm-4" for=""> Select Color</label>
                                                        <div class="col-sm-10"  >
                                                            <select name="color" class="form-control <?php
                                                            if (form_error('color')) {
                                                                echo "error-border";
                                                            }
                                                            ?>">
                                                                <option  value="">Select Color</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Red')) {
                                                                    echo set_select('color', 'Red');
                                                                }
                                                                ?>>Red</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Blue')) {
                                                                    echo set_select('color', 'Blue');
                                                                }
                                                                ?>>Blue</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Pink')) {
                                                                    echo set_select('color', 'Pink');
                                                                }
                                                                ?>>Pink</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Green')) {
                                                                    echo set_select('color', 'Green');
                                                                }
                                                                ?>>Green</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Gray')) {
                                                                    echo set_select('color', 'Gray');
                                                                }
                                                                ?>>Gray</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Yellow')) {
                                                                    echo set_select('color', 'Yellow');
                                                                }
                                                                ?>>Yellow</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Brown')) {
                                                                    echo set_select('color', 'Brown');
                                                                }
                                                                ?>>Brown</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Light Blue')) {
                                                                    echo set_select('color', 'Light Blue');
                                                                }
                                                                ?>>Light Blue</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Black')) {
                                                                    echo set_select('color', 'Black');
                                                                }
                                                                ?>>Black</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Purple')) {
                                                                    echo set_select('color', 'Purple');
                                                                }
                                                                ?>>Purple</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'White')) {
                                                                    echo set_select('color', 'White');
                                                                }
                                                                ?>>White</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Navy Blue')) {
                                                                    echo set_select('color', 'Navy Blue');
                                                                }
                                                                ?>>Navy Blue</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Maroon')) {
                                                                    echo set_select('color', 'Maroon');
                                                                }
                                                                ?>>Maroon</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Orange')) {
                                                                    echo set_select('color', 'Orange');
                                                                }
                                                                ?>>Orange</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Burgundy')) {
                                                                    echo set_select('color', 'Burgundy');
                                                                }
                                                                ?>>Burgundy</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Champagne')) {
                                                                    echo set_select('color', 'Champagne');
                                                                }
                                                                ?>>Champagne</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Wine')) {
                                                                    echo set_select('color', 'Wine');
                                                                }
                                                                ?>>Wine</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Light Green')) {
                                                                    echo set_select('color', 'Light Green');
                                                                }
                                                                ?>>Light Green</option>
                                                                <option <?php
                                                                if (!isset($psuccess) && set_select('color', 'Peach')) {
                                                                    echo set_select('color', 'Peach');
                                                                }
                                                                ?>>Peach</option>
                                                            </select>
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('color');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-sm-4" for=""> Product Qty</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control <?php
                                                            if (form_error('qty')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" name="qty" required="" value="<?php
                                                                   if (!isset($psuccess) && set_value('qty')) {
                                                                       echo set_value('qty');
                                                                   }
                                                                   ?>" placeholder="Enter Product Qty" type="text">
                                                        </div>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('qty');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <h5 class="form-header">Product Image</h5>
                                                    </div>
                                                    <center>
                                                        <input type="file" name="photo[]" id="gallery-photo-add" style="display: none;" multiple=""/>
                                                        <label for="gallery-photo-add" style="width: 100%; cursor: pointer">
                                                            <div class="dropzone">
                                                                <div class="gallery">
                                                                    <h4>Drop files here or click to upload.</h4>
                                                                    <div class="text-muted">(This is just a demo dropzone. Selected files are not actually uploaded)</div>
                                                                </div>
                                                            </div>
                                                        </label>
                                                       
                                                    </center>  
                                                     <?php
                                                        if (isset($photo_error)) {
                                                            $c = 0;
                                                            ?>
                                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                 <?php
                                                                    foreach ($photo_error as $single)
                                                                    {
                                                                        $c++;
                                                                        echo "<br/> $c. $single";
                                                                    }
                                                                        
                                                                        ?>
                                                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                                    <span aria-hidden="true"> ×</span>
                                                                </button>
                                                            </div>
                                                        <?php }
                                                        ?>
                                                </div>
                                                <p class="form-header">
                                                    <button type="submit" name="back" value="yes" class="btn btn-primary">Back</button>
                                                    <button type="submit" name="add_img" value="yes" class="btn btn-primary">Add</button>
                                                    <button type="submit" name="finish" value="yes" class="btn btn-primary">Finish</button>
                                                    <button type="reset"  class="btn btn-default">Clear</button>
                                                    <button type="submit" name="cancel" value="yes" class="btn btn-default">Cancel Product</button>
                                                </p>
                                            </div>
                                            <?php
                                            if (isset($error)) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Oops!</strong>.<?php echo $error ?>.
                                                </div>
                                                <?php
                                            }
                                            if (isset($psuccess)) {
                                                ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Oops!</strong>.<?php echo $psuccess ?>.
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        $this->load->view('admin/dark_mode');
                        ?>
                    </div>
                </div>
                <div class="display-type"></div>
            </div>
            <?php
            $this->load->view('admin/footerscript');
            ?>

            <script src="<?php echo base_url(); ?>admin_assets/ckeditor/ckeditor.js"></script>
            <script type="text/javascript">
                                                                CKEDITOR.replace('editor1');
            </script>
            <script type="text/javascript">
                CKEDITOR.replace('editor2');
            </script>

            <script type="text/javascript">
                $(function () {
                    // Multiple images preview in browser
                    var imagesPreview = function (input, placeToInsertImagePreview) {

                        $(".gallery").html("");
                        if (input.files) {
                            var filesAmount = input.files.length;

                            for (i = 0; i < filesAmount; i++) {
                                var reader = new FileReader();

                                reader.onload = function (event) {
                                    $($.parseHTML('<img width="150">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                }

                                reader.readAsDataURL(input.files[i]);
                            }
                        }

                    };

                    $('#gallery-photo-add').on('change', function () {
                        imagesPreview(this, 'div.gallery');
                    });
                });</script>

        </div>
    </div>
</body>

</html>