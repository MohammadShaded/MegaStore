<?php include('./constant/layout/head.php');?>


<?php include('./constant/layout/header.php');?>

<?php //include('./constant/layout/sidebar.php');?>
<?php include('./constant/connect.php');
$sql = "SELECT * FROM tbl_client WHERE delete_status = 0";
$result = $connect->query($sql);
//echo $sql;exit;
if(isset($_post['search']['value'])){
  $searhvalue=$_post['search']['value'];
  $sql.="AND name like'%".$searhvalue."%'";
}
?>
       <div class="page-wrapper">

            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Client</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Clent</li>
                    </ol>
                </div>
            </div>




<div class="container-fluid">




                 <div class="card">
                            <div class="card-body">

                            <a href="add_client.php"><button class="btn btn-primary">Add Client</button></a>
                              <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">



                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th>#</th>
                                                <th>Client Name</th>
                                                <th>Gender</th>
                                                <th>Mobile NO</th>
                                                <th>Reffering</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                        <?php
foreach ($result as $row) {
    $no+=1;
    ?>
                                        <tr>
                                            <td><?php echo$no; ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['gender'] ?></td>
                                              <td><?php echo $row['mob_no'] ?></td>
                                            <td><?php echo $row['reffering'] ?></td>
                                            <td><?php echo $row['address'] ?></td>

                                            <td>

                                                <a href="editclient.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>



                                                <a href="php_action/removeclient.php?id=<?php echo $row['id']?>" ><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>


                                                </td>
                                        </tr>

                                    </tbody>
                                   <?php
}
?>
                               </table>
                                </div>
                            </div>
                        </div>

<!--  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>-->
<!--  <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>-->
<!--  <script type="text/javascript">-->
<!--    $(document).ready(function() {-->
<!--      $('#example').DataTable({-->
<!--        "fnCreatedRow": function(nRow, aData, iDataIndex) {-->
<!--          $(nRow).attr('id', aData[0]);-->
<!--        },-->
<!--        'serverSide': 'true',-->
<!--        'processing': 'true',-->
<!--        'paging': 'true',-->
<!--        'order': [],-->
<!--        'ajax': {-->
<!--          'url': 'fetch_data.php',-->
<!--          'type': 'post',-->
<!--        },-->
<!--        "aoColumnDefs": [{-->
<!--          "bSortable": false,-->
<!--          "aTargets": [5]-->
<!--        },-->
<!---->
<!--        ]-->
<!--      });-->
<!--    });-->

<!--  </script>-->



<?php include('./constant/layout/footer.php');?>


