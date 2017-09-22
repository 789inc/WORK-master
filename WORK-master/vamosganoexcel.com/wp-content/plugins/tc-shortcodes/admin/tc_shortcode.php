<?php



// Speakers shortcode
add_shortcode('speakers', 'shortcode_speakers');
function shortcode_speakers($atts, $content=null){
    global $tc_options;
    $speakers_layout = $tc_options['speakers_layout'];
    
    $atts = shortcode_atts(
        array(        
        'class'  => '',
		'filter_tag'  => '',
    ), $atts);
    $html ='';
    $html .= '<div class="speakers">';
    $html .='<div class="row '.$atts['class'].'">';
        $args = array('post_type' => 'speaker','posts_per_page'=> $tc_options['speakers_item_count'], 'tag'=> $atts['filter_tag'], 'order' =>'ASC');
        $speakers = new WP_QUery($args);
        global $post; $i=0;
        if($speakers->have_posts()):
            while($speakers->have_posts()): $speakers->the_post();

            $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());            
            $speaker_job = get_post_meta($post->ID, "_cmb_speaker_job", true);
			$speaker_company = get_post_meta($post->ID, "_cmb_speaker_company", true);

            $speaker_facebook_address = get_post_meta($post->ID, "_cmb_speaker_fb_address", true);
            $speaker_twitter_address = get_post_meta($post->ID, "_cmb_speaker_tw_address", true);
			$speaker_googleplus_address = get_post_meta($post->ID, "_cmb_speaker_gplus_address", true);
            $speaker_linkedin_address = get_post_meta($post->ID, "_cmb_speaker_in_address", true);
            $speakers_layout_5 = '';    
            if($speakers_layout == 'col-md-2 col-sm-6 col-5' && ($i==0 || $i == 5)){
                    $speakers_layout_5 = 'col-lg-offset-1 col-md-offset-1';
            }
            if($i==5) $i=0; $i++;

                $html .= '<div class="'.$speakers_layout.' '.$speakers_layout_5.'">
                    <div class="speaker-thumb">
						<figure class="effect-ming">
							<img class="img-responsive" src="'.$thumbnail_url.'" alt="">
							<figcaption>
								<span><a class="html-popup" href="'.get_permalink().'"><img class="img-responsive" src="'.get_template_directory_uri().'/img/plus.png" alt="plus"></a></span>
							</figcaption>			
						</figure>
						<div class="caption text-center">
							<h4>'.get_the_title().'</h4>
							<p class="company">'.$speaker_company.'</p>
						</div>
                    </div>
                </div>';

            endwhile;
        endif;   

    $html .= '</div></div>';
    return $html;
}



if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Speakers List", 'TEXT_DOMAIN'),
   "base" => "speakers",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_speaker.png',
   "description" => __('Add speakers layout','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("class ",'TEXT_DOMAIN'),
         "param_name" => "class ",
         "value" => "",
         "description" => __('Other Options in: Eventr Options > Speakers settings','TEXT_DOMAIN'),
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Filter by tag",'TEXT_DOMAIN'),
         "param_name" => "filter_tag",
         "value" => "speaker",
		 "description" => __('Such as speaker, chair, keynote','TEXT_DOMAIN'),
    )
     
   )
) );

}


// Button shortcode
add_shortcode('button', 'shortcode_button');
function shortcode_button($atts, $content = null) {
    $atts = shortcode_atts(
        array(
		'size' => '',
		'style' => '',
        'position' => 'center',
        'href'  => '#',
		'target' =>'',    
        'class' => '',       
    ), $atts);
    $html ='';
	$size = '';
    if($atts['size'] == 'xsmall') $size = 'button-xsmall';
    if($atts['size'] == 'small') $size  = 'button-small';
	if($atts['size'] == 'medium') $size  = 'button-medium';
    if($atts['size'] == 'big') $size  = 'button-big';
	$style = '';
    if($atts['style'] == 'light') $style = 'button-line-light';
    if($atts['style'] == 'dark') $style = 'button-line-dark';
    $position = '';
    if($atts['position'] == 'left') $position = 'pull-left';
    if($atts['position'] == 'right') $position = 'pull-right';
    if($atts['position'] == 'center') $position = 'text-center';
	$target = '';
    if($atts['target'] == 'yes') $target = '"_blank"';
    if($atts['target'] == 'no') $target = '"_self"';
	

    $html .= '<div class="'.$position.'"><a class="button '.$size.' '.$style.' '.$atts['class'].'" href="'.$atts['href'].'" target="'.$atts['target'].'">'.do_shortcode($content).'</a>';
	$html .= '</div>';
    return $html;
}

if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Button", 'TEXT_DOMAIN'),
   "base" => "button",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_button.png',
   "description" => __('Add button','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Button Size",'TEXT_DOMAIN'),
         "param_name" => "size",
         "value" => array(   
                __('xsmall', 'TEXT_DOMAIN') => 'xsmall',
                __('small', 'TEXT_DOMAIN') => 'small',
                __('medium', 'TEXT_DOMAIN') => 'medium',
				__('big', 'TEXT_DOMAIN') => 'big',
                ),
    ),
	array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Style",'TEXT_DOMAIN'),
         "param_name" => "style",
         "value" => array(   
                __('light', 'TEXT_DOMAIN') => 'light',
                __('dark', 'TEXT_DOMAIN') => 'dark',
                ),
    ),
    array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Position",'TEXT_DOMAIN'),
         "param_name" => "position",
         "value" => array(   
                __('center', 'TEXT_DOMAIN') => 'center',
                __('left', 'TEXT_DOMAIN') => 'left',
                __('right', 'TEXT_DOMAIN') => 'right',
                ),
    ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Href",'TEXT_DOMAIN'),
         "param_name" => "href",
         "value" => "#",
    ),
	array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Open link in new window",'TEXT_DOMAIN'),
         "param_name" => "target",
         "value" => array(   
                __('yes', 'TEXT_DOMAIN') => '_blank',
                __('no', 'TEXT_DOMAIN') => '_self',
                ),
    ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class",'TEXT_DOMAIN'),
         "param_name" => "class",
         "value" => "",
    ),
    array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'TEXT_DOMAIN'),
         "param_name" => "content",
         "value" => "",
    )

   )
) );

}


