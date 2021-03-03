$(document).ready(function () {
	// JS Array implementation, overlap mode
	$('#menu').multilevelpushmenu({
		menu: arrMenu,
		menuWidth: 229,
		// containersToPush: [$( '#display' )],

		// Just for fun also changing the look of the menu
		wrapperClass: 'mlpm_w',
		menuInactiveClass: 'mlpm_inactive',


		onItemClick: function () {
			var event = arguments[0],
				$menuLevelHolder = arguments[1],
				$item = arguments[2],
				options = arguments[3];

			var itemHref = $item.find('a:first').attr('href');
			document.getElementById('display').src = itemHref;
		},
		onCollapseMenuEnd: function (obj) {
			var diff = obj.menuWidth - obj.overlapWidth;
			var origin = $("#display").css("width");
			origin = parseInt(origin.replace("px", ""));
			$("#display").css("width", origin + diff + 'px');
		},
		onExpandMenuStart: function (obj) {
			var diff = obj.menuWidth - obj.overlapWidth;
			var origin = $("#display").css("width");
			origin = parseInt(origin.replace("px", ""));
			$("#display").css("width", origin - diff + 'px');
		}
	});
	$("#display").css("width", $(window).width() - $("#menu").width() - 5 + "px");
	$("#display").css("height", $("#menu").height() - 2 + "px");

	var textnode = document.createTextNode("退出");
	var a = document.createElement("a");
	a.appendChild(textnode);
	a.href = "logout.php";
	var li = document.createElement("li");
	li.style.textAlign = "center";
	li.appendChild(a);
	var ul = document.createElement("ul");
	ul.style.position = "absolute";
	ul.style.bottom = "0";
	ul.style.width = "inherit";
	ul.appendChild(li);

	document.getElementsByClassName("levelHolderClass")[0].appendChild(ul);

});