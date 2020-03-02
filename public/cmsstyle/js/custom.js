$(document).ready(function(){

	// Show image name in the input once the file is uploaded
  	$("input:file").on("change", function(){ 
        if($(this).val() != ""){
            $(this).parent().children('span').text(this.value.replace(/C:\\fakepath\\/i, ''));
         }
 	 });

});

/**
 * Show dialog for confirmation
 *
 * @param string titledialog - Title of the dialog
 * @param string $msg - Message of the dialog
 * @param string linhref - Window location href
 * @param object element - The html object
 */
function confirmMsg(titledialog, $msg, linhref, inlineelement){

  var heightnum = 140;

  $("<div id='dialog-confirm' title='"+titledialog+"' >"+$msg+"</div>" ).dialog({
    resizable: false,
    height: heightnum,
    modal: true,
    buttons: {
        "OK": function() {
            if(linhref != '#')
              window.location.href = linhref;
            else
              $(this).dialog("close");
        },
        Cancel: function() {
        	$(this).dialog("close");
        }
    }
  });
}