// Modal Box shortcode
add_shortcode('modalbox', 'shortcode_modalbox');
function shortcode_modalbox($atts, $content = null) {
    $atts = shortcode_atts(
        array(
		'modal_id' => '',
		'size' => '',
		'style' => '',
        'position' => 'center',
        'class' => '',
		'button_text' =>'',
		'form_title' => '',
		'form_desc' => '',       
    ), $atts);
    $html ='';
	$size = '';
    if($atts['size'] == 'xsmall') $size = 'button-xsmall';
    if($atts['size'] == 'small') $size  = 'button-small';
	if($atts['size'] == 'medium') $size  = 'button-medium';
    if($atts['size'] == 'big') $size  = 'button-big';
	$style = '';
    if($atts['style'] == 'light') $style = 'button-line-light';
    if($atts['style'] == 'dark') $style = 'button-line-dark';
    $position = '';
    if($atts['position'] == 'left') $position = 'pull-left';
    if($atts['position'] == 'right') $position = 'pull-right';
    if($atts['position'] == 'center') $position = 'text-center';
	

    $html .= '<div class="'.$position.'"><button class="button '.$size.' '.$style.' '.$atts['class'].'" data-toggle="modal" data-target="#modal-'.$atts['modal_id'].'" >'.$atts['button_text'].'</button></div>';
	$html .= '<div id="modal-'.$atts['modal_id'].'" class="modal contact-modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h2 class="modal-title" id="myModalLabel">'.$atts['form_title'].'</h2>
					<p>'.$atts['form_desc'].'</p>
				  </div>
				  <div class="modal-body">'.do_shortcode($content).'</div>
				</div>
			  </div>';
	$html .= '</div>';
	
	
    return $html;
}

if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Modal Box", 'TEXT_DOMAIN'),
   "base" => "modalbox",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_button.png',
   "description" => __('Add modal box','TEXT_DOMAIN'),
   "params" => array(
   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Modal ID",'TEXT_DOMAIN'),
         "param_name" => "modal_id",
         "value" => "",
    ),
    array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Button Size",'TEXT_DOMAIN'),
         "param_name" => "size",
         "value" => array(   
                __('xsmall', 'TEXT_DOMAIN') => 'xsmall',
                __('small', 'TEXT_DOMAIN') => 'small',
                __('medium', 'TEXT_DOMAIN') => 'medium',
				__('big', 'TEXT_DOMAIN') => 'big',
                ),
    ),
	array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Style",'TEXT_DOMAIN'),
         "param_name" => "style",
         "value" => array(   
                __('light', 'TEXT_DOMAIN') => 'light',
                __('dark', 'TEXT_DOMAIN') => 'dark',
                ),
    ),
    array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Position",'TEXT_DOMAIN'),
         "param_name" => "position",
         "value" => array(   
                __('center', 'TEXT_DOMAIN') => 'center',
                __('left', 'TEXT_DOMAIN') => 'left',
                __('right', 'TEXT_DOMAIN') => 'right',
                ),
    ),
     array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Form title",'TEXT_DOMAIN'),
         "param_name" => "form_title",
         "value" => "",
    ),
	array(
         "type" => "textarea",
         "class" => "",
         "heading" => __("Form description",'TEXT_DOMAIN'),
         "param_name" => "form_desc",
         "value" => "",
    ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Button text",'TEXT_DOMAIN'),
         "param_name" => "button_text",
         "value" => "",
    ),
	array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content",'TEXT_DOMAIN'),
         "param_name" => "content",
         "value" => "",
    )

   )
) );

}


// Custom Header
add_shortcode('header', 'shortcode_header');
function shortcode_header($atts, $content = null) {
    $atts = shortcode_atts(
        array(
		'title' => '',
		'element_tag' => 'h1',
		'position' => '',
		'color' => '',
		'subtitle' => '',
		'subtitle_color' => '',
        
    ), $atts);
	
	
    $html ='';
    $position = '';
		if($atts['position'] == 'left') $position = 'text-left';
		if($atts['position'] == 'right') $position = 'text-right';
		if($atts['position'] == 'center') $position = 'text-center';
	
	$element_tag = '';

		if($atts['element_tag'] == 'h1') $element_tag = 'h1';
		if($atts['element_tag'] == 'h2') $element_tag = 'h2';
		if($atts['element_tag'] == 'h3') $element_tag = 'h3';
		if($atts['element_tag'] == 'h4') $element_tag = 'h4';
		if($atts['element_tag'] == 'h5') $element_tag = 'h5';
		if($atts['element_tag'] == 'h6') $element_tag = 'h6';
	
		
	
	$html .= '<div class="custom-header">';
	$html .= '<'.$atts['element_tag'].' class="'.$atts['position'].'" style="color:'.$atts['color'].';">'.$atts['title'].'</'.$atts['element_tag'].'>';
	
	if($atts['subtitle']) {
		$html .= '<p class="lead '.$atts['position'].'" style="color:'.$atts['subtitle_color'].'; ">'.$atts['subtitle'].'</p>'; }
	
		$html .= '</div>';
    return $html;
}

