jQuery(function($) {
    $(document).ready(function(){
        $('#insert-cpt-alm-button').click(open_media_window);
    });

    $(document).on('click','.cptalm-generator-insert',function(){
    	output = $('#generator_box').text();
    	console.log(output);
    	wp.media.editor.insert(output);
    	$("#dialogForm").dialog("close");
    });

    function open_media_window() {
    	$("#dialogForm").dialog("open");
    }

    $("#dialogForm").dialog({
        modal: true,
        title : 'Shortcode Generator',
        autoOpen: false,
        width:600,
        show: {effect: "blind", duration: 800}
    }); 
});