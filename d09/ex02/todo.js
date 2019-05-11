var cookies = [];
var ft_list;

window.onload = function() {
	document.querySelector("#new").addEventListener('click', newTodoList);
	ft_list = document.querySelector('#ft_list');
	var cookie = document.cookie.split(' ');
	if (cookie){
		cookies = cookie[1].split(',');
		cookies.forEach(function (element){
			addNewToDo(element);
		});
	}
};

window.onunload = function(){
	var todo = ft_list.children;
	var newCookies = [];
	for (var i = 0; i < todo.length; i++)
		newCookies.unshift(todo[i].innerHTML);
	document.cookie = newCookies;
};

function newTodoList(){
	var newToDo = prompt("Fill in a new TO DO", "");
	if (newToDo !== "")
		addNewToDo(newToDo);
}

function addNewToDo( list ){
	var newBlock = document.createElement("div");
	newBlock.innerHTML = list;
	newBlock.addEventListener('click', removeList);
	ft_list.insertBefore(newBlock, ft_list.firstChild);
}

function removeList(){
	if (confirm('Would you like to remove list?'))
	{
		this.parentElement.removeChild(this);
	}
}