if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Header", 'TEXT_DOMAIN'),
   "base" => "header",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_header.png',
   "description" =>__( "Add custom header",'TEXT_DOMAIN'),
   "params" => array(
   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title",'TEXT_DOMAIN'),
         "param_name" => "title",
    ),
	array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Element tag",'TEXT_DOMAIN'),
         "param_name" => "element_tag",
         "value" => array(
                ('h1') => 'h1',
				('h2') => 'h2',
				('h3') => 'h3',
				('h4') => 'h4',
				('h5') => 'h5',
				('h6') => 'h6',
                ),
    ),
    array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Position",'TEXT_DOMAIN'),
         "param_name" => "position",
         "value" => array( 
                __('left', 'TEXT_DOMAIN') => 'text-left',
                __('right', 'TEXT_DOMAIN') => 'text-right',
				__('center', 'TEXT_DOMAIN') => 'text-center'
				),
    ),
	array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Text color",'TEXT_DOMAIN'),
            "param_name" => "color",
            "value" => '#262626', 
            "description" => __("Choose text color",'TEXT_DOMAIN')
        ),
	array(
         "type" => "textarea",
         "class" => "",
         "heading" => __("Subtitle",'TEXT_DOMAIN'),
         "param_name" => "subtitle",
    	),
	array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __("Subtitle color",'TEXT_DOMAIN'),
            "param_name" => "subtitle_color",
            "value" => '#999999', 
            "description" => __("Choose Subtitle color",'TEXT_DOMAIN')
        ),
   )
) );

}


// Feature shortcode
add_shortcode('feature', 'shortcode_feature');
function shortcode_feature($atts, $content=null){
    $atts = shortcode_atts(
        array(
        'iconfont'  => 'pe-4x pe-7s-refresh-2',
		'icon_color'=>'', 
        'title'     => 'The title',
		'title_color'=>'',
		'align' => 'center',  
		'class' => ''    
    ), $atts);
    $html ='';
	$align = '';
    if($atts['align'] == 'left') $align = 'text-left';
    if($atts['align'] == 'right') $align = 'text-right';
    if($atts['align'] == 'center') $align = 'text-center';
	
    $html .= '<div class="feature '.$align.' '.$atts['class'].'">
				<i style="color:'.$atts['icon_color'].'" class="'.$atts['iconfont'].'"></i>
				<h4 style="color:'.$atts['title_color'].'">'.$atts['title'].'</h4>
				<p>'.do_shortcode($content).'</p>
			  </div>';
    return $html;                        
}

if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Feature", 'TEXT_DOMAIN'),
   "base" => "feature",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_feature.png',
   "description" => __('Add an infobox to site','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title",'TEXT_DOMAIN'),
         "param_name" => "title",
         "value" => "The title",
      ),
	array(
         "type" => "colorpicker",
         "class" => "",
         "heading" => __("Title Color",'TEXT_DOMAIN'),
         "param_name" => "title_color",
         "value" => "#262626",
      ),
    array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Iconfont",'TEXT_DOMAIN'),
         "param_name" => "iconfont",
         "value" => "fa-calendar",
         "description" => __('Insert from Stroke 7 Icon Font.','TEXT_DOMAIN'),
      ),  
	  array(
         "type" => "colorpicker",
         "class" => "",
         "heading" => __("Icon Color",'TEXT_DOMAIN'),
         "param_name" => "icon_color",
         "value" => "#fac42b",
      ),     
	  array(
		 "type" => "textarea",
		 "holder" => "div",
		 "class" => "",
		 "heading" => __("Content",'TEXT_DOMAIN'),
		 "param_name" => "content",
		 "value" => "",
	  ),
	   array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Alignment",'TEXT_DOMAIN'),
         "param_name" => "align",
         "value" => array(   
                __('center', 'TEXT_DOMAIN') => 'center',
                __('left', 'TEXT_DOMAIN') => 'left',
                __('right', 'TEXT_DOMAIN') => 'right',
                ),
    ),
	  
     
   )
) );

}


// Custom Gallery shortcode
add_shortcode('tcgallery', 'shortcode_tcgallery');
function shortcode_tcgallery($atts, $content=null){
    $atts = shortcode_atts(
        array(
        'class'  	=> '',
		'images'	=> '',
		
    ), $atts);
	
	$img = $atts['images'];	
	$images = explode( ',', $img );
		
	
	$html ='';
	$html .= '<div id="timeline" data-columns>';
	
	 foreach ($images as $key => $value) {
		 $image = wp_get_attachment_image_src(trim($value), 'full');
	
	$html .= '<div class="item wrap">
				<img class="img-responsive"  src="'.$image[0].'" alt="">
				<div class="overlay"></div>
					<div class="icon">
					<a class="image-popup" href="'.$image[0].'" ><i class="pe-3x pe-7s-plus"></i></a>
				</div>
			</div>';
	
	 }
	$html .= '</div>';
	return $html;                      
}

if(function_exists('vc_map')){

vc_map( array(
   "name" => __("ThemeCube Gallery", 'TEXT_DOMAIN'),
   "base" => "tcgallery",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_gallery.png',
   "description" => __('Add custom gallery','TEXT_DOMAIN'),
   "controls" => "full",
   "params" => array(
   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Class",'TEXT_DOMAIN'),
         "param_name" => "class",
         "value" => "",
      ),
    array(
         "type" => "attach_images",
         "class" => "",
		 "holder" => "img",
         "heading" => __("Images",'TEXT_DOMAIN'),
         "param_name" => "images",
         "value" => "",
      ),

     
   )
) );

}


// Funfacts shortcode
add_shortcode('funfact', 'shortcode_funfact');
function shortcode_funfact($atts, $content=null){
    $atts = shortcode_atts(
        array(
        'iconfont'  	=> '',
		'counter'  		=> '',
		'countertitle'	=> '',
		'class'			=> '',
		      
    ), $atts);
	
    $html ='';
    $html .= '<div class="item'.$atts['class'].'">
				<i class="pe pe-4x '.$atts['iconfont'].'"></i>
				<div class="desc">
					<p class="number">'.$atts['counter'].'</p>
					<p class="description">'.$atts['countertitle'].'</p>
				</div>
			  </div>';
    return $html;                        
}

