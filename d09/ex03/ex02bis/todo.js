var cookies = [];
var ft_list;

$(document).ready(function(){
	$("#new").click(newTodoList)
	$("#ft_list div").click(removeList);
	ft_list = $('#ft_list');
	var cookie = document.cookie.split(';');
	console.log(cookie);
	if (cookie){
		cookies = cookie[1].split(',');
		cookies.forEach(function (element){
			addNewToDo(element);
		});
	}
});

$(window).on("beforeunload", function(){
	var todo = ft_list.children();
	var newCookies = [];
	for (var i = 0; i < todo.length; i++)
		newCookies.unshift(todo[i].innerHTML);
	document.cookie = newCookies;
});

function newTodoList(){
	var newToDo = prompt("Fill in a new TO DO", "");
	if (newToDo !== "")
		addNewToDo(newToDo);
}

function addNewToDo( list ){
	ft_list.prepend($('<div>' + list + '</div>').click(removeList));
}

function removeList(){
	if (confirm('Would you like to remove list?'))
	{
		this.remove();
	}
}