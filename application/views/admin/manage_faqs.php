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
                        <li class="breadcrumb-item"><span>Pages</span></li>
                        <li class="breadcrumb-item"><span>FAQ's</span></li>
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
                                        <h4 class="element-header">FAQ's</h4>
                                        <form action="" name="faqs" method="post" class="myform" novalidate="">
                                            <?php
                                        if (isset($editfaqs)) {
                                            ?>
                                            <div class="element-box">
                                                <h5 class="form-header">Edit FAQ's</h5>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-4" for="">Question</label>
                                                    <div class="col-sm-12">
                                                        <input name="question" required="" class="form-control <?php
                                                        if (form_error('question')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value('question')) {
                                                                   echo set_value('question');
                                                               } else
                                                               {
                                                                   echo $editfaqs[0]->question;
                                                               }
                                                               ?>" placeholder="Question" type="text">
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('question');
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-4" for="">Answer</label>
                                                    <div class="col-sm-12">
                                                        <input name="answer" required="" class="form-control <?php
                                                        if (form_error('answer')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value('answer')) {
                                                                   echo set_value('answer');
                                                               } else
                                                               {
                                                                   echo $editfaqs[0]->answer;
                                                               }
                                                               ?>" placeholder="Answer" type="text">
                                                    </div>
                                                </div>  
                                                <p class="form-header">
                                                    <button type="submit" name="edit" value="yes" class="btn btn-primary">Edit</button>
                                                    <a href="<?php echo base_url(); ?>manage-faqs" type="reset" class="btn btn-default">Go Back</a>
                                                </p>
                                                <br/>
                                            <?php
                                            if (isset($success)) {
                                                ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Ok! </strong>.Insert Success.
                                                </div>
                                                <?php
                                            }
                                            if (isset($err)) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Oops!</strong>.Something Wrong.
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="element-box">
                                                <h5 class="form-header">Write All FAQ's</h5>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-4" for="">Question</label>
                                                    <div class="col-sm-12">
                                                        <input name="question" required="" class="form-control <?php
                                                        if (form_error('question')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value('question')) {
                                                                   echo set_value('question');
                                                               } 
                                                               ?>" placeholder="Question" type="text">
                                                    </div>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('question');
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-4" for="">Answer</label>
                                                    <div class="col-sm-12">
                                                        <input name="answer" required="" class="form-control <?php
                                                        if (form_error('answer')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" value="<?php
                                                               if (!isset($success) && set_value('answer')) {
                                                                   echo set_value('answer');
                                                               } 
                                                               ?>" placeholder="Answer" type="text">
                                                    </div>
                                                </div>  
                                                <p class="form-header">
                                                    <button type="submit" name="add" value="yes" class="btn btn-primary">Add</button>
                                                    <button type="reset" class="btn btn-default">Clear</button>
                                                </p>
                                                <br/>
                                            <?php
                                            if (isset($success)) {
                                                ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Ok! </strong>.Insert Success.
                                                </div>
                                                <?php
                                            }
                                            if (isset($err)) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                                        <span aria-hidden="true"> ×</span>
                                                    </button><strong>Oops!</strong>.Something Wrong.
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        </form>
                                    </div>
                                    <div class="element-box">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="form-header">View All FAQ'S</h5>
                                            </div>
                                            <div class="col-6">
                                                <p class="form-header" align="right">
                                                    <button class="btn btn-danger" data-target="#exampleModal3" data-toggle="modal">Delete All Record</button>
                                                </p>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No.</th>
                                                            <th>Question-Answer</th>
                                                            <th>change</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $c = 0;
                                                            foreach ($faqs as $data) {
                                                                $c++;
                                                                ?>
                                                                <tr class="text-center">
                                                                    <td><?php echo $c; ?></td>
                                                                    <td align="left"><b><b>Q: </b><?php echo $data->question; ?></b><br/><b>A: </b><?php echo $data->answer; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url() ?>manage-faqs/<?php echo base64_encode(base64_encode($data->faqs_id)); ?>" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                                            <i class="pre-icon os-icon os-icon-pencil-2" type="button"></i></a>
                                                                    </td>
                                                                    <td>
                                                                        <a onclick="delete_link('faqs/<?php echo base64_encode(base64_encode($data->faqs_id)); ?>')" style="cursor: pointer"  data-toggle="tooltip" data-placement="bottom" title="Remove Data">
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