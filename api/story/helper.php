<?php 
class Helper {
   public static function dateTimestamp($timeStamp) {
      return date('H:i:s d/m/Y', $timeStamp);
   }

   public static function dateDiff($date)
   {
      $mydate= date("Y-m-d H:i:s");
      $theDiff="";
      //echo $mydate;//2014-06-06 21:35:55
      $datetime1 = date_create(date('Y-m-d H:i:s', $date));
      $datetime2 = date_create($mydate);
      $interval = date_diff($datetime1, $datetime2);
      //echo $interval->format('%s Seconds %i Minutes %h Hours %d days %m Months %y Year    Ago')."<br>";
      $min=$interval->format('%i');
      $sec=$interval->format('%s');
      $hour=$interval->format('%h');
      $mon=$interval->format('%m');
      $day=$interval->format('%d');
      $year=$interval->format('%y');
      if($interval->format('%i%h%d%m%y')=="00000")
      {
        //echo $interval->format('%i%h%d%m%y')."<br>";
        return $sec." giây trước";
    
      } 
    
    else if($interval->format('%h%d%m%y')=="0000"){
       return $min." phút trước";
       }
    
    
    else if($interval->format('%d%m%y')=="000"){
       return $hour." giờ trước";
       }
    
    
    else if($interval->format('%m%y')=="00"){
       return $day." ngày trước";
       }
    
    else if($interval->format('%y')=="0"){
       return date('d/m/Y', $date);
       }
    
    else{
       return date('d/m/Y', $date);
       }
    
    }

    public static function storyStatus($status){
       $arr = array(
          0 => 'Drop',
          1 => 'Đang tiến hành',
          2 => 'Hoàn thành'
       );
       if($status != ''){
         return $arr[$status];
       }
       return 'Đang cập nhật';
    }
    public static function storyViewFormat($num){
       return $num != ''? number_format($num,0,"",".") : 'Đang cập nhật';
    }
}

?>