if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Funfact", 'TEXT_DOMAIN'),
   "base" => "funfact",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_funfact.png',
   "description" => __('Add fun facts','TEXT_DOMAIN'),
   "params" => array(
   array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Iconfont",'TEXT_DOMAIN'),
         "param_name" => "iconfont",
         "value" => " ",
         "description" => __('Insert from Stroke 7 Icon Font.','TEXT_DOMAIN'),
      ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Counter",'TEXT_DOMAIN'),
         "param_name" => "counter",
         "value" => "",
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Counter title",'TEXT_DOMAIN'),
         "param_name" => "countertitle",
         "value" => "",
      ),  
     
   )
) );

}


// Schedule shortcode
add_shortcode('schedule', 'shortcode_schedule');
function shortcode_schedule($atts, $content=null){
    global $tc_options;
    $atts = shortcode_atts(
        array(
        'class'     => '',
    ), $atts);
    $html ='';
    $html .= '<ul id="myTab" class="nav nav-tabs" role="tablist">';
                        
	$args_term = array('order' =>'ASC');
	$schedules_date = get_terms('date', $args_term);
	
    $i = 0;
    foreach($schedules_date as $schedule_date) {
        $schedule_active = '';
        if($i == 0){$schedule_active = 'active'; $i++;}
        $html .='<li role="presentation" class="'.$schedule_active.'">
                        <a href="#'.$schedule_date->slug.'" id="'.$schedule_date->slug.'-tab" role="tab" data-toggle="tab" aria-controls="'.$schedule_date->slug.'" aria-expanded="true">
                            '.$schedule_date->name.'
                        </a>
                </li>';
    }
    $html .='</ul>';
	
    $html .= '<div id="myTabContent" class="tab-content '.$atts['class'].'">'; //content başlangıcı
    $d = 0;
    foreach($schedules_date as $schedule_date) {

        $schedule_active1 = '';
        $k = 0;
        if($d == 0){$schedule_active1 = 'active'; $d++;}

        $html .= '<div role="tabpanel" class="tab-pane fade in '.$schedule_active1.'" id="'.$schedule_date->slug.'" aria-labelledby="'.$schedule_date->slug.'-tab">
                <div id="accordion-'.$schedule_date->slug.'" class="panel-group" role="tablist" aria-multiselectable="true">';


                $args = array('post_type' => 'schedule','date'=>$schedule_date->slug, 'posts_per_page'=>'-1', 'orderby'=>'date', 'order'=>'ASC');
                $schedule = new WP_QUery($args);
                global $post;

                if($schedule->have_posts()):
                    while($schedule->have_posts()): $schedule->the_post();

                    $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
                    $program_time = get_post_meta($post->ID, "_cmb_program_time", true);
					$program_duration = get_post_meta($post->ID, "_cmb_program_duration", true);
					$program_location = get_post_meta($post->ID, "_cmb_program_location", true);
					$program_level = get_post_meta($post->ID, "_cmb_program_level", true);
                    $speaker_name = get_post_meta($post->ID, "_cmb_speaker_name", true);
					$speaker_short_bio = get_post_meta($post->ID, "_cmb_speaker_short_bio", true);
					$speaker_url = get_post_meta($post->ID, "_cmb_speaker_url", true);

                    

        $html .= '<div class="panel panel-default">
                    
                    <div class="panel-heading" role="tab" id="heading-'.get_the_ID().'">
						<div class="row">
							<div class="col-lg-1 col-md-1 col-sm-1">
							<p class="date">'.$program_time.'</p>
							</div>
							
							<div class="col-lg-11 col-md-11 col-sm-11">
								
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#'.get_the_ID().'" aria-expanded="true" aria-controls="'.get_the_ID().'">
									'.get_the_title().'
									</a>
								</h4>
							</div>
						</div>
					</div>';

          $html .= '<div id="'.get_the_ID().'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="'.get_the_ID().'">
		  
										
						<div class="panel-body">
							<div class="row">';
							
							if($thumbnail_url){	
								$html .= '<div class="col-lg-2 col-md-2 col-sm-2">
									<img class="img-responsive img-circle" src="'.$thumbnail_url.'" alt="">
								</div>';}
								
								$html .= '<div class="col-lg-7 col-md-7 col-sm-10">
									<p class="speaker-name uppercase">'.$speaker_name.'</p>
									<h4>'.get_the_title().'</h4>
									<p>'.get_the_content().'</p>';
									
									if($program_duration){
										$html .= '<p><i class="fa fa-lg fa-clock-o"></i> <span class="small">'.$program_duration.'</span></p>';}
									if($program_location){
										$html .= '<p><i class="fa fa-lg fa-map-marker"></i> <span class="small">'.$program_location.'</span></p>';}
									if($program_level){
										$html .= '<p><i class="fa fa-lg fa-signal"></i> <span class="small">'.$program_level.'</span></p>';}					
								$html .= '	
																							
								</div>
								
								<div class="col-lg-3 col-md-3 col-sm-10">';
									if($speaker_name){
									$html .= '<h5>'.$speaker_name.'</h5>';}
									
									if($speaker_short_bio){
									$html .= '<p class="small">'.$speaker_short_bio.'</p>';}
									
									if($speaker_url){
										$html .= '<span class="about-speaker"><i class="fa fa-lg fa-globe"></i> <a class="small" href="'.$speaker_url.'">'.$speaker_url.'</a></span>';}
														
			$html .= '
								</div>
								
							</div>
						</div>';
                                                                   
                           
			 $html .= '</div></div>';

                endwhile;
                endif;

       
		$html .= '</div></div>';
    }    
    
    return $html;                        
}


if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Schedule", 'TEXT_DOMAIN'),
   "base" => "schedule",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_schedule.png',
   "description" =>__( 'Add schedule layout','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class",'TEXT_DOMAIN'),
         "param_name" => "class",
         "value" => "",
      )
     
   )
) );

}


