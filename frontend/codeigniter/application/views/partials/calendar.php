<script>
	let calendarEl = document.getElementById('full-calender');

	if (calendarEl !== undefined && calendarEl !== null){
		let events = []
		<?php if(isset($list)){ foreach ($list as $key => $value){ ?>

		events.push({
			title: '<?php echo $value->name ?>',
			start: '<?php echo date($value->date) ?>',
			id: '<?php echo $value->id ?>',
			time: '<?php echo $value->time ?>',
		})
		
		<?php		} }?>
		var calendar = new FullCalendar.Calendar(calendarEl, {
			plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay'
			},
			events: events,
			editable: true,
			droppable: true,
			
			eventDrop: function(info) {
				$.ajax({
					url : "<?php echo base_url('index.php/appointment-update')?>",
					type: "POST",
					dataType:"JSON",
					data : { "id" : info.event.id , "date" : info.event.start ,"time" : info.event.time },
					success: function(data) {
						Snackbar.show({
							text: data.message,
							pos: 'bottom-right'
						});
					}
				})
				console.log(info.event.title + " was dropped on " + info.event.start);
			},
			eventClick:  function(info) {
                    var id = info.event.id;
                    var url = "<?php echo base_url('index.php/AppointmentController/view/');?>"+id;
                    openModal('Appointment','small',url)
                  
                },
		});
		calendar.render();
	}
</script>
