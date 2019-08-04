var copyButton = $("#copyButton");
var copyField = $("#copyField");

function generatePassword() {
  var password = "";
  var symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  for (var i = 0; i < 8; i++) {
    password += symbols.charAt(Math.floor(Math.random() * symbols.length));
  }
  $("#copyField").val(password);
}
$("#generateButton").click(function() {
  generatePassword();
  $("#testField").val("");
});

function enableBtn(){
	var cap = document.getElementById('captcha').innerHTML;
	if(password==cap)
		document.getElementById('butt').disabled = false;
}
(function($){
	$(function(){
		$('.dropdown-button').dropdown({
			inDuration: 300,
			outDuration: 225,
			constrainWidth: false,
			hover: true,
			belowOrigin: true,
			stopPropogation: true
		}
	);
});
})(jQuery); 