// Carousel shortcode
add_shortcode('carousel', 'shortcode_carousel');
function shortcode_carousel($atts, $content=null){

    $atts = shortcode_atts(
        array(        
        'id'    		=> '', 
        'slidecount'    => '5',
        'playdelay'     => 'false',
		'singleitem'	=> 'false',       
    ), $atts);
    $html ='';

    $html ='';
    $html .='<div id="'.$atts['id'].'-carousel">'.do_shortcode( $content ).'</div>';
    $html .='<script>
            jQuery(document).ready(function($){
                $("#'.$atts['id'].'-carousel").owlCarousel({
                    itemsCustom : [
						[0, 1],
						[450, 1],
						[600, 2],
						[700, 3],
						[1000, '.$atts['slidecount'].'],
						[1200, '.$atts['slidecount'].'],
						],
                    autoPlay: '.$atts['playdelay'].',                    
                    pagination: false
                });
            });
        </script>';
	return $html;
}

// Sponsor item
add_shortcode('sponsor', 'shortcode_sponsor');
function shortcode_sponsor($atts, $content=null){
    
    $atts = shortcode_atts(
        array(
        'img_url'   =>'',
        'href'      =>'',
        'alt'       =>'', 
        'class'     =>'',
    ), $atts);
    $html ='';

    if(wp_get_attachment_image_src($atts['img_url'], 'full')){
        $obj_thumbnail = wp_get_attachment_image_src($atts['img_url'], 'full');
        $thumbnail = $obj_thumbnail['0'];
    }else if($atts['img_url']!= ''){
        $thumbnail = $atts['img_url'];
    }

    if($atts['href'] != ''){
        $html .='<div class="sponsor '.$atts['class'].'"><a href="'.$atts['href'].'"><img class="img-responsive" src="'.$thumbnail.'" alt="'.$atts['alt'].'"/></a></div>';

    }else{
        $html .='<div class="sponsor '.$atts['class'].'"><img class="img-responsive" src="'.$thumbnail.'" alt=""'.$atts['alt'].'/></div>';

    }
    
    return $html;
}


if(function_exists('vc_map')){

vc_map( array(
     "name" => __("Carousel", 'TEXT_DOMAIN'),
     "base" => "carousel",
     "as_parent" => array('only' => 'sponsor, pricing, hotel'),
     "js_view" => 'VcColumnView',
     "content_element" => true,
     "class" => "",
     "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
     "icon" => get_template_directory_uri().'/img/tc_icon/tc_carousel.png',
	 "description" => __('Add carousel','TEXT_DOMAIN'),
     "params" => array(

         array(
             "type" => "textfield",
             "class" => "",
             "heading" => __("ID",'TEXT_DOMAIN'),
             "param_name" => "id",
             "value"  => '',
          ),
          array(
             "type" => "textfield",
             "class" => "",
             "heading" => __("Slide Count",'TEXT_DOMAIN'),
             "param_name" => "slidecount",
             "value"  => '5',
          ),
          array(
             "type" => "textfield",
             "class" => "",
             "heading" => __("Autoplay",'TEXT_DOMAIN'),
             "param_name" => "playdelay",
             "value"  => '',
			 "description" => __("Autoplay: true, false or ex. 3000",'TEXT_DOMAIN'),
          ),
		   array(
             "type" => "textfield",
             "class" => "",
             "heading" => __("Single Item",'TEXT_DOMAIN'),
             "param_name" => "singleitem",
             "value"  => 'false',
			 "description" => __("Single item: true or false",'TEXT_DOMAIN'),
          ),
      
     
)));

vc_map( array(
     "name" => __("sponsor", 'TEXT_DOMAIN'),
     "base" => "sponsor",
     "content_element" => true,
     "as_child" => array('only' => 'carousel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
     "class" => "",
     "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
     "icon" => get_template_directory_uri().'/img/tc_icon/tc_sponsor.png',
	 "description" => __('Add a sponsor','TEXT_DOMAIN'),
     "params" => array(
          array(
             "type" => "attach_image",
             "class" => "",
			 "holder" => "img",
             "heading" => __("Path of image",'TEXT_DOMAIN'),
             "param_name" => "img_url",
             "value" => ""
          ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => __("Link for image",'TEXT_DOMAIN'),
               "param_name" => "href",
               "value" => "#"
            ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => __("Alt",'TEXT_DOMAIN'),
               "param_name" => "alt",
               "value" => "Insert alt here",
               "description" => __("alt",'TEXT_DOMAIN')
         ),
          array(
               "type" => "textfield",
               "class" => "",
               "heading" => __("Class",'TEXT_DOMAIN'),
               "param_name" => "class",
               "value" => ""
            ),
          

     
)));  

  
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_carousel extends WPBakeryShortCodesContainer {
      }
  }
  if ( class_exists( 'WPBakeryShortCode' ) ) {
      class WPBakeryShortCode_sponsor_item extends WPBakeryShortCode {
      }
  }


}



