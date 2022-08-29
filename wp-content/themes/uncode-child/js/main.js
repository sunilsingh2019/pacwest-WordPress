(function ($) {
    function init() {
        two_column_text_without_image_mobile_background();
        // brand_selector_food_service();
        //brand_selector_at_home();
        brand_selector_product_slider();

        single_product_product_slider();

        build_product_slider();

        filter_gallery();
        // no_filter_waterfall();
        view_more_galleries();
        // filter_gallery_masonry();
        gallery_lightbox();

        food_service_loadmore();

        wipeAnimation()

        top_menu();

        top_menu_mobile();

        food_service_products_filter();

        inspirationFilter();

        add_custom_animation();

        waterFallLayout()
        showMoreSome()
    }

    $(document).ready(function () {
        init();
    });

    $(window).on('load', function () {
        isotopeGridRearrange()
    })

    $(window).resize(function () {
        filter_gallery();
        // no_filter_waterfall();
        two_column_text_without_image_mobile_background();
        //brand_selector_at_home();
        // brand_selector_food_service();
        build_product_slider();

        add_custom_animation();
    });
    /*
     * Custom Animations Effects
     */
    function add_custom_animation() {
        const wrapper = $('.brand-selector'),
            hoverPart = wrapper.find('.food-service-hover');

        wrapper.on('mouseenter', '.brand-selector__hashover', function () {
            $(this).addClass('active')
            hoverPart.fadeIn(100)
            hoverPart.addClass('active')
            console.log('mouse enter');
            $('.brand-selector .product-slider').slick('refresh');
        }).on("mouseleave", $(this), function () {
            $('.brand-selector__hashover').removeClass('active');
            hoverPart.hide()
            hoverPart.removeClass('active')
        });

        // $(".brand-selector .food-service").on("mouseenter", function () {
        //     $(this).parent().find("#background-blue-curtain-left").hide();
        //     $(this).parent().find("#background-blue-curtain-right").show();
        //     $(this).parent().find("#background-blue-curtain-right").addClass("move-bg-left-right");
        //     $(this).parent().find("#background-blue-curtain-left").removeClass("move-bg-right-left");
        //     $(this).parent().find(".hover-part").css({
        //         opacity: "1",
        //         "z-index": "10"
        //     });
        // });
        // $(".brand-selector").on("mouseleave", function () {
        //     var $this = $(this);
        //     $(this).parent().find("#background-blue-curtain-left").show();
        //     $(this).parent().find("#background-blue-curtain-right").hide();
        //     $(this).parent().find("#background-blue-curtain-right").removeClass("move-bg-left-right");
        //     $(this).parent().find("#background-blue-curtain-left").addClass("move-bg-right-left");
        //     $(this).parent().find("#background-blue-curtain-left").css({
        //         opacity: "1"
        //     });
        //     setTimeout(function () {
        //         $this.parent().find("#background-blue-curtain-left").css({
        //             opacity: "0"
        //         });
        //     }, 250);
        //     $(this).parent().find(".hover-part").css({
        //         opacity: "0",
        //         "z-index": "0"
        //     });
        //     //$('.hover-part').css({"opacity": "0", "z-index": "0"});
        // });
    }

    function two_column_text_without_image_mobile_background() {
        var window_width = $(window).width();
        var image_url = "";
        if (window_width < 767) {
            image_url = $(".hide.mobile-background-image").attr("data-image");
            if (image_url) {
                $(".two-column-text-image.without-image .background-inner").css("background-image", `url(${image_url})`);
                $(".two-column-text-image.without-image").css("height", "1000px");
            }
        } else {
            image_url = $(".hide.desktop-background-image").attr("data-image");
            if (image_url) {
                $(".two-column-text-image.without-image .background-inner").css("background-image", `url(${image_url})`);
                $(".two-column-text-image.without-image").css("height", "auto");
            }
        }
    }

    function top_menu() {
        var body_class = $("body").attr("class");
        var header = $("header");
        var menu = $("header .top-menu");
        var our_ranges = menu.find(".our-ranges");
        var our_ranges_hover_show = $("header .our-ranges-hover-show");
        var recipes_inspiration = menu.find(".recipes-inspiration");
        var recipes_inspiration_hover_show = $("header .recipes-inspiration-hover-show");
        var top_banner = $(".top-banner");
        var slider = $("header .brand-selector .product-slider");

        // 			if(body_class.indexOf('page-our-ranges') == -1){
        // 			    our_ranges.mouseenter(function(){
        //     				our_ranges_hover_show.show();

        //     				if(slider.find('.slick-list').length == 0){
        //     				    slider.slick({
        //             				slidesToShow: 4
        //             			});
        //     				}

        //     			});
        // 			}

        header.mouseleave(function () {
            // our_ranges_hover_show.hide();
            recipes_inspiration_hover_show.slideUp();
            top_banner.removeClass("top-banner-overlay");
        });

        recipes_inspiration.mouseenter(function () {
            recipes_inspiration_hover_show.slideDown();
            top_banner.addClass("top-banner-overlay");
        });

        // 			our_ranges_hover_show.mouseleave(function(){
        // 				our_ranges_hover_show.hide();
        // 			});

        // 			$('header + div').mouseenter(function(){
        // 				our_ranges_hover_show.hide();
        // 			});

        // 			$('header + div + div').mouseenter(function(){
        // 				our_ranges_hover_show.hide();
        // 			});

        // 			$('header .top-menu .home').mouseenter(function(){
        // 				our_ranges_hover_show.hide();
        // 			});

        $("header .top-menu .about-us").mouseenter(function () {
            // our_ranges_hover_show.hide();
            recipes_inspiration_hover_show.hide();
            top_banner.removeClass("top-banner-overlay");
        });

        $("header .top-menu .contact").mouseenter(function () {
            recipes_inspiration_hover_show.hide();
            top_banner.removeClass("top-banner-overlay");
        });
    }





    function our_ranges() {
        var body_class = $("body").attr("class");
        var header = $("header");
        var menu = $("header .top-menu");
        var our_ranges = menu.find(".our-ranges");
        var our_ranges_hover_show = $("header .our-ranges-hover-show");
        var top_banner = $(".top-banner");
        var slider = $("header .brand-selector .product-slider");

        header.mouseleave(function () {
            // our_ranges_hover_show.hide();
            our_ranges_hover_show.slideUp();
            top_banner.removeClass("top-banner-overlay");
        });

        our_ranges.mouseenter(function () {
            our_ranges_hover_show.slideDown();
            top_banner.addClass("top-banner-overlay");
        });

        $("header .top-menu .about-us").mouseenter(function () {
            // our_ranges_hover_show.hide();
            our_ranges_hover_show.hide();
            top_banner.removeClass("top-banner-overlay");
        });

        $("header .top-menu .contact").mouseenter(function () {
            our_ranges_hover_show.hide();
            top_banner.removeClass("top-banner-overlay");
        });
    }

    function top_menu_mobile() {
        var menu = $("header .mobile-menu");
        var icon = $("header .mobile-menu-icon");
        var menu_list = $("header .mobile-menu .menu-list");
        icon.click(function () {
            menu_list.toggleClass("show_list");
            if (menu_list.hasClass("show_list")) {
                $(".brand-selector .food-service").css("z-index", "1");
                $("html").css("overflow", "hidden");
                menu.css("background", "#fff");
            } else {
                $(".brand-selector .food-service").css("z-index", "10");
                $("html").css("overflow", "auto");
                menu.css("background", "none");
            }
        });
    }
    our_ranges();

    function brand_selector_product_slider() {
        var slider = $(".not-in-menu .brand-selector .product-slider");
        slider.slick({
            slidesToShow: 4,
        });
    }

    function single_product_product_slider() {
        var slider = $(".single-product .single-product-slider");
        slider.slick({
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 860,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }

    function build_product_slider() {
        var window_width = $(window).width();
        var single_product_page = $("body.single-product");
        var food_service_page = $("body.page-food-service");
        var at_home_page = $("body.page-at-home");
        var slider = $(".product-slider.three");
        if (window_width > 600) {
            if (single_product_page.length > 0 || food_service_page.length > 0 || at_home_page.length > 0) {
                slider.slick({
                    slidesToShow: 3,
                    responsive: [{
                        breakpoint: 860,
                        settings: {
                            slidesToShow: 2,
                        },
                    }, ],
                });
            }
        } else {
            slider.slick("unslick");
        }
    }

    // function brand_selector_food_service() {
    //     var window_width = $(window).width();
    //     var food_service = $(".brand-selector .food-service");

    //     if (window_width > 767) {
    //         food_service.mouseenter(function () {
    //             var selector = $(this).closest(".brand-selector");
    //             selector.find(".food-service").css("z-index", "10");
    //             selector.find(".food-service-hover").css("z-index", "10");
    //             selector.find(".food-service-hover").fadeTo("slow", 2000);

    //             //   toggle slide
    //             //selector.find('.food-service-hover').toggle( "slide", 'right', 2000 );

    //             //animate + show
    //             //   selector.find('.food-service-hover').animate({width: 'toggle'});
    //             //   selector.find('.food-service-hover').show("slide", { direction: "left" }, 1000);

    //             selector.find(".at-home").css("z-index", "0");
    //             selector.find(".at-home-hover").css("z-index", "0");
    //         });

    //         $(".brand-selector").mouseleave(function () {
    //             $(this).find(".food-service-hover").fadeTo("slow", 1);
    //             $(this).find(".at-home").css("z-index", "10");
    //             $(this).find(".other").css("z-index", "10");
    //             $(this).find(".food-service-hover").css("z-index", "0");
    //         });
    //     } else {
    //         food_service.off("mouseenter");
    //         $(".brand-selector").off("mouseleave");
    //     }
    // }

    // function brand_selector_at_home() {
    //     var window_width = $(window).width();
    //     var at_home = $(".brand-selector .at-home");

    //     if (window_width > 767) {
    //         var flag = 0;

    //         at_home.mouseenter(function (e) {
    //             e.stopPropagation();
    //             flag = 1;
    //             var selector = $(this).closest(".brand-selector");
    //             selector.find(".at-home-hover").fadeTo("slow", 1);
    //             selector.find(".at-home-hover").css("z-index", "10");
    //             selector.find(".at-home").css("z-index", "0");
    //             selector.find(".other").css("z-index", "0");
    //             selector.find(".food-service").css("display", "none");
    //             selector.find(".at-home").detach().insertBefore(selector.find(".food-service"));
    //         });

    //         $(".brand-selector").mouseleave(function (e) {
    //             e.stopPropagation();
    //             $(this).find(".at-home-hover").fadeTo("slow", 0);
    //             $(this).find(".at-home").css("z-index", "10");
    //             $(this).find(".at-home-hover").css("z-index", "0");
    //             $(this).find(".other").css("z-index", "10");


    //             if (flag) {
    //                 $(this).find(".at-home").detach().insertAfter($(this).find(".food-service"));
    //                 $(this).find(".food-service").css("display", "block");
    //                 flag = 0;
    //             }
    //         });
    //     } else {
    //         at_home.off("mouseenter");
    //         $(".brand-selector").off("mouseleave");
    //     }
    // }
    // brand_selector_at_home();
    //  function brand_selector_food_service() {
    //     var window_width = $(window).width();
    //     var food_service = $(".brand-selector .food-service");

    //     if (window_width > 767) {
    //         food_service.mouseenter(function () {
    //             var selector = $(this).closest(".brand-selector");
    //             selector.find(".food-service").css("z-index", "10");
    //             selector.find(".food-service-hover").css("z-index", "10");
    //             selector.find(".food-service-hover").fadeTo("slow", 2000);

    //             //   toggle slide
    //             //selector.find('.food-service-hover').toggle( "slide", 'right', 2000 );

    //             //animate + show
    //             //   selector.find('.food-service-hover').animate({width: 'toggle'});
    //             //   selector.find('.food-service-hover').show("slide", { direction: "left" }, 1000);

    //             selector.find(".at-home").css("z-index", "0");
    //             selector.find(".at-home-hover").css("z-index", "0");
    //             selector.find(".other").css("z-index", "0");
    //         });

    //         $(".brand-selector").mouseleave(function () {
    //             $(this).find(".food-service-hover").fadeTo("slow", 1);
    //             $(this).find(".at-home").css("z-index", "10");
    //             selector.find(".other").css("z-index", "10");
    //             $(this).find(".food-service-hover").css("z-index", "0");
    //         });
    //     } else {
    //         food_service.off("mouseenter");
    //         $(".brand-selector").off("mouseleave");
    //     }
    // }


    // This function is not used any more. This is to get data for gallery through http request
    function create_waterfall() {
        var waterfall = $(".waterfall");
        if (waterfall.length) {
            var window_width = $(window).width();
            var layout_size;

            // get post type from the first class of waterfall dom element
            var post_type = waterfall.attr("class").split(/\s+/)[0];

            var show_loading = true;

            if (show_loading) {
                waterfall.find(".waterfall-content").html(`<div class="loading"></div>`);
            }

            $.getJSON(siteData.root_url + "/wp-json/wp/v2/" + post_type + "?per_page=100", (items) => {
                if (window_width > 1500) {
                    items_part = items.slice(0, 12);
                    layout_size = "xl-size";
                } else if (window_width > 1200) {
                    items_part = items.slice(0, 10);
                    layout_size = "lg-size";
                } else {
                    items_part = items.slice(0, 8);
                    layout_size = "md-size";
                }

                var class_string = layout_size;

                var content = items_part
                    .map((item, index) => {
                        return `
    					${index % 2 === 0 ? `<div class="${layout_size + " col-container col-custom-5 col-custom-2 col-md-3"}">` : ""}
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
    			        ${index % 2 == 1 ? "</div>" : ""}
    			        
    			        `;
                    })
                    .join("");

                show_loading = false;

                waterfall.find(".waterfall-content").html(content);
            });
        }
    }

    function food_service_products_filter() {
        // external js: isotope.pkgd.js


        var $grid = $(".page-food-service-products .grid").isotope({
            itemSelector: ".element-item",
        });

        $grid.addClass('isotope--init')

        // filter functions
        var filterFns = {};
        // bind filter button click
        $(".filters-button-group").on("click", "button", function () {
            var filterValue = $(this).attr("data-filter");
            // use filterFn if matches value
            //   filterValue = filterFns[ filterValue ] || filterValue;

            $grid.isotope({
                filter: filterValue
            });
        });

        var btn = $("#grid-view-more"),
            item = $(".grid .element-item"),
            itemVisible = $(".grid .element-item:visible"),
            itemHidden = $(".grid .element-item:hidden");

        console.log('Item visible', itemVisible)

        if (itemVisible.length < 12) {
            btn.hide()
        } else {
            $(".grid .element-item:nth-child(n+13)").hide()
        }

        btn.click(function (e) {
            e.preventDefault();

            itemHidden = $(".grid .element-item:hidden");
            itemHidden.slideDown()
            btn.hide()
            isotopeGridRearrange()
        });

        // change is-checked class on buttons
        $(".button-group").each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on("click", "button", function () {
                $buttonGroup.find(".is-checked").removeClass("is-checked");
                $(this).addClass("is-checked");

                var attr = $(this).attr('data-filter');
                console.log('attr', attr)
                if (attr == '*' && item.length > 12) {
                    console.log('attr true')
                    $(".grid .element-item:nth-child(n+13)").hide();
                    btn.show()
                    isotopeGridRearrange()
                } else {
                    console.log('attr true')
                    btn.hide()
                    isotopeGridRearrange()
                }
            });
        });
    }

    function isotopeGridRearrange() {
        $('.grid.isotope--init').isotope('reloadItems').isotope({ filter: '*'});
    }

    // function inspirationFilter() {
    //     var qsRegex;

    //     var $grid = $(".inspiration__page .grid").isotope({
    //         itemSelector: ".element-item",
    //     });

    //     $grid.addClass('isotope--init')

    //     // filter functions
    //     var filterFns = {};
    //     // bind filter button click
    //     $(".inspiration__page .filters-button-group").on("click", "button", function () {
    //         var filterValue = $(this).attr("data-filter");
    //         // use filterFn if matches value
    //         //   filterValue = filterFns[ filterValue ] || filterValue;

    //         $grid.isotope({
    //             // filter: filterValue,
    //             filter: function () {
    //                 return qsRegex ? $(this).text().match(qsRegex) : true && filterValue;
    //             }
    //         });
    //     });

    //     var btn = $(".inspiration__page #grid-view-more"),
    //         item = $(".inspiration__page .grid .element-item"),
    //         itemVisible = $(".inspiration__page .grid .element-item:visible"),
    //         itemHidden = $(".inspiration__page .grid .element-item:hidden");

    //     console.log('Item visible', itemVisible)

    //     var $quicksearch = $('.grid__search').keyup(debounce(function () {
    //         qsRegex = new RegExp($quicksearch.val(), 'gi');
    //         $grid.isotope();
    //     }, 200));
    //     if (itemVisible.length < 12) {
    //         btn.hide()
    //     } else {
    //         $(".inspiration__page .grid .element-item:nth-child(n+13)").hide()
    //     }

    //     btn.click(function (e) {
    //         e.preventDefault();

    //         itemHidden = $(".inspiration__page .grid .element-item:hidden");
    //         itemHidden.slideDown()
    //         btn.hide()
    //         isotopeGridRearrange()
    //     });

    //     // change is-checked class on buttons
    //     $(".inspiration__page .button-group").each(function (i, buttonGroup) {
    //         var $buttonGroup = $(buttonGroup);
    //         $buttonGroup.on("click", "button", function () {
    //             $buttonGroup.find(".is-checked").removeClass("is-checked");
    //             $(this).addClass("is-checked");

    //             var attr = $(this).attr('data-filter');
    //             console.log('attr', attr)
    //             if (attr == '*' && item.length > 12) {
    //                 console.log('attr true')
    //                 $(".inspiration__page .grid .element-item:nth-child(n+13)").hide();
    //                 btn.show()
    //                 isotopeGridRearrange()
    //             } else {
    //                 console.log('attr true')
    //                 btn.hide()
    //                 isotopeGridRearrange()
    //             }
    //         });
    //     });

    //     // debounce so filtering doesn't happen every millisecond
    //     function debounce(fn, threshold) {
    //         var timeout;
    //         threshold = threshold || 100;
    //         return function debounced() {
    //             clearTimeout(timeout);
    //             var args = arguments;
    //             var _this = this;

    //             function delayed() {
    //                 fn.apply(_this, args);
    //             }
    //             timeout = setTimeout(delayed, threshold);
    //         };
    //     }
    // }

    function inspirationFilter() {
        // external js: isotope.pkgd.js

        // store filter for each group
        var buttonFilters = {};
        var buttonFilter;
        // quick search regex
        var qsRegex;

        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            filter: function () {
                var $this = $(this);
                var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
                return searchResult && buttonResult;
            },
        });

        $grid.addClass('isotope--init')

        $('.filter__wrap').on('click', '.button', function () {
            var $this = $(this);
            // get group key
            var $buttonGroup = $this.parents('.button-group');
            var filterGroup = $buttonGroup.attr('data-filter-group');
            // set filter for group
            buttonFilters[filterGroup] = $this.attr('data-filter');
            // combine filters
            buttonFilter = concatValues(buttonFilters);
            // Isotope arrange
            $grid.isotope();
        });

        // use value of search field to filter
        var $quicksearch = $('#grid__search').keyup(debounce(function () {
            qsRegex = new RegExp($quicksearch.val(), 'gi');
            $grid.isotope();
        }));

        // change is-checked class on buttons
        $('.button-group').each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function () {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });

        // flatten object by concatting values
        function concatValues(obj) {
            var value = '';
            for (var prop in obj) {
                value += obj[prop];
            }
            return value;
        }

        // debounce so filtering doesn't happen every millisecond
        function debounce(fn, threshold) {
            var timeout;
            threshold = threshold || 100;
            return function debounced() {
                clearTimeout(timeout);
                var args = arguments;
                var _this = this;

                function delayed() {
                    fn.apply(_this, args);
                }
                timeout = setTimeout(delayed, threshold);
            };
        }

    }

    function gallery_lightbox() {
        var lightbox = $(".masonry .lightbox");
        var item = $(".masonry .item");
        item.click(function () {
            console.log("uuu");
            $(this).find(".lightbox").css("display", "flex");
        });

        lightbox.click(function (e) {
            e.stopPropagation();
            $(this).css("display", "none");
        });
    }

    //check if group div needs to be removed, all the window widths need to be consistent with the one in _gallery.scss
    // 		function get_group_number_tile_283(window_width){
    // 		    var group_number = 0;
    //     	    if(window_width > 2040){
    //     	          group_number = 7;
    //     	      }else if(window_width > 1760){
    //     	          group_number = 6;
    //     	      }else if(window_width > 1475){
    //     	          group_number = 5;
    //     	      }else if(window_width > 1200){
    //     	          group_number = 4;
    //     	      }else if(window_width > 910){
    //     	          group_number = 3;
    //     	      }else if(window_width > 626){
    //     	          group_number = 2;
    //     	      }else if(window_width > 300){
    //     	          group_number = 1;
    //     	      }

    //     	      return group_number;
    // 		}

    function get_group_number(window_width) {
        var group_number = 0;
        if (window_width > 2116) {
            group_number = 5;
        } else if (window_width > 1696) {
            group_number = 4;
        } else if (window_width > 1276) {
            group_number = 3;
        } else if (window_width > 856) {
            group_number = 2;
        } else {
            group_number = 1;
        }

        return group_number;
    }

    function create_waterfall_layout_three_rows($container, new_items) {
        var window_width = $(window).width();
        var group_number = get_group_number(window_width);
        var new_groups = "";

        $container.html("");

        if (new_items.length < group_number + 1) {
            $container.append(new_items);
        } else if (new_items.length < group_number * 3 && new_items.length >= group_number * 2) {
            var three_item_group_number = new_items.length % group_number; //calculate how many groups that contain three items
            var arr_three = new_items.slice(0, three_item_group_number * 3);
            var arr_two = new_items.slice(arr_three.length, arr_three.length + ((new_items.length - arr_three.length) / 2) * 2);
            var arr_rest = new_items.slice(arr_three.length + arr_two.length);

            for (var i = 0; i < arr_three.length; i++) {
                if (i % 3 == 0) {
                    new_groups += '<div class="group">';
                }
                new_groups += arr_three[i].prop("outerHTML");

                if (i % 3 == 2) {
                    new_groups += "</div>";
                }
            }

            for (var i = 0; i < arr_two.length; i++) {
                if (i % 2 == 0) {
                    new_groups += '<div class="group">';
                }
                new_groups += arr_two[i].prop("outerHTML");

                if (i % 2 == 1) {
                    new_groups += "</div>";
                }
            }

            $container.html(new_groups);
            $container.append(arr_rest);
        } else if (new_items.length < group_number * 2 && new_items.length > group_number) {
            var arr = new_items.slice(0, (new_items.length - group_number) * 2);
            var arr_rest = new_items.slice((new_items.length - group_number) * 2);

            for (var i = 0; i < arr.length; i++) {
                if (i % 2 == 0) {
                    new_groups += '<div class="group">';
                }
                new_groups += arr[i].prop("outerHTML");

                if (i % 2 == 1) {
                    new_groups += "</div>";
                }
            }

            $container.html(new_groups);
            $container.append(arr_rest);
        } else {
            var arr = new_items.slice(0, group_number * 3);
            for (var i = 0; i < arr.length; i++) {
                if (i % 3 == 0) {
                    new_groups += '<div class="group">';
                }
                new_groups += arr[i].prop("outerHTML");

                if (i % 3 == 2) {
                    new_groups += "</div>";
                }
            }

            $container.html(new_groups);
        }
    }

    function no_filter_waterfall() {
        var item = $(".no_filter_waterfall .item");
        var new_items = [];

        item.each(function () {
            new_items.push($(this));
        });

        create_waterfall_layout_three_rows($(".no_filter_waterfall"), new_items);
    }

    function filter_gallery() {
        var url = window.location.href;
        var query_type = "";
        var query_sort = "";
        var query_filter = "";
        var button = $("form .button-group button");

        if (url.indexOf("?") > -1) {
            query_type = url.split("?")[1].split("=")[0];
            if (query_type == "sort") {
                query_sort = url.split("?")[1].split("=")[1];
            } else {
                query_filter = url.split("?")[1].split("=")[1];
            }
        }

        var item = $(".gallery .item");

        button.click(function () {
            this.form.submit();
        });

        //search by type of seafood
        if (query_sort) {
            var new_items = [];
            var filter = query_sort;

            item.filter(function () {
                if (filter == "all") {
                    new_items.push($(this));
                } else {
                    //get class list on each .item
                    var classList = $(this).attr("class").split(/\s+/);

                    if (classList.indexOf(filter) > -1) {
                        new_items.push($(this));
                    }
                }
            });

            create_waterfall_layout_three_rows($(".gallery"), new_items);
        }

        //search by recipe or ingredient
        if (query_filter) {
            query_filter = query_filter.toLowerCase();
            var new_items = [];

            item.filter(function () {
                var title = $(this).find("h3.title-s").text().toLowerCase();

                if (title.indexOf(query_filter) > -1) {
                    new_items.push($(this));
                }
            });

            create_waterfall_layout_three_rows($(".gallery"), new_items);
        }
    }

    function view_more_galleries() {
        var btn = $("#gallery-view-more"),
            item = $(".masonry .item"),
            itemHidden = $(".masonry .item:hidden");

        if (btn.length === 0) {
            return;
        }

        if (item.length < 12) {
            btn.hide()
        }

        btn.click(function (e) {
            e.preventDefault();
            itemHidden.each(function () {
                // console.log(item);
                $(this).slideDown()
            });
            btn.slideUp()
        });
    }

    function filter_gallery_masonry() {
        var url = window.location.href;
        var query_type = "";
        var query_sort = "";
        var query_filter = "";
        var button = $("form .button-group button");

        if (url.indexOf("?") > -1) {
            query_type = url.split("?")[1].split("=")[0];
            if (query_type == "sort") {
                query_sort = url.split("?")[1].split("=")[1];
            } else {
                query_filter = url.split("?")[1].split("=")[1];
            }
        }

        var item = $(".masonry .item");

        button.click(function () {
            this.form.submit();
        });

        //search by type of seafood
        if (query_sort) {
            var new_items = [];
            var filter = query_sort;

            item.filter(function () {
                if (filter == "all") {
                    new_items.push($(this));
                } else {
                    //get class list on each .item
                    var classList = $(this).attr("class").split(/\s+/);

                    if (classList.indexOf(filter) > -1) {
                        new_items.push($(this));
                    }
                }
            });

            // create_waterfall_layout_three_rows($('.gallery'), new_items);

            $(".masonry").html(new_items);
        }

        //search by recipe or ingredient
        if (query_filter) {
            query_filter = query_filter.toLowerCase();
            var new_items = [];

            item.filter(function () {
                var title = $(this).find("h3.title-s").text().toLowerCase();

                if (title.indexOf(query_filter) > -1) {
                    new_items.push($(this));
                }
            });

            // create_waterfall_layout_three_rows($('.gallery'), new_items);
            $(".masonry").html(new_items);
        }
    }

    function food_service_loadmore() {
        $(function () {
            $(".element-item").slice(0, 4).show();
            $("body").on("click touchstart", ".load-more", function (e) {
                e.preventDefault();
                $(".element-item:hidden").slice(0, 4).slideDown();
                if ($(".element-item:hidden").length == 0) {
                    $(".load-more").css("visibility", "hidden");
                }
                $("html,body").animate({
                        scrollTop: $(this).offset().top,
                    },
                    1000
                );
            });
        });
    }

    function wipeAnimation() {
        $('.wipe-animation').each(function () {
            var scrollTarget = $(this),
                scrollTargetVal = scrollTarget.offset().top - ($(window).height() / 2);

            $(window).scroll(function () {
                if ($(window).scrollTop() > scrollTargetVal) {
                    scrollTarget.addClass('active')
                }
            })
        })
    }

    $(".header.header .top-menu ul li").hover(
        function () {
            $(this).addClass("mega-menu-show");
        },
        function () {
            $(this).removeClass("mega-menu-show");
        }
    );

    function waterFallLayout() {
        var btn = $('#waterfall-view-more');

        $('.waterfall.no_filter_waterfall .item').unwrap();
        $('.waterfall.no_filter_waterfall').wrapInner('<div class="group"></div>');

        if ($('.waterfall.no_filter_waterfall .item').length <= 12) {
            btn.hide()
        }

        btn.click(function (e) {
            e.preventDefault()
            $('.waterfall.no_filter_waterfall .item:hidden').slideDown();
            $(this).hide()
        })
    }

    function showMoreSome() {
        var btn = $('.show-more--4');
        
        if ($('.waterfall.no_filter_waterfall .item').length <= 12) {
            btn.hide()
        }

        btn.click(function (e) {
            e.preventDefault()
            $('.waterfall.no_filter_waterfall .item:hidden').slice(0, 4).slideDown(function(){
                if($('.waterfall.no_filter_waterfall .item:hidden').length==0){
                    btn.hide()
                }
            });
            
        })
    }
})(jQuery);