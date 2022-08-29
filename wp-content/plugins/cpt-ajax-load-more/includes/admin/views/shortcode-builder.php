<style type="text/css">
	#cptalm-shortcode-settings{
		height: 350px;
		overflow-y: scroll;
	}
	#cptalm-shortcode-settings .cpt-alm-shortcode-container {
    /*margin: 0 -20px;*/
    padding: 1.5em 20px;
    border-bottom: 1px solid #ccc;
    box-shadow: 0 1px 3px rgba(0,0,0,.1);
	}
	#su-generator-preview h5, #cptalm-shortcode-settings h5 {
    margin: 0 0 15px 0;
    font-size: 1em;
}
#cptalm-shortcode-settings input[type=number], #cptalm-shortcode-settings input[type=text], #cptalm-shortcode-settings select, #cptalm-shortcode-settings textarea {
    width: 100%;
    height: auto;
    padding: 10px;
    max-width: 100%;
}
.cpt-alm-shortcode-desc {
    margin-top: 15px;
    color: #aaa;
    font-style: italic;
    line-height: 1.6;
}
#cptalm-shortcode-settings .inline-checkbox label{
	margin-right: 10px;
}
.su-generator-actions {
    margin: 0 -20px -20px;
    padding: 1.5em 15px;
    background: #eee;
}
.cpt-alm-generator-actions{
	margin-top: 10px;
}
.wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
    min-height: 32px;
    line-height: 2.30769231;
    padding: 0 12px;
}
.su-generator-actions>.button {
    margin: 0 5px;
}
.su-generator-presets {
    position: relative;
}
.cpt-alm-popup {
    position: absolute;
    right: 0;
    bottom: 0;
    display: none;
    min-width: 160px;
    max-width: 500px;
    border: 1px solid #aaa;
    border-radius: 5px;
    background: #fff;
}
.cpt-alm-head {
    margin-bottom: 10px;
    padding: 10px;
    border-bottom: 1px dotted #ccc;
}
.su-gp-list {
    margin: 5px 0;
}
.button.button-large {
    min-height: 32px;
    line-height: 2.30769231;
    padding: 0 12px;
}
.button-primary {
    background: #007cba;
    border-color: #007cba;
    color: #fff;
    text-decoration: none;
    text-shadow: none;
    vertical-align: top;
}
.button-secondary {
    color: #0071a1;
    border-color: #0071a1;
    background: #f3f5f6;
    vertical-align: top;
}
.button-secondary {
    display: inline-block;
    text-decoration: none;
    font-size: 13px;
    line-height: 2.15384615;
    min-height: 30px;
    margin: 0;
    padding: 0 10px;
    cursor: pointer;
    border-width: 1px;
    border-style: solid;
    -webkit-appearance: none;
    border-radius: 3px;
    white-space: nowrap;
    box-sizing: border-box;
}
/* The cpt-alm-radio-container */
.cpt-alm-radio-container {
  display: inline;
  position: relative;
  padding-left: 25px;
  margin-bottom: 15px;
  margin-right: 50px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.cpt-alm-radio-container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 18px;
  width: 18px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.cpt-alm-radio-container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.cpt-alm-radio-container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.cpt-alm-radio-container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.cpt-alm-radio-container .checkmark:after {
 	top: 6px;
	left: 6px;
	width: 6px;
	height: 6px;
	border-radius: 50%;
	background: white;
}
#cptalm-shortcode-settings .select2-container{
	width: 100% !important;
}
#generator_box{
	margin-top: 10px;
    padding: 10px;
    background: gainsboro;
    border: 1px solid;
    border-radius: 5px;
}
</style>