// Social Icons shortcode
add_shortcode('social', 'shortcode_social');
function shortcode_social($atts, $content=null){
    global $tc_options;
    $atts = shortcode_atts(
        array(        
        'class'     => '',
    ), $atts);
    $html ='';
    $html .= '
	<ul class="list-unstyled list-inline uppercase">';
	
	if($tc_options['facebook']){
	$html .= '<li><a href='.$tc_options['facebook'].'><i class="fa fa-lg fa-facebook"></i></a></li>';}
	if($tc_options['twitter']){
	$html .= '<li><a href='.$tc_options['twitter'].'><i class="fa fa-lg fa-twitter"></i></a></li>';}
	if($tc_options['instagram']){
	$html .= '<li><a href='.$tc_options['instagram'].'><i class="fa fa-lg fa-instagram"></i></a></li>';}
	if($tc_options['google-plus']){
	$html .= '<li><a href='.$tc_options['google-plus'].'><i class="fa fa-lg fa-google-plus"></i></a></li>';}
	if($tc_options['youtube']){
	$html .= '<li><a href='.$tc_options['youtube'].'><i class="fa fa-lg fa-youtube"></i></a></li>';}
	if($tc_options['linkedin']){
	$html .= '<li><a href='.$tc_options['linkedin'].'><i class="fa fa-lg fa-linkedin"></i></a></li>';}
	if($tc_options['flickr']){
	$html .= '<li><a href='.$tc_options['flickr'].'><i class="fa fa-lg fa-flickr"></i></a></li>';}
	if($tc_options['github']){
	$html .= '<li><a href='.$tc_options['flickr'].'><i class="fa fa-lg fa-github"></i></a></li>';}
                            
                        
    $html .= '</ul>';
    
    return $html;                        
}



// FAQ shortcode
add_shortcode('faq', 'shortcode_faq');
function shortcode_faq($atts, $content=null){
    global $tc_options;
    $atts = shortcode_atts(
        array(        
        'class'     => '',
    ), $atts);
    $html ='';
    $html .= '
	<dl class="faqs">';
		
		$args = array('post_type'=>'faq','posts_per_page'=> '100', 'order'=>'ASC',);
		$faq = new WP_Query($args);
		if($faq->have_posts()):
			while($faq->have_posts()):$faq->the_post();	
			$html .= '<div class="item">
						<dt>'.get_the_title().'</dt>
						<dd class="small">'.get_the_content().'</dd>
				
					</div>';
			endwhile;
		endif;
    $html .= '</dl>';
    
    return $html;                        
}


// Testimonial shortcode
add_shortcode('testimonial', 'shortcode_testimonial');
function shortcode_testimonial($atts, $content=null){
    global $tc_options;
    $atts = shortcode_atts(
        array(        
        'class'     => '',
    ), $atts);
    $html ='';
    $html .= '
	<div class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 no-padding">
		<div class="testimonial-inner">
			<div id="testimonial-carousel" class="owl-carousel'.$atts['class'].'">';
		
			$args = array('post_type'=>'testimonial','posts_per_page'=> '100');
			$testimonial = new WP_Query($args);
			if($testimonial->have_posts()):
				while($testimonial->have_posts()):$testimonial->the_post();
				$thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
		
							$html .= '<div class="item">
										<img class="img-circle" src="'.$thumbnail_url.'" alt="">
								
										<p class="lead">'.get_the_content().'</p>
										<p class="name"><strong>'.get_the_title().'</strong></p>
								
									</div>';
				endwhile;
			endif;
    $html .= '</div></div></div>';
    
    return $html;                        
}

if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Testimonial", 'TEXT_DOMAIN'),
   "base" => "testimonial",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_testimonial.png',
   "description" => __('Add testimonials layout','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Class",'TEXT_DOMAIN'),
         "param_name" => "class",
         "value" => "",
      )
     
   )
) );

}



// Hotel Shortcode
add_shortcode('hotel', 'shortcode_hotel');
function shortcode_hotel($atts, $content=null){
     $atts = shortcode_atts(
        array(
        'hotel_name'		=>'',
        'hotel_description'	=>'',
		'hotel_url'			=>'',
        'hotel_rating'		=>'',
		'hotel_image'		=>'',
    ), $atts);
	
	$one_star 		= '<i class="fa fa-star"></i>';
	$two_stars 		= '<i class="fa fa-star"></i><i class="fa fa-star"></i>';
	$three_stars 	= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
	$four_stars 	= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
	$five_stars 	= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
	
	
	$img = $atts['hotel_image'];
	$image = wp_get_attachment_image_src(trim($img), 'full');
	
	
	$html ='';
		
		

    $html ='';
    $html .='<div class="item">
				<div class="hotel">
					<img class="img-responsive" src="'.$image[0].'" alt="">
                                
					<div class="caption">';
	$html .=		'<h5 class="uppercase">'.$atts['hotel_name'].'</h5>
					<span class="rating">';
	
						
							if ($atts['hotel_rating'] === 'one_star'){ 
							$html .=''.$one_star.'';
							};
							
							if ($atts['hotel_rating'] === 'two_stars'){ 
							$html .=''.$two_stars.'';
							};
							
							if ($atts['hotel_rating'] === 'three_stars'){ 
							$html .=''.$three_stars.'';
							};
							
							if ($atts['hotel_rating'] === 'four_stars'){ 
							$html .=''.$four_stars.'';
							};
							
							if ($atts['hotel_rating'] === 'five_stars'){ 
							$html .=''.$five_stars.'';
							};
						  
	$html .=			'</span>';
	$html .=			'<p class="small">'.$atts['hotel_description'].'</p>';
						if($atts['hotel_url']){
	$html .='				<a class="button button-xsmall button-line-dark" href="'.$atts['hotel_url'].'">'. __('details', 'TEXT_DOMAIN').'</a>';
						};
	$html .='		</div>
									
						
				</div>
			</div>
        ';
    return $html;
}



