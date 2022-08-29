(function($){
	$(document).ready(function(){
		function init(){
			brand_selector_food_service();
			brand_selector_at_home();
			brand_selector_product_slider();
			
            single_product_product_slider(); 
			
			gallery_lightbox();
			filter_gallery();
			no_filter_waterfall();

			if($('.waterfall').length > 0){
				// waterfall_layout_button();
				// waterfall_calculate_screen_width();
			}
			
			top_menu();
			
			top_menu_mobile();

            food_service_products_filter();

		}

		init();
		
		$(window).resize(function(){
		  filter_gallery();
		  no_filter_waterfall();
		});

		function top_menu(){
		    var body_class = $('body').attr('class');
			var header = $('header');
			var menu = $('header .top-menu');
			var our_ranges = menu.find('.our-ranges');
			var our_ranges_hover_show = $('header .our-ranges-hover-show');
			var recipes_inspiration = menu.find('.recipes-inspiration');
			var recipes_inspiration_hover_show = $('header .recipes-inspiration-hover-show');
			var top_banner = $('.top-banner');
			var slider = $('header .brand-selector .product-slider');
			
			if(body_class.indexOf('page-our-ranges') == -1){
			    our_ranges.mouseenter(function(){
    				our_ranges_hover_show.show();
    				
    				if(slider.find('.slick-list').length == 0){
    				    slider.slick({
            				slidesToShow: 4
            			});
    				}
    				
    			});
			}


			header.mouseleave(function(){
			    console.log('header leave');
				our_ranges_hover_show.hide();
				recipes_inspiration_hover_show.hide();
				top_banner.removeClass('top-banner-overlay');
			});

			recipes_inspiration.mouseenter(function(){
				recipes_inspiration_hover_show.show();
				top_banner.addClass('top-banner-overlay');
			});
			
			our_ranges_hover_show.mouseleave(function(){
			    console.log('out');
				our_ranges_hover_show.hide();
			});
			
			$('header + div').mouseenter(function(){
			    console.log('out');
				our_ranges_hover_show.hide();
			});
			
			$('header + div + div').mouseenter(function(){
			    console.log('out');
				our_ranges_hover_show.hide();
			});
			
		}
		
		function top_menu_mobile(){
		    var menu = $('header .mobile-menu');
		    var icon = $('header .mobile-menu-icon');
		    var menu_list = $('header .mobile-menu .menu-list');
		    icon.click(function(){
		        menu_list.toggleClass('show_list');
		        
		        if(menu_list.hasClass('show_list')){
		            $('.brand-selector .food-service').css('z-index', '1');
		            $('html').css('overflow', 'hidden');
		            menu.css('background', '#fff');
		        }else{
		            $('.brand-selector .food-service').css('z-index', '10');
		            $('html').css('overflow', 'auto');
		            menu.css('background', 'none');
		        }
		    });
		}

		function brand_selector_product_slider(){
			var slider = $('.not-in-menu .brand-selector .product-slider');
			slider.slick({
				slidesToShow: 4
			});
		}
		
		function single_product_product_slider(){
			var slider = $('.single-product .single-product-slider');
			slider.slick({
				slidesToShow: 3
			});
		}

		function brand_selector_food_service(){
			var food_service = $('.brand-selector .food-service');
			
			food_service.mouseenter(function(){
			    var selector = $(this).closest('.brand-selector');
			    selector.find('.food-service').css('z-index', '10');
			    selector.find('.food-service-hover').css('z-index', '10');
			    selector.find('.food-service-hover').fadeTo('slow',1);
				selector.find('.at-home').css('z-index', '0');
				selector.find('.at-home-hover').css('z-index', '0');
			});

			$('.brand-selector').mouseleave(function(){
			    $(this).find('.food-service-hover').fadeTo('slow',1);
				$(this).find('.at-home').css('z-index', '10');
				$(this).find('.food-service-hover').css('z-index', '0');
			});
		}
		
		function brand_selector_at_home(){
			var at_home = $('.brand-selector .at-home');
			var flag = 0;
			
			at_home.mouseenter(function(e){
			    e.stopPropagation();
			    flag = 1;
			    var selector = $(this).closest('.brand-selector');
			    selector.find('.at-home-hover').fadeTo('slow',1);
				selector.find('.at-home-hover').css('z-index', '10');
				selector.find('.at-home').css('z-index', '0');
				selector.find('.other').css('z-index', '0');
				selector.find('.food-service').css('display', 'none');
				selector.find('.at-home').detach().insertBefore(selector.find('.food-service'));
			});

			$('.brand-selector').mouseleave(function(e){
			    e.stopPropagation();
			    $(this).find('.at-home-hover').fadeTo('slow',0);
				$(this).find('.at-home').css('z-index', '10');
				$(this).find('.at-home-hover').css('z-index', '0');
				
				if(flag){
				    $(this).find('.at-home').detach().insertAfter($(this).find('.food-service'));
				    $(this).find('.food-service').css('display', 'block');
				    flag = 0;
				}
			});
		}

        // This function is not used any more. This is to get data for gallery through http request
		function create_waterfall(){
			var waterfall = $('.waterfall');
			if(waterfall.length){
			    var window_width = $(window).width();
    			var layout_size;
    			
                // get post type from the first class of waterfall dom element
                var post_type = waterfall.attr('class').split(/\s+/)[0];
                
                var show_loading = true;
                
                if(show_loading){
                    waterfall.find('.waterfall-content').html(`<div class="loading"></div>`);
                }
    			
    			$.getJSON(siteData.root_url + '/wp-json/wp/v2/' + post_type + '?per_page=100', (items)=>{			
    			
    				if(window_width > 1500){
    					items_part = items.slice(0, 12);
    					layout_size = 'xl-size';
    				}else if(window_width > 1200){
    					items_part = items.slice(0, 10);
    					layout_size = 'lg-size';
    				}else{
    					items_part = items.slice(0, 8);
    					layout_size = 'md-size';
    				}
    
    				var class_string = layout_size;
    			
    				
    				var content = items_part.map((item, index) => {
    					return `
    					${index % 2 === 0 ? `<div class="${layout_size + ' col-container col-custom-5 col-custom-2 col-md-3'}">` : ''}
    					<div class="">
    				
            				<div class="item"> 
            					<img src=${item.postInfo.featuredImage}>
            					<div class="general_info">
            						<div class="post_type body-s">${post_type}</div>
            						<div class="category body-s">${item.postInfo.brand.cat_name}</div>
            					</div>
            
            					<div class="wrapper">
            
            						<h3 class="title-s">${item.title.rendered}</h3>
            
            						<div class="post_info container">
            							<div class="row">
            								<div class="col-6">Sustainability:</div>
            								<div class="col-6">${item.postInfo.recipe_sustainability}</div>
            							</div>
            							<div class="row">
            								<div class="col-6">Species of protein:</div>
            								<div class="col-6"><?php echo get_field('recipe_species_of_protein');?></div>
            							</div>
            							<div class="row">
            								<div class="col-6">Country of origin:</div>
            								<div class="col-6"><?php echo get_field('recipe_country_of_origin');?></div>
            							</div>
            							<div class="row">
            								<div class="col-6">Resale amount:</div>
            								<div class="col-6"><?php echo get_field('recipe_resale_amount');?></div>
            							</div>
            						</div>
            					</div>		
            					
            					 <!--<?php echo $count == 4 ? '<a href="'. $url .'" class="button btn-blue-white">VIEW MORE</a>' : ''; ?>	-->
            					 
            				</div>	
    						
    			        </div>
    			        ${index % 2 == 1 ? '</div>' : ''}
    			        
    			        `
    					}).join('');
    					
    				show_loading = false;
    
    				waterfall.find('.waterfall-content').html(content);
    							
    			});
			}
		}
		
		
		function food_service_products_filter(){
		    // external js: isotope.pkgd.js
		    
		    var $grid = $('.page-food-service-products .grid').isotope({
                  itemSelector: '.element-item',
                  layoutMode: 'fitRows'
                });
	       
            // filter functions
            var filterFns = {
             
              
            };
            // bind filter button click
            $('.filters-button-group').on( 'click', 'button', function() {
              
                  var filterValue = $( this ).attr('data-filter');
                  // use filterFn if matches value
                //   filterValue = filterFns[ filterValue ] || filterValue;
              
                  $grid.isotope({ filter: filterValue });
                  
             });
            // change is-checked class on buttons
            $('.button-group').each( function( i, buttonGroup ) {
              var $buttonGroup = $( buttonGroup );
              $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
              });
            });

		}
		
		
		function gallery_lightbox(){
		    var lightbox = $('.gallery .lightbox');
		    var item = $('.gallery .item');
		    item.click(function(){
		        $(this).find('.lightbox').css('display', 'flex');
		    });
		    
		    lightbox.click(function(e){
		        e.stopPropagation();
		        $(this).css('display', 'none');
		    });
		}
		
		//check if group div needs to be removed, all the window widths need to be consistent with the one in _gallery.scss
		function get_group_number(window_width){
		    var group_number = 0;
    	    if(window_width > 2040){
    	          group_number = 7;
    	      }else if(window_width > 1760){
    	          group_number = 6;
    	      }else if(window_width > 1475){
    	          group_number = 5;
    	      }else if(window_width > 1200){
    	          group_number = 4;
    	      }else if(window_width > 910){
    	          group_number = 3;
    	      }else if(window_width > 626){
    	          group_number = 2;
    	      }else if(window_width > 300){
    	          group_number = 1;
    	      }
    	      
    	      return group_number;
		}
		
        function create_waterfall_layout_three_rows(){
            
        }
		
		function filter_gallery(){
            var url = window.location.href;
            var query = '';
            var button = $('form .button-group button');
            if(url.indexOf('?') > -1){
                query = url.split('?')[1].split('=')[1];
            }
            var item = $('.gallery .item');
            var window_width = $(window).width();
            var group_number = 0;
		  
		    button.click(function(){
		        this.form.submit();
		    })
		    
		    if(query){
		        
                var new_items = [];
                var filter = query;
                var new_groups = '';
		 
                item.filter(function(){
                 
                    if(filter == 'all'){
                        new_items.push($(this));
                    }else{
                        //get class list on each .item
                        var classList = $(this).attr('class').split(/\s+/);
                     
                        if (classList.indexOf(filter) > -1){
                            new_items.push($(this));
                        }
                    }
                });
                
                $('.gallery').html('');
                
                group_number = get_group_number(window_width);
		      
  		      //build different dom structure based on the number of items
                if(new_items.length < group_number + 1){
                 
                    $('.gallery').append(new_items);
                  
                }else if (new_items.length < group_number * 3 && new_items.length >= group_number * 2){
                 
                    var arr = new_items.slice(0, (new_items.length - group_number) * 3);
                    var arr_rest = new_items.slice((new_items.length - group_number) * 3);
                  
                    for (var i = 0; i < arr.length; i++){
                        if(i % 3 == 0){
                            new_groups += '<div class="group">';
                        }
                        new_groups += arr[i].prop('outerHTML');
                        
                        if(i % 3 == 2){
                            new_groups += '</div>';
                        }
                    }
                 
                 $('.gallery').html(new_groups);
                 $('.gallery').append(arr_rest);
                 
                }else if (new_items.length < group_number * 2 && new_items.length > group_number){
                  
                    var arr = new_items.slice(0, (new_items.length - group_number) * 2);
                    var arr_rest = new_items.slice((new_items.length - group_number) * 2);
                    
                    for (var i = 0; i < arr.length; i++){
                        if(i % 2 == 0){
                            new_groups += '<div class="group">';
                        }
                        new_groups += arr[i].prop('outerHTML');
                        
                        if(i % 2 == 1){
                            new_groups += '</div>';
                        }
                    }
                    
                    $('.gallery').html(new_groups);
                    $('.gallery').append(arr_rest);
                    
                }else {
                    for (var i = 0; i < new_items.length; i++){
                        if(i % 3 == 0){
                            new_groups += '<div class="group">';
                        }
                        new_groups += new_items[i].prop('outerHTML');
                    
                        if(i % 3 == 2){
                            new_groups += '</div>';
                        }
                    }
                    
                    $('.gallery').html(new_groups);
                }
		    }
		}
		
        function no_filter_waterfall(){
		
		    var item = $('.no_filter_waterfall .item');
		    var window_width = $(window).width();
		    var group_number = 0;
	        var new_items = [];
	        var new_groups = '';
		 
            item.each(function(){
              new_items.push($(this));
            });
		         
	        $('.no_filter_waterfall').html('');
		      
            group_number = get_group_number(window_width);

            if(new_items.length < group_number + 1){
              
              $('.no_filter_waterfall').append(new_items);
              
            }else if (new_items.length < group_number * 3 && new_items.length >= group_number * 2){
              
                var three_item_group_number = new_items.length % group_number; //calculate how many groups that contain three items
                var arr_three = new_items.slice(0, three_item_group_number * 3); 
                var arr_two = new_items.slice(arr_three.length, arr_three.length + ( (new_items.length - arr_three.length) / 2) * 2);
                var arr_rest = new_items.slice(arr_three.length + arr_two.length);
              
                for (var i = 0; i < arr_three.length; i++){
                 
                    if(i % 3 == 0){
                        new_groups += '<div class="group">';
                    }
                    new_groups += arr_three[i].prop('outerHTML');
                    
                    if(i % 3 == 2){
                        new_groups += '</div>';
                    }
                }
             
                for (var i = 0; i < arr_two.length; i++){
                 
                    if(i % 2 == 0){
                        new_groups += '<div class="group">';
                    }
                    new_groups += arr_two[i].prop('outerHTML');
                    
                    if(i % 2 == 1){
                        new_groups += '</div>';
                    }
                }
            
                $('.no_filter_waterfall').html(new_groups);
                $('.no_filter_waterfall').append(arr_rest);
             
            }else if (new_items.length < group_number * 2 && new_items.length > group_number){
            
                var arr = new_items.slice(0, (new_items.length - group_number) * 2);
                var arr_rest = new_items.slice((new_items.length - group_number) * 2);
                
                for (var i = 0; i < arr.length; i++){
                    
                    if(i % 2 == 0){
                        new_groups += '<div class="group">';
                    }
                    new_groups += arr[i].prop('outerHTML');
                 
                    if(i % 2 == 1){
                        new_groups += '</div>';
                    }
                }
                
                $('.no_filter_waterfall').html(new_groups);
                $('.no_filter_waterfall').append(arr_rest);
                
            }else{
                
                for (var i = 0; i < new_items.length; i++){
                    if(i % 3 == 0){
                        new_groups += '<div class="group">';
                    }
                    new_groups += new_items[i].prop('outerHTML');
                 
                    if(i % 3 == 2){
                        new_groups += '</div>';
                    }
                }
            
             $('.no_filter_waterfall').html(new_groups);
            }
		}
		

	});
})(jQuery)