<div>
	<div class="shortcode-parameters">

		<div id="cptalm-shortcode-settings" class="" style="display: block;">
			
			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Instance ID','cpt-ajax-load-more') ?></h5>
				<input type="text" name="cptalm_id" value="<?php echo 'cptalm_'.uniqid() ?>" id="cptalm_id" class="cptalm_params">
				<div class="cpt-alm-shortcode-desc">
					The Unique ID is used for multiple instance in single page
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Grid','cpt-ajax-load-more') ?></h5>
				<select id="cptalm_grid" class="cptalm_params">
					<option value="1" selected="selected">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
				<div class="cpt-alm-shortcode-desc">
					How many grids for lists
				</div>
			</div>
			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Scroll','cpt-ajax-load-more') ?></h5>
				<label class="cpt-alm-radio-container">True
				  <input type="radio" name="cptalm_scroll" value="true" class="cptalm_params">
				  <span class="checkmark"></span>
				</label>
				<label class="cpt-alm-radio-container">False
				  <input type="radio" checked="checked" name="cptalm_scroll" value="false" class="cptalm_params">
				  <span class="checkmark"></span>
				</label>
				<div class="cpt-alm-shortcode-desc">
					Set True if you want infinite window scroll
				</div>
			</div>
			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Wrapper Class','cpt-ajax-load-more') ?></h5>
				<input type="text" name="cptalm_wrapperclass" id="cptalm_wrapperclass" class="cptalm_params">
				<div class="cpt-alm-shortcode-desc">
					The main wrapper class of the ajax load more
				</div>
			</div>
			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Item Class','cpt-ajax-load-more') ?></h5>
				<input type="text" name="cptalm_itemclass" id="cptalm_itemclass" class="cptalm_params">
				<div class="cpt-alm-shortcode-desc">
					Class of the single item in the loop
				</div>
			</div>
			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Template','cpt-ajax-load-more') ?></h5>
					<?php
					$templates = glob(CPT_ALM_ABSPATH."templates/loop/*.php");
					$pt_templates = glob(get_template_directory()."/cpt-alm/loop/*.php");
					$ct_templates = glob(get_stylesheet_directory()."/cpt-alm/loop/*.php");
					?>
					<select id="cptalm_template" class="cptalm_params">
						<?php
						echo '<optgroup label="Core">';
						foreach ($templates as $template) {
							$layout = basename($template, ".php");
							echo '<option value="'.$layout.'">'.$layout.'</option>';
						}
						echo '</optgroup>';

						if(!empty($pt_templates)){
							echo '<optgroup label="Parent Theme">';
							foreach ($pt_templates as $template) {
								$layout = basename($template, ".php");
								echo '<option value="'.$layout.'">'.$layout.'</option>';
							}
							echo '</optgroup>';
						}

						if(!empty($ct_templates)){
							echo '<optgroup label="Child Theme">';
							foreach ($ct_templates as $template) {
								$layout = basename($template, ".php");
								echo '<option value="'.$layout.'">'.$layout.'</option>';
							}
							echo '</optgroup>';
						}

						?>
					</select>
				<div class="cpt-alm-shortcode-desc">
					Customize the listing behavior with the template
					<a href="https://plugins.blacktheme.net/cpt-ajax-load-more/examples/default-list/" target="_blank" rel="noopener">Get more Layouts →</a>
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Loading Style','cpt-ajax-load-more') ?></h5>
					<select id="cptalm_loading_style" class="cptalm_params">
						<option value="normal">Normal</option>
						<option value="loader-1">Style 1</option>
						<option value="loader-2">Style 2</option>
						<option value="loader-3">Style 3</option>
					</select>
				<div class="cpt-alm-shortcode-desc">
					Loader style when Ajax is Loading data
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Use default CSS','cpt-ajax-load-more') ?></h5>
					<select id="cptalm_default_css" class="cptalm_params">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
				<div class="cpt-alm-shortcode-desc">
					If you set "No" then it will not load any style, it requires to custom enqueue style
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Button Text','cpt-ajax-load-more') ?></h5>
				<input type="text" name="cptalm_button_text" id="cptalm_button_text" class="cptalm_params">
				<div class="cpt-alm-shortcode-desc">
					Label of the Load more button
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Button Color','cpt-ajax-load-more') ?></h5>
				<input type="text" name="cptalm_button_color" id="cptalm_button_color" class="cptalm_params">
				<div class="cpt-alm-shortcode-desc">
					The hexa color code of the Load more button
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Init Posts','cpt-ajax-load-more') ?></h5>
				<input type="number" name="cptalm_init_posts" id="cptalm_init_posts" class="cptalm_params" min="1">
				<div class="cpt-alm-shortcode-desc">
					How many posts will be show initially when page load.
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Post Per Page','cpt-ajax-load-more') ?></h5>
				<input type="number" name="cptalm_posts_per_page" id="cptalm_posts_per_page" class="cptalm_params" min="1">
				<div class="cpt-alm-shortcode-desc">
					Post Per page when ajax fetch records
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip inline-checkbox" data-default="default">
				<h5><?php _e('Post Type','cpt-ajax-load-more') ?></h5>
					<?php
					$args = array(
						   'public' => true,
					);
				    $post_types = get_post_types( $args, 'objects' );
				    foreach ($post_types as $pt) {
				    	$checked = ($pt->name == 'post') ? 'checked' : '';
				    	echo '
				    	<label>
				    	<input type="checkbox" value="'.$pt->name.'" id="cptalm_post_type_'.$pt->name.'" class="cptalm_params" name="cptalm_post_type[]" '.$checked.' />'.$pt->label.'
				    	</label>';
				    }
				?>
				<div class="cpt-alm-shortcode-desc">
					Specify the post type name by comma
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Post Status','cpt-ajax-load-more') ?></h5>
					<select id="cptalm_post_status" class="cptalm_params">
						<?php
						$post_statuses = get_post_statuses();
						foreach ($post_statuses as $key => $status) {
				    	$checked = ($key == 'publish') ? 'selected' : '';
						echo '<option value="'.$key.'" '.$checked.'>'.$status.'</option>';
						}
						?>
					</select>
				<div class="cpt-alm-shortcode-desc">
					The Comma separated Post Status that exists.
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Include Categories','cpt-ajax-load-more') ?></h5>
				<select id="cptalm_category" name="cptalm_post_categories[]" class="cptalm_params" multiple="multiple">
					<?php
					$categories = get_categories();
					foreach ($categories as $key => $cat) {
					echo '<option value="'.$cat->slug.'">'.$cat->name .'</option>';
					}
					?>
				</select>
				<div class="cpt-alm-shortcode-desc">
					The Comma separated category list by slug
				</div>
				<br />
				<h5><?php _e('Exclude Categories','cpt-ajax-load-more') ?></h5>
				<select id="cptalm_excl_category" name="cptalm_post_excl_categories[]" class="cptalm_params" multiple="multiple">
					<?php
					$categories = get_categories();
					foreach ($categories as $key => $cat) {
					echo '<option value="'.$key.'">'.$cat->name .'</option>';
					}
					?>
				</select>
				<div class="cpt-alm-shortcode-desc">
					The Comma separated category list that exclude by ID
				</div>
			</div>

			<div class="cpt-alm-shortcode-container cpt-alm-shortcode-skip" data-default="default">
				<h5><?php _e('Order','cpt-ajax-load-more') ?></h5>
				<select id="cptalm_order" class="cptalm_params">
					<option value="desc" selected="selected">DESC</option>
					<option value="asc">ASC</option>
				</select>
				<div class="cpt-alm-shortcode-desc">
					Set the order of posts.
				</div>
				<br />
				<h5><?php _e('Order By','cpt-ajax-load-more') ?></h5>
				<select id="cptalm_order_by" class="cptalm_params">
					<option value="date" selected="selected">Date (default)</option>
					<option value="title">Title</option>
					<option value="name">Slug</option>
					<option value="menu_order">Menu Order</option>
					<option value="author">Author</option>
					<option value="ID">ID</option>
				</select>
				<div class="cpt-alm-shortcode-desc">
					Order by post_date, ID, menu_order etc..
				</div>
			</div>

		</div>

		<div>
			<div class="cpt-alm-generator-actions su-generator-clearfix">
				<a class="button button-primary button-large cptalm-generator-insert"><i class=""></i> <?php _e('Insert shortcode','cpt-ajax-load-more'); ?></a>

				<div class="cpt-alim-generator-presets alignright" data-shortcode="tooltip"><a class="button button-large cpt-alm-copy-sc"><i class=""></i> <?php _e('Copy', 'cpt-ajax-load-more'); ?></a>
					<div class="cpt-alm-popup">
					
					</div>
				</div>
			</div>
			<div id="generator_box"></div>
		</div>
	</div>
</div>
