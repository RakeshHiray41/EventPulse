<?php
    include 'partials/_dbconnect.php';

    $startdateTime = new DateTime($_POST['start_date_time']);
    $startdate = $startdateTime->format('Y-m-d');
    $starttime = $startdateTime->format('H:i:s');

    $enddateTime = new DateTime($_POST['end_date_time']);
    $enddate = $enddateTime->format('Y-m-d');
    $endtime = $enddateTime->format('H:i:s');

   
    
      
        if(isset($_POST['start_date_time'])&&isset($_POST['end_date_time'])&&isset($_POST['caffe']))
        {
            $sql = "SELECT * FROM caffe_booking  where caffe_id = (SELECT caffe_id FROM public.caffe_list WHERE caffe_name = '".$_POST['caffe']."') AND start_time <= '".$starttime."' AND end_time <= '".$endtime ."' AND booking_date='".$startdate."';";
            $result = pg_query($conn, $sql);
            if(pg_num_rows($result)>0)
            {
                echo '1';
                // header("location:viewCart.php?info=1");
            }
            else{
                echo '3';
                // header("location:viewCart.php?info=3");
            }
        }
        else{
            echo '2';
            // header("location:viewCart.php?info=2");
        }




?>