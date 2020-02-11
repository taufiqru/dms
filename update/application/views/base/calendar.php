

<link rel="stylesheet" href="<?=base_url();?>theme/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="<?=base_url();?>theme/plugins/fullcalendar/fullcalendar.print.css" media="print">

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url();?>theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>theme/dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url();?>theme/plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //json get event data

    function fetchEvent(){
      var json=null;
      $.ajax({
        'async':false,
        'global':false,
        'url': "<?=base_url();?>index.php/API/allevent",
        'dataType':"json",
        'success':function(data){
          json=data;
        }
      });
      return json;
    }

    function refreshCalendar(){
      $('#calendar').fullCalendar( 'removeEvents');
      var refreshEvent=fetchEvent();
      $('#calendar').fullCalendar( 'addEventSource', refreshEvent);
      $('#calendar').fullCalendar( 'rerenderEvents' );
    }

    var listOfEvent=fetchEvent();
    var selectedEvent;
 
    //console.log(listOfEvent);
        /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    
    

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: listOfEvent,
      editable: true,
      eventResize:function(event, delta, revertFunc) {
        var date2=new Date(event.end.format());
        var date1=new Date(event.start.format());      
        var timediff=Math.abs(date2.getTime()- date1.getTime());
        var diffdays=Math.ceil(timediff/(1000*3600*24));
        console.log(diffdays);
        $url="<?=base_url();?>index.php/API/resizeday";
        $.get($url,{'id':event.id,'day':diffdays})
          .done(function(d){            
              console.log(d.status);           
          });
        console.log('id : '+event.id+'days :'+diffdays);
    },
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');   

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

        $.ajax({
         type: "POST",
         url: "<?=base_url()?>index.php/API/addevent", 
         data: {
              nama:copiedEventObject.title,
              tanggal:date.format("YYYY-MM-DD"),
              warna:copiedEventObject.backgroundColor
            },
         dataType: "text",  
         cache:false,
         success: 
              function(data){
               $('#calendar').fullCalendar( 'removeEvents');
               var refreshEvent=fetchEvent();
               $('#calendar').fullCalendar( 'addEventSource', refreshEvent);
              $('#calendar').fullCalendar( 'rerenderEvents' );
              }
          });// you have missed this bracket
 
      },
      eventClick: function(calEvent, jsEvent, view) {
        $.ajax({
         type: "POST",
         url: "<?=base_url()?>index.php/API/detailevent", 
         data: {id:calEvent.id},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                var json=JSON.parse(data);
                //console.log();  //as a debugging message.
                $(".modal-judul").text(json[0].nama);
                $(".modal-pelaksanaan").html("<b>"+json[0].pelaksanaan+" </b>");
                $(".modal-tempat").text(json[0].tempat);
                $(".modal-peserta").text(json[0].materi );
                selectedEvent=calEvent.id;
                <?php 
                $level=$this->session->userdata('level');
                if($level!='Admin'){?>
                    $(".modal-footer").html('<a type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</a>'+
                     '<a href="<?=base_url();?>index.php/event/event_table/read/'+calEvent.id+'"type="button" class="btn btn-outline">Lihat Detail</a>');
                  <?php }else{ ?>
                    $(".modal-footer").html('<a type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</a>'+
                      '<a href="#" type="button" id="btn-delete" class="btn btn-outline">Hapus</a>'+
                 '<a href="<?=base_url();?>index.php/event/event_table/edit/'+calEvent.id+'" type="button" class="btn btn-outline">Isi Info</a>'+
                 
                 '<a href="<?=base_url();?>index.php/event/event_table/read/'+calEvent.id+'"type="button" class="btn btn-outline">Info Rapat</a>'+
                 '<a href="<?=base_url();?>index.php/event/event_note/edit/'+calEvent.id+'"type="button" class="btn btn-outline">Isi Notulen</a>'+
                 '<a href="<?=base_url();?>index.php/event/event_note/read/'+calEvent.id+'"type="button" class="btn btn-outline">Hasil Rapat</a>'
                 );
                  <?php } ?>
              }
          });
       $('.modal').modal('show');
      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });

    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }
      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);
      //Add draggable funtionality
      ini_events(event);
      //Remove event from text input
      $("#new-event").val("");
    });

    $("body").on('click','a#btn-delete',function(){
      $.ajax({
        'async':false,
        'global':false,
        'url': "<?=base_url();?>index.php/event/event_table/delete/"+selectedEvent,
        'dataType':"json",
        'success':function(data){
          json=data;
          console.log('data dihapus');
        }
      });
      refreshCalendar();
      $('.modal').modal('hide');      
    });    
  });  
</script>