if(function_exists('vc_map')){


vc_map( array(
   "name" => __("Hotel", 'TEXT_DOMAIN'),
   "base" => "hotel",
   "content_element" => true,
	"as_child" => array('only' => 'carousel'), 
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_venue.png',
   "description" => __('Add hotel','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Hotel name",'TEXT_DOMAIN'),
         "param_name" => "hotel_name",
         "value" => "",
      ),        
    array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Description",'TEXT_DOMAIN'),
         "param_name" => "hotel_description",
         "value" => "",
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Hotel website link",'TEXT_DOMAIN'),
         "param_name" => "hotel_url",
         "value" => "http://",
      ),
	  
	  array(
         "type" => "dropdown",
         "class" => "",
         "heading" => __("Hotel rating",'TEXT_DOMAIN'),
         "param_name" => "hotel_rating",
         "value"       => array(
			'1*'   => 'one_star',
			'2*'   => 'two_stars',
			'3*'	=> 'three_stars',
			'4*'	=> 'four_stars',
			'5*'	=> 'five_stars',
			
		  ),
      ),
	  
	  array(
         "type" => "attach_image",
         "class" => "",
         "heading" => __("Hotel image",'TEXT_DOMAIN'),
         "param_name" => "hotel_image",
         "value" => "",
         "description" => __('the best 809x500','TEXT_DOMAIN'),
      ),
	     
     
   )
) );

}









// Countdown Shortcode
add_shortcode('countdown', 'shortcode_countdown');
function shortcode_countdown($atts, $content=null){
     $atts = shortcode_atts(
        array(
        'date'				=>'',
		'field_days'		=>'',
		'field_hours'		=>'',
		'field_minutes'		=>'',
		'field_seconds'		=>'',
        
    ), $atts);

    $html ='';
    $html .='<div id="DateCountdown" data-date="'.$atts['date'].'" style="width: 100%;">';
	$html .='</div>';
	$html .='
			<script>
			jQuery(document).ready(function($){
				$("#DateCountdown").TimeCircles({
					"animation": "smooth",
					"use_background": false,
					"bg_width": 0,
					"fg_width": 0,
					
					"time": {
						"Days": {
							"text": "'.$atts['field_days'].'",
							"color": "#fac42b",
							"show": true
						},
						"Hours": {
							"text": "'.$atts['field_hours'].'",
							"color": "#fac42b",
							"show": true
						},
						"Minutes": {
							"text": "'.$atts['field_minutes'].'",
							"color": "#fac42b",
							"show": true
						},
						"Seconds": {
							"text": "'.$atts['field_seconds'].'",
							"color": "#fac42b",
							"show": true
						}
					}
				}); 
				});                                   
			';
	$html .='</script>';
	
				
    return $html;
}


if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Countdown", 'TEXT_DOMAIN'),
   "base" => "countdown",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_countdown.png',
   "description" => __('Add countdown timer','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Date",'TEXT_DOMAIN'),
         "param_name" => "date",
         "value" => "",
         "description" => __('Please enter a date like this format 2020/12/18 00:00:00','TEXT_DOMAIN'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Days field label",'TEXT_DOMAIN'),
         "param_name" => "field_days",
         "value" => "",
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Hours field label",'TEXT_DOMAIN'),
         "param_name" => "field_hours",
         "value" => "",
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Minutes field label",'TEXT_DOMAIN'),
         "param_name" => "field_minutes",
         "value" => " ",
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Seconds field label",'TEXT_DOMAIN'),
         "param_name" => "field_seconds",
         "value" => " ",
      ),
	
   )
) );

}



// Custom Google Map Shortcode
add_shortcode('googlemap', 'shortcode_googlemap');
function shortcode_googlemap($atts, $content=null){
    global $tc_options;
     $atts = shortcode_atts(
        array(
        'map_id'            =>'',
        'map_coordinate'    =>'',
        'map_height'        =>'',
        
    ), $atts);

    $html ='';
    $html .='<div id="'.$atts['map_id'].'" style="height:'.$atts['map_height'].';">';
    $html .='</div>';
    $html .='
            <script>
            function initMap() {
        var customMapType = new google.maps.StyledMapType(
            '.$tc_options['map_style'].'
          , {
          
        });
        var customMapTypeId = "'.$tc_options['map_type'].'";

        var map = new google.maps.Map(document.getElementById("'.$atts['map_id'].'"), {
          zoom: 12,
          center: {lat: '.$tc_options['map-latitude'].', lng: '.$tc_options['map-longtitude'].'}, 
          mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.'.$tc_options['map_type'].', customMapTypeId]
          }


        });

        var image = new google.maps.MarkerImage("'.$tc_options['marker_image']['url'].'",

                    new google.maps.Size(112, 112),

                    new google.maps.Point(0,0),

                    new google.maps.Point(18, 42)
                );
                
                // Add Marker
                var marker1 = new google.maps.Marker({
                    position: new google.maps.LatLng('.$tc_options['map-latitude'].','.$tc_options['map-longtitude'].'), 
                    map: map,       
                    icon: image // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
                }); 

        map.mapTypes.set(customMapTypeId, customMapType);
        map.setMapTypeId(customMapTypeId);
      }';
    $html .='</script>';
    $html .='<script src="https://maps.googleapis.com/maps/api/js?key='.$tc_options['map-api'].'&callback=initMap"
    async defer></script>
';
    
                
    return $html;
}


if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Custom Google Map", 'escape'),
   "base" => "googlemap",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'escape'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_icon_gmap.svg',
   "description" => __('Add google map','escape'),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Map ID",'escape'),
         "param_name" => "map_id",
         "value" => "",
      ),
     
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Map Height",'escape'),
         "param_name" => "map_height",
         "value" => "",
         "description" => __("Ex. 230px",'escape'),
      ),
   )
) );

}



