<?php

return array(
		'favico' => array(
				'dir' => '/theme_config/icons/favicon.png'
		),
		'option_saved_text' => 'Options successfully saved',
		'tabs' => array(
				array(
						'title'=>'General Options',
						'icon'=>1,
						'boxes' => array(
								'Logo Customization' => array(
										'icon'=>'customization',
										'size'=>'2_3',
										'columns'=>true,
										'description'=>'Here you upload a image as logo or you can write it as text and select the logo color, size, font.',
										'input_fields' => array(
												'Dark Logo As Image'=>array(
														'size'=>'half',
														'id'=>'logo_image_d',
														'type'=>'image_upload',
														'note'=>'Here you can insert your link to a image logo or upload a new logo image.(Dark logo, displayed on section with bright background)'
												),
												'Bright Logo As Image'=>array(
														'size'=>'half_last',
														'id'=>'logo_image_b',
														'type'=>'image_upload',
														'note'=>'Here you can insert your link to a image logo or upload a new logo image.(Bright logo, displayed on section with dark background)'
												),
												'Dark Logo As Text'=>array(
														'size'=>'half',
														'id'=>'logo_text_d',
														'type'=>'text',
														'note' => "Type the logo text here, then select a color, set a size and font.",
														'color_changer'=>true,
														'font_changer'=>true,
														'font_size_changer'=>array(8,50, 'px'),
														'font_preview'=>array(true, true)
												),
												'Bright Logo As Text'=>array(
														'size'=>'half_last',
														'id'=>'logo_text_b',
														'type'=>'text',
														'note' => "Type the logo text here, then select a color, set a size and font.",
														'color_changer'=>true,
														'font_changer'=>true,
														'font_size_changer'=>array(8,50, 'px'),
														'font_preview'=>array(true, true)
												),
										)
								),
								'Favicon' => array(
										'icon'=>'customization',
										'size'=>'1_3_last',
										'input_fields' => array(
												array(
														'id'=>'favicon',
														'type'=>'image_upload',
														'note'=>'Here you can upload the favicon icon.'
												)
										)
								),
								'Custom CSS' => array(
										'icon'=>'css',
										'size'=>'half',
										'description'=>'Here you can write your personal CSS for customizing the classes you want. Or use our <b>Custom Styler</b>, from the Site Colors tab, for an easier custom css color picking.',
										'input_fields' => array(
												array(
														'id'=>'custom_css',
														'type'=>'textarea'
												)
										)
								),
								'Custom JS' => array(
										'icon'=>'js',
										'size'=>'half_last',
										'description'=>'Here you can write your personal JS that will be appended to footer.<br><br>',
										'input_fields' => array(
												array(
														'id'=>'custom_js',
														'type'=>'textarea'
												)
										)
								)
						)
				),
				array(
						'title' => 'Site Colors',
						'icon'=>4,
						'boxes' => array(
								'Background Customization'=>array(
										'icon'=>'customization',
										'columns'=>true,
										'size' => 'half',
										'input_fields' => array(
												'Background Color'=>array(
														'size'=>'half',
														'id'=>'bg_color',
														'type'=>'colorpicker'
												),
												'Background Image' => array(
														'size'=>'half_last',
														'id'=>'bg_image',
														'type'=>'image_upload'
												)
										)
								),
								'Site Colors' => array(
										'icon'=>'background',
										'columns'=>true,
										'size' => 'half_last',
										'input_fields' => array(
												'Primary Site Color'=>array(
														'size'=>1,
														'id'=>'site_color',
														'type'=>'colorpicker',
														'note'=>'Choose primary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.<br/><br/><br/>'
												),
												'Secondary Site Color'=>array(
														'size'=>1,
														'id'=>'site_color_2',
														'type'=>'colorpicker',
														'note'=>'Choose secondary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.'
												),
										)
								),
						)
				),
				array(
						'title' => 'Typography',
						'icon'  => 1,
						'boxes' => array(
								'Font Changers'=>array(
										'icon' => 'customization',
										'description'=>'Change the fonts & colors for site\'s sections:',
										'size'=>'1',
										'columns'=>true,
										'input_fields' => array(
												'Main Content Font/Color'=>array(
													'size'=>'1_3',
													'id'=>'main_content_text',
													'type'=>'text',
													'note' => "Then select a color, set a size and choose a font",
													'color_changer'=>true,
													'font_changer'=>true,
													'font_size_changer'=>array(8,50, 'px'),
													'hide_input'=>true,
													),
												'Sidebar Font/Color'=>array(
													'size'=>'1_3',
													'id'=>'sidebar_text',
													'type'=>'text',
													'note' => "Then select a color, set a size and choose a font",
													'color_changer'=>true,
													'font_changer'=>true,
													'font_size_changer'=>array(8,50, 'px'),
													'hide_input'=>true,
													),
												'Menu Font/Color'=>array(
													'size'=>'1_3_last',
													'id'=>'menu_text',
													'type'=>'text',
													'note' => "Then select a color, set a size and choose a font",
													'color_changer'=>true,
													'font_changer'=>true,
													'font_size_changer'=>array(8,50, 'px'),
													'hide_input'=>true,
													),
												
										)
								),
								
						)
				),
				array(
						'title' => 'SEO and Socials',
						'icon'=>2,
						'boxes'=>array(
								'ShareThis feature'=>array(
										'icon'=>'social',
										'description'=>"To use this service please select your favorite social networks",
										'size'=>'3',
										'input_fields'=>array(
												array(
														'type'  => 'select',
														'id'    => 'share_this',
														'label' => 'Facebook',
														'class'  => 'social_search',
														'multiple' => true,
														'options'=>array('Google'=>'googleplus','Facebook'=>'facebook','Twitter'=>'twitter','Pinterest'=>'pinterest','Linkedin'=>"linkedin",'Vkontakte'=>'vkontakte')
												),
										)
								),
								'Social Platforms'=>array(
										'icon'=>'social',
										'description'=>"Insert the link to the social share page.",
										'size'=>'3',
										'columns'=>true,
										'input_fields'=>array(
												array(
														'id'=>'social_platforms',
														'size'=>'half',
														'type'=>'social_platforms',
														'platforms'=>array('facebook','twitter','google','pinterest','linkedin','dribbble','behance','youtube','flickr','rss')
												)
										)
								),
						)
				),
				array(
						'title' => 'Additional Options',
						'icon'  => 6,
						'boxes' => array(
								'404 error page settings'=>array(
										'icon' => 'customization',
										'description'=>"Setup your 404 error page",
										'size'=>'1',
										'columns'=>true,
										'input_fields' =>array(
											'Image' => array(
													'id'    => 'error_image',
													'type'  => 'image_upload',
													'note' => 'Here you can insert your link to a image or upload a new 404 error image.',
													'size' => 'half'
											),
											'Page title' => array(
													'id'    => 'error_title',
													'type'  => 'text',
													'note' => 'This is the title of the 404 page',
													'size' => 'half_last'
											),
											'Message' => array(
													'id'    => 'error_message',
													'type'  => 'textarea',
													'note' => 'This message will appear on 404 page.',
													'size' => 'half_last'
											)
										)
								),
								'Page Settings' => array(
										'icon' => 'customization',
										'description'   =>  'Other settings',
										'size'  =>  'half',
										'columns' =>    false,
										'input_fields' =>   array(
												'Theme Main Preloader' => array(
														'id'    =>  'preloader_main',
														'type'  =>  'checkbox',
														'label' =>  'Check to remove theme preloader',
														'size'  =>  1,
													),
												'Slide Preloader' => array(
														'id'    =>  'preloader',
														'type'  =>  'checkbox',
														'label' =>  'Check to remove slide preloader',
														'size'  =>  1,
													)
											)
								),
								'Post Settings'=>array(
										'icon' => 'customization',
										'description'=>"Other settings",
										'size'=>'half_last',
										'columns'=>false,
										'input_fields' =>array(
												'Show Related Posts' => array(
														'id'    => 'related_posts',
														'type'  => 'checkbox',
														'label' => 'Show related posts in single post page.',
														'size' => 1,
														'action' => array('show',array('related_posts_nr','related_title','related_message'))
												),
												array(
														'id'    => 'related_posts_nr',
														'type'  => 'text',
														'note' => 'Number of Related Posts to be displayed on Single Post Page. Default "4"',
												),
												array(
														'id'    => 'related_title',
														'type'  => 'text',
														'note' => 'Title for Similar Posts',
														'size' => 1,
												),
												array(
														'id'    => 'related_message',
														'type'  => 'text',
														'note' => 'Message for Similar Posts',
														'size' => 1,
												),
												'Show Share Links' => array(
														'id'    => 'share_post',
														'type'  => 'checkbox',
														'default' => 'on',
														'label' => 'Show Share Links in single post page.',
														'size' => 1,
												), 
												array(
														'id'    => 'share_portfolio',
														'type'  => 'checkbox',
														'label' => 'Show Share Links in single portfolio page.',
														'size' => 1,
												), 
										)
								)
						)
				),
		),
		'styles' => array( array('wp-color-picker'),'style','select2' )
		,
		'scripts' => array( array( 'jquery', 'jquery-ui-core','jquery-ui-datepicker','wp-color-picker' ), 'select2.min','jquery.cookie','tt_options', 'admin_js' )
);