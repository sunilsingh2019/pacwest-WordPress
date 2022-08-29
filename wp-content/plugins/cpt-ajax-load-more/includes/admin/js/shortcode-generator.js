var cpt_alm = {};
jQuery(document).ready(function($) {

	$('#cptalm_category, #cptalm_excl_category').select2();
  $('#cptalm_button_color').wpColorPicker(
    {
     change: function (event, ui) {
        var element = event.target;
        var color = ui.color.toString();
        jQuery('#cptalm_button_color').val(color);
        cpt_alm.shortcode_generate();
    },
    clear: function (event) {
      jQuery('#cptalm_button_color').val('');
      cpt_alm.shortcode_generate();
    }
  });

    $('.cpt-alm-copy-sc').click(function(){
      cpt_alm.copyshortcode('generator_box');
    });

    var foutput = '[cpt_ajax_load_more]';
    var generator_box = '#generator_box';
    //var cpt_alm = {};

    cpt_alm.init = function(){
    	$(generator_box).text(foutput);
    }

    cpt_alm.copyshortcode = function(containerid){

      var textarea = document.createElement('textarea');
      textarea.textContent = jQuery('#'+containerid).text();
      document.body.appendChild(textarea);
      var selection = document.getSelection();
      var range = document.createRange();
      range.selectNode(textarea);
      selection.removeAllRanges();
      selection.addRange(range);
      document.execCommand('copy');
      selection.removeAllRanges();
      document.body.removeChild(textarea);
      alert('Shortcode has been Copied!!');
      
    }
    cpt_alm.shortcode_generate = function(){
        
        foutput = '[cpt_ajax_load_more';

        // Unique ID.
        var unique_id = $('input#cptalm_id').val();
      	if(unique_id)
      	  foutput += ' id="'+unique_id+'"';

        // Grid.
        var grid = $('select#cptalm_grid').val();
        if(grid != '' && grid != '1')
          foutput += ' grid="'+grid+'"';

        // Grid.
        var scroll = $("input[name='cptalm_scroll']:checked").val();
        if(scroll != '' && scroll != 'false')
          foutput += ' scroll="'+scroll+'"';

        // Container Class.
        var wrapperclass = $('input#cptalm_wrapperclass').val();
        if(wrapperclass)
          foutput += ' container_class="'+wrapperclass+'"';

        // Item Class.
        var item_class = $('input#cptalm_itemclass').val();
        if(item_class)
          foutput += ' item_class="'+item_class+'"';

      	// Loop Tempate
      	var template = $('select#cptalm_template').val();
      	if(template != '' && template != 'default')
      	  foutput += ' template="'+template+'"';

        var default_css = $('select#cptalm_default_css').val();
        if(default_css == 'no')
          foutput += ' default_css="'+default_css+'"';

      	// Loading Style
      	var loading_style = $('select#cptalm_loading_style').val();
      	if(loading_style != '' && loading_style != 'normal')
      	  foutput += ' loading_style="'+loading_style+'"';

        // Button Text
        var button_text = $('input#cptalm_button_text').val();
        if(button_text)
          foutput += ' button_text="'+button_text+'"';

        // Button Text
        var button_color = $('input#cptalm_button_color').val();
        console.log(button_color);
        if(button_color)
          foutput += ' button_color="'+button_color+'"';


        // Init Posts Load
        var init_posts = $('input#cptalm_init_posts').val();
        if(init_posts)
          foutput += ' init_load="'+init_posts+'"';

        // Init Posts Load
        var posts_per_page = $('input#cptalm_posts_per_page').val();
        if(posts_per_page)
          foutput += ' posts_per_page="'+posts_per_page+'"';

      	// Post Type
      	var post_output = $.map($(':checkbox[name=cptalm_post_type\\[\\]]:checked'), function(n, i){
		      return n.value;
		    }).join(',');
		    if(post_output != '' && post_output != 'post')
      		foutput += ' post_type="'+post_output+'"';
    
    	  // Post Status
      	var post_status = $('select#cptalm_post_status').val();
      	if(post_status != '' && post_status != 'publish')
      	  foutput += ' post_status="'+post_status+'"';

        // Categories
        var post_category = $.map($('#cptalm_category :selected'), function(n, i){
          return n.value;
        }).join(',');
        if(post_category != '')
          foutput += ' category="'+post_category+'"';

        // Exclude Categories
        var post_excl_category = $.map($('#cptalm_excl_category :selected'), function(n, i){
          return n.value;
        }).join(',');
        if(post_excl_category != '')
          foutput += ' category__not_in="'+post_excl_category+'"';

        // Post Order
        var order = $('select#cptalm_order').val();
        if(order != '' && order != 'date')
          foutput += ' order="'+order+'"';

        // Post Order By
        var order_by = $('select#cptalm_order_by').val();
        if(order_by != '' && order_by != 'date')
          foutput += ' order_by="'+order_by+'"';

        foutput += ']';

        $(generator_box).text(foutput);
    };


//jQuery(document).ready(function($) {

	$(document).on('change keyup', '.cptalm_params', function(e){
        cpt_alm.shortcode_generate();
    });

    cpt_alm.init();
});