// Pricing Shortcode
add_shortcode('pricing', 'shortcode_pricing');
function shortcode_pricing($atts, $content=null){
     $atts = shortcode_atts(
        array(
        'type'         	=>'',
        'price'         =>'',
		'icon'			=>'',
        'class'         =>'',
		'bg_color'         =>'',
    ), $atts);
	

    $html ='';
    $html .='<div class="item price-table '.$atts['type'].'" style="background-color:'.$atts['bg_color'].'">
				<div class="icon">
					<i class="pe-5x '.$atts['icon'].'"></i> 
				</div>
                                
				<div class="table-header">
					<h3>'.$atts['type'].'</h3>
					<p class="price">'.$atts['price'].'</p>
				</div>
                                
					<ul class="desc list-unstyled">
					   '.do_shortcode($content).'
					</ul>';
					
					
	$html .='</div>';
        
    return $html;
}


if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Price table", 'TEXT_DOMAIN'),
   "base" => "pricing",
   "content_element" => true,
	"as_child" => array('only' => 'carousel'), 
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_price_list.png',
   "description" => __('Add price table','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Type",'TEXT_DOMAIN'),
         "param_name" => "type",
         "value" => "The type",
      ),        
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Price",'TEXT_DOMAIN'),
         "param_name" => "price",
         "value" => "",
      ), 
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Background Icon",'TEXT_DOMAIN'),
         "param_name" => "icon",
         "value" => "",
      ),     
      array(
         "type" => "textarea",
         "class" => "",
         "heading" => __("Content",'TEXT_DOMAIN'),
         "param_name" => "content",
         "value" => "",
      ),
	   array(
         "type" => "colorpicker",
         "class" => "",
         "heading" => __("Background Color",'TEXT_DOMAIN'),
         "param_name" => "bg_color",
         "value" => "",
      )
     
   )
) );

}


// Pricing content
add_shortcode('li', 'shortcode_li');
function shortcode_li($atts, $content=null){
    $html = '<li>'.do_shortcode( $content ).'</li>';
    return $html;
}


// Venue Shortcode
$css = '';
add_shortcode('venue', 'shortcode_venue');
function shortcode_venue($atts, $content=null){
     $atts = shortcode_atts(
        array(
		'header'			=>'venue',
		'subtitle'			=>'',
		'venue'				=>'',
		'venue_logo'		=>'',
        'address_icon'		=>'pe-4x pe-7s-map-2',
        'address_header'	=> '',
		'address'			=>'',
        'venue_link'		=>'#',
		'button_text'		=>'more information',
		'css'				=>'',
		'base'				=>'',				
    ),  $atts);
	 
	
    $html = '';
    $html .='<div class="venue">
            	<div class="venue-inner">
                	<div class="container">
                    	<div class="row">
                        	
                        	<div class="col-lg-8 col-md-8 col-sm-8">
                            	<h2 class="uppercase">'.$atts['header'].'</h2>
                                <p class="lead">'.$atts['subtitle'].'</p>
                        		<h4>'.$atts['venue'].'</h4>
                                <img class="img-responsive" src='.wp_get_attachment_url( $atts['venue_logo'] ).' alt="">
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4">
                            	<i class="'.$atts['address_icon'].'"></i>
                                <h4 class="uppercase">'.$atts['address_header'].'</h4>
                                <p>'.$atts['address'].'</p>
                                
                                <a class="button button-xsmall button-line-light" href="'.$atts['venue_link'].'" target="_blank">'.$atts['button_text'].'</a>
                            </div>
                            
                        </div>
                    </div>
                </div>';
       $html .='</div>';
    return $html;
	
}


if(function_exists('vc_map')){

vc_map( array(
   "name" => __("Venue Information", 'TEXT_DOMAIN'),
   "base" => "venue",
   "class" => "",
   "category" => __("ThemeCube Shortcodes", 'TEXT_DOMAIN'),
   "icon" => get_template_directory_uri().'/img/tc_icon/tc_venue.png',
   "description" => __('Add venue layout','TEXT_DOMAIN'),
   "params" => array(
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Header",'TEXT_DOMAIN'),
         "param_name" => "header",
         "value" => "Venue",
         "description" => __('Section header','TEXT_DOMAIN'),
    ),
    array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Subtitle",'TEXT_DOMAIN'),
         "param_name" => "subtitle",
         "value" => "Donec finibus porta ultricies. Interdum et malesuada fames ac ante ipsum primis in faucibus.",
      ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Venue",'TEXT_DOMAIN'),
         "param_name" => "venue",
         "value" => "",
         "description" => __('Enter venue name','TEXT_DOMAIN'),
      ),
    array(
         "type" => "attach_image",
         "holder" => "img",
         "class" => "",
         "heading" => __("Venue logo",'TEXT_DOMAIN'),
         "param_name" => "venue_logo",
         "value" => "",
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Address Icon",'TEXT_DOMAIN'),
         "param_name" => "address_icon",
         "value" => "pe-4x pe-7s-map-2",
         "description" => __('Insert from Stroke 7 Icon Font','TEXT_DOMAIN'),
      ),
	  array(
         "type" => "textfield",
         "class" => "",
         "heading" => __("Address Header",'TEXT_DOMAIN'),
         "param_name" => "address_header",
         "value" => "address",
      ),
	  array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Address",'TEXT_DOMAIN'),
         "param_name" => "address",
         "value" => "",
		 "description" => __('Enter the venue address','TEXT_DOMAIN'),
      ),
	  array(
		 "type" => "textfield",
		 "holder" => "div",
		 "class" => "",
		 "heading" => __("Venue Link",'TEXT_DOMAIN'),
		 "param_name" => "venue_link",
		 "value" => "http://",
		 "description" => __('Enter the venue website link','TEXT_DOMAIN'),
	  ),
	  array(
		 "type" => "textfield",
		 "class" => "",
		 "heading" => __("Button text",'TEXT_DOMAIN'),
		 "param_name" => "button_text",
		 "value" => "more information",
	  ),
	  array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'TEXT_DOMAIN'),
            'param_name' => 'css',
            'group' => __( 'Design options', 'TEXT_DOMAIN'),
        ),
     
   )
));


}
