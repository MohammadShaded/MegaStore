<?php include('constant/connect.php');

$output= array();
$sql = "SELECT * FROM tbl_client";

$totalQuery = mysqli_query($connect,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
  0 => 'id',
  1 => 'name',
  2 => 'gender',
  3 => 'mob_no',
  4 => 'reffering',
  5 =>'address'
);

if(isset($_POST['search']['value']))
{
  $search_value = $_POST['search']['value'];
  $sql .= " WHERE name like '%".$search_value."%'";
  $sql .= " OR gender like '%".$search_value."%'";
  $sql .= " OR mob_no like '%".$search_value."%'";
  $sql .= " OR address like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
  $column_name = $_POST['order'][0]['column'];
  $order = $_POST['order'][0]['dir'];
  $sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
  $sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
  $start = $_POST['start'];
  $length = $_POST['length'];
  $sql .= " LIMIT  ".$start.", ".$length;
}

$query = mysqli_query($connect,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
  $sub_array = array();
  $sub_array[] = $row['id'];
  $sub_array[] = $row['username'];
  $sub_array[] = $row['email'];
  $sub_array[] = $row['mobile'];
  $sub_array[] = $row['city'];
  $sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
  $data[] = $sub_array;
}

$output = array(
  'draw'=> intval($_POST['draw']),
  'recordsTotal' =>$count_rows ,
  'recordsFiltered'=>   $total_all_rows,
  'data'=>$data,
);
echo  json_encode($output);
