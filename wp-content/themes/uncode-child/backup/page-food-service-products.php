<?php get_header();?>


<h2 class="title">
	<span class="title-black-avenir">FOOD SERVICE</span>
	<span class="title-blue-authenia">Products</span>
</h2>

<div class="container full-container products-block">
	<div class="row">
		<div class="col-md-3 left">

			<h3 class="body-l">SEARCH BY TYPE OF SEAFOOD</h3>
			<ul class="search">
				<?php 
					
				?>
				<li>Fish</li>
				<li>Specialty</li>
				<li>Squid</li>
				<li>Scallops</li>
				<li>Prawns</li>
			</ul>


		</div>
		<div class="col-md-9 right">
			<h3 class="body-l">FILTER PRODUCTS</h3>
			<h4 class="body-l">Fish type</h4>
			<ul class="fish-type">
				<li>Fish</li>
				<li>Specialty</li>
				<li>Squid</li>
				<li>Scallops</li>
				<li>Prawns</li>
			</ul>
		</div>
	</div>
</div>

<?php get_template_part('/template-parts/content-view-wholesalers');?>

<?php get_template_part('/template-parts/content-contact-block');?>

<?php get_footer();?>