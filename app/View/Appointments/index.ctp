<?php echo  $this->Html->css('appo'); ?>
<?php echo $this->Html->css('clockpicker/assets/css/bootstrap.min.css');?>
     


 <!--予定追加のメッセージ-->
    <?php 

     $today      = date('d');
     $now_days   = date('t');

      if($today <= 10){
        echo $this->Session->flash('two');  
      }elseif($today > 10 && $today <= 20){
        echo $this->Session->flash('three');  
      }elseif($today > 20 &&  $today <= $now_days){
        echo $this->Session->flash('one');   
      }
    ?>

<div id='calendar'></div>


<script type="text/javascript">

$(document).ready(function(){
  $('#calendar').fullCalendar({
    header: {
      // right: 'month agendaWeek agendaDay',
        right: 'month agendaWeek agendaDay prev,next'
    },
    titleFormat: {
      // today: 'D日',
      month: 'YYYY年M月',
      week: "YYYY年M月D日",
      day: 'YYYY年M月D日'
    },
    columnFormat:{
      month: 'ddd',
    },
    timeFormat: 'H:mm',
    dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
    dayNamesShort: ['日','月','火','水','木','金','土'],

    buttonText: {
     // whitebord: 'WBS',
    // today: '今',
      month: '月',
      week: '週',
      day: '日'
    },

    allDaySlot: false,
    //スロットの時間の書式
    axisFormat: 'H:mm',
    editable: false,
    events: <?php echo $jsonevents; ?>,

    dayClick: function(elem){
      y = elem._d.getFullYear();
      m = elem._d.getMonth()+1;
      d = elem._d.getDate();
      location.href="appointments/add?year=" + y + "&month=" + m + "&day=" + d;
    },
    
      eventClick: function(elem){
      user_id = elem.className[0].substr(5);
      location.href="users/view/" + user_id;
    }
  })
});
</script>



<div class="appointments index">
  <h2><?php echo __('今日の予定'); ?></h2>
  <h4><?php echo $strdate . __(' appointments'); ?></h4>


<table>
    <tr>
      <th>Name</th>
      <th>Time</th>
      <th>username</th>
    </tr>
  <tr>
  <?php foreach ($appointments as $item): ?>
      <td><?php echo $item['User']['name']; ?></td>
      <td><?php echo $item['Appointment']['start'] . "~" . $item['Appointment']['end']; ?></td>
      <td><?php echo $item['User']['username']; ?></td>
    </tr>
  <?php endforeach ?>
  </table>
  </div>

<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>
    <li><?php echo $this->Html->link(__('予定の追加'), array('action' => 'add')); ?></li>
    <li><?php echo $this->Html->link(__('マイページ'), array('controller' => 'users', 'action' => 'view/'.$user["id"])); ?> </li>
    <li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
    <li><?php echo $this->Html->link(__('WBS'), array('controller' => 'appointments', 'action' => 'whitebord')); ?> </li>
  </ul>
</div>
</div>

<script>
$(document).ready(function(){
$(".class<?php echo $user_id;?>").addClass("my-events");
});
$(document).ready(function(){
  $("button").click(function(){
  $(".class<?php echo $user_id;?>").addClass("my-events");
  });
});
</script>
