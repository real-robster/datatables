<html>
<head>
  <title><?php echo $title; ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />


        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Templates/dataTables.bootstrap4.min.css" />
        <script src="<?php echo base_url(); ?>/Templates/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/Templates/dataTables.bootstrap4.min.js"></script>

  <style>
          body
          {
               margin:0;
               padding:0;
               background-color:#f1f1f1;
          }
          .box
          {
               width:900px;
               padding:20px;
               background-color:#fff;
               border:1px solid #ccc;
               border-radius:5px;
               margin-top:10px;
          }
     </style>
</head>
<body>
     <div class="container box">
          <h3 align="center"><?php echo $title; ?></h3><br />
          <div class="table-responsive">
               <br />
               <table id="devices_data" class="table table-bordered table-striped">
                    <thead>
                         <tr>
                              <th>Device ID</th>
                              <th>Status</th>
                              <th>Software</th>
                              <th>Edit</th>
                              <th>Delete</th>
                         </tr>
                    </thead>
               </table>
          </div>
     </div>
</body>
</html>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
     var dataTable = $('#devices_data').DataTable({
          "processing":true,
          "serverSide":true,
          "order":[],
          "ajax":{
               url:"<?php echo base_url() . 'crud/fetch_devices'; ?>",
               type:"POST"
          },
          "columnDefs":[
               {
                    "targets":[0, 3, 4],
                    "orderable":false,
               },
          ],
     });
});
</script>
