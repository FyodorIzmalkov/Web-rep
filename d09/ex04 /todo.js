$(document).ready(function(){
	var $ft_list = $('#ft_list');

	$.ajax({
		url: 'select.php',
		success: function(data){
			var array = JSON.parse(data);
			console.log(array);
			for (key in array){
				if (key && array[key])
					$ft_list.prepend('<div class="todo ' + key + '">' + array[key] + '</div>');
			}
		},
		error: function(){alert('Error reading database');},
	});

	$('#new').click(function(){
		var content = prompt("Type your TO-DO thing", "");
		content = content.trim();
		if (!content){
			alert("Your TODO thing is empty");
			return;
		}
		$.ajax({
			type: 'POST',
			url: 'insert.php',
			data: {
				id: 0,
				name: content,
			},
			success: function( data ){
				$ft_list.prepend('<div class="todo ' + data + '">' + content + '</div>');
			},
			error: function(){alert('Error on adding new TO-DO thing');},
		});
	});

	$(document).on('click', '.todo', function(){
		if (confirm('You want to delete this list?')){
			var $id = $(this).attr('class').replace('todo ', '');

			$.ajax({
				type: 'POST',
				url: 'delete.php',
				data: {
					id: $id,
				},
				success: function(data){
					console.log(data);
					$('.' + $id).remove();
				},
				error: function(){alert('Error on deleting list');},
			});
		}

	});
});