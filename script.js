(function($) {
    $.QueryString = (function(a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
            var p=a[i].split('=');
            if (p.length != 2) continue;
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
    })(window.location.search.substr(1).split('&'))
})(jQuery);

/**
 * Save the current file to the database
 */
saveFile = function() {
	var data = editor.getSession().getValue();
	if($.QueryString["filename"] != "undefined") { var savefilename = "savedata.php?filename=" + $.QueryString["filename"]; }
	else { var savefilename = "savedata.php"; }
	$.post(savefilename,
		{data: data },
		function() {
			$("#editor").toggle("pulsate", { times: 1 }, 10);
			$("#editor").toggle("pulsate", { times: 1 }, 10);
		}
	);
};

/**
 * Set delay for save functionality
 */
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

/**
 * Document is ready
 */
$(document).ready(function() {

	// Save file on keyup
	$('#editor').keyup(function() {
		delay(function(){
			saveFile();
		}, 3000 );
	});

	// Show the form to create a new file when 'Add a new file' is chosen
	// Otherwise, show the file chosen
	$('#filename').change(function() {
		if($(this).prop('value') == 'addnewfile') {
			console.log('addnewfile selected', true);
			$('#newfileform').css('display', 'block');
		} else {
			this.form.submit();
		}
	});

	$(".filelisting").mouseover(function() {
		$(this).find('.delete').css('display', 'block');
	});
	$(".filelisting").mouseout(function() {
		$(this).find('.delete').css('display', 'none');
	});

	$('.delete').on('click', function() {
		var $button = $(this);
		var del_id = $button.parent().prop('id');
		$.post("deletefile.php",
			{ data: del_id },
			function() {
				$button.parent().remove();
			}
		);
		return false;
	});

});