 $time_in_12_hour_format  = date("g:i a", strtotime($request->get('end_time')));
            //dd($time_in_12_hour_format);
            $start_time = strtotime($request->get('start_time'));
            $end_time = strtotime($request->get('end_time')); 

           
            $spend_times = $end_time - $start_time;
            $spend_time = date('h:i',$spend_times);