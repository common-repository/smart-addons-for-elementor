<?php
namespace Elementor;

class Smart_Team extends Widget_Base {
	
	public function get_name() {
		return 'smart-team';
	}
	public function get_title() {
		return esc_html__( 'Smart Team', 'smart-addons-elementor' );
	}
	public function get_icon() {
		return 'smart-element-icon eicon-lock-user';
	}
	public function get_categories() {
		return [ 'smart-addons-elementor' ];
	}
	protected function _register_controls() {
		
        $this->start_controls_section(
            'smart_team_down',
            [
                'label' => esc_html__( 'Contents', 'smart-addons-elementor' ),
            ]
        );
 
        $this->add_control(
            'smart_team_profile_image',
            [
                'label' => esc_html__( 'Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ] 
            ]
        );

		$this->add_control(
			'smart_team_profile_image_size',
			[
				'label' => esc_html__( 'Image Dimension', 'smart-addons-elementor' ),
				'type' => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Set custom width or height to keep the original size ratio. Remember set width & height same if you use round style for this image.', 'smart-addons-elementor' ),
				'default' => [
					'width' => '',
					'height' => '',
				],
                'condition' => [
                    'smart_team_profile_image[url]!' => '',
                ]
			]
		);
        $this->add_control(
            'smart_team_name',
            [
                'label' => esc_html__( 'Name', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'David Smith',
                'description' => esc_html__( 'Write name title.', 'smart-addons-elementor' ),
            ]
        ); 

        $this->add_control(
            'smart_team_designation',
            [
                'label' => esc_html__( 'Designation', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'David Smith',
                'description' => esc_html__( 'Write designation title.', 'smart-addons-elementor' ),
            ]
        ); 

        $team_social_repeater = new Repeater();
  
        $team_social_repeater->add_control(
            'smart_team_social_rep_icon',
            [
                'label' => esc_html__( 'Icon Class', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'fa fa-facebook',
                'description' => esc_html__( 'Insert icon class here.', 'smart-addons-elementor' ) 
            ]
        );
        $team_social_repeater->add_control(
            'smart_team_social_rep_icon_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
                'description' => esc_html__( 'Pick icon color from here.', 'smart-addons-elementor' ) 
            ]
        );  
        $team_social_repeater->add_control(
            'smart_team_social_rep_icon_hvr_color',
            [
                'label' => esc_html__( 'Hover Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}}'
				],
                'description' => esc_html__( 'Pick icon color from here.', 'smart-addons-elementor' ) 
            ]
        );    
        $team_social_repeater->add_control(
            'smart_team_social_rep_icon_link',
            [
                'label' => esc_html__( 'Link', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
                'description' => esc_html__( 'Insert link here.', 'smart-addons-elementor' ) 
            ]
        );  
        $this->add_control(
            'smart_team_social_repeater',
            [
                'label' => esc_html__( 'Social Profiles', 'smart-addons-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $team_social_repeater->get_controls(),
                'title_field' => '{{{ smart_team_social_rep_icon }}}',
                'default' => [
                        [
                            'smart_team_social_rep_icon' => esc_html__( 'Link #1', 'smart-addons-elementor' ),
                            'smart_team_social_rep_icon_link' => esc_html__( 'Add accordin content here', 'smart-addons-elementor' ),
                        ],
                        [
                            'smart_team_social_rep_icon' => esc_html__( 'Link #2', 'smart-addons-elementor' ),
                            'smart_team_social_rep_icon_link' => esc_html__( 'Add accordin content here', 'smart-addons-elementor' ),
                        ],
                        [
                            'smart_team_social_rep_icon' => esc_html__( 'Link #3', 'smart-addons-elementor' ),
                            'smart_team_social_rep_icon_link' => esc_html__( 'Add accordin content here', 'smart-addons-elementor' ),
                        ]
                ]   
            ]
        );
 

        $this->end_controls_section();
 
		/*
		* Count down Styling Section
		*/ 
        $this->start_controls_section(
            'smart_team_img_style',
            [
                'label' => esc_html__( 'Image', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );  
        $this->add_responsive_control(
            'smart_team_img_spac_style',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'], 
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 116,
                ],
                'selectors' => [
                    '{{WRAPPER}} .smart-team-top' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'smart_team_img_border_style',
            [
                'label' => esc_html__( 'Style', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'round'  => esc_html__( 'Round', 'smart-addons-elementor' ),
                    'default' => esc_html__( 'Default', 'smart-addons-elementor' ) 
                ] 
            ]
        );
		$this->end_controls_section();
 
        $this->start_controls_section(
            'smart_team_box_style',
            [
                'label' => esc_html__( 'Box Style', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 
        $this->add_control(
            'smart_team_box_shadow_style',
            [
                'label' => esc_html__( 'Box Shadow', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Enable', 'your-plugin' ),
                'label_off' => esc_html__( 'Disable', 'your-plugin' ),
                'return_value' => 'on',
                'default' => 'of',
            ]
        );	
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'team_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'smart-addons-elementor' ),
				'selector' => '{{WRAPPER}} .smart-team-bottom',
                'condition' => [
                    'smart_team_box_shadow_style' => 'on',
                ]
			]
		);
		$this->end_controls_section();
 
        $this->start_controls_section(
            'smart_team_name_style',
            [
                'label' => esc_html__( 'Name', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 
        $this->add_control(
            'smart_team_name_style_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-team-name' => 'color: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_name_typ',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-team-name',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );   
		$this->end_controls_section();
 
        $this->start_controls_section(
            'smart_team_desig_style',
            [
                'label' => esc_html__( 'Designation', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 
        $this->add_control(
            'smart_team_desig_style_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-team-designation' => 'color: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_desig_typ',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-team-designation',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );   
		$this->end_controls_section();
   
   		
	}
	protected function render() {
		$settings = $this->get_settings_for_display(); 
        $image_url = !empty($settings['smart_team_profile_image']['url']) ? ($settings['smart_team_profile_image']['url']) : (SMARTAD_ASSETS_URL.'img/team.png');  
        $image_id = $settings['smart_team_profile_image']['id'];
        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
        $social_links = $settings['smart_team_social_repeater'];
        $image_size = $settings['smart_team_profile_image_size'];
        $width = $image_size['width']; 
        $height = $image_size['height'];
        $output = '';
        if($width && $height){
        	$output = 'style="width:'.$width.'px;height:'.$height.'px;"';
        } 
		?>   
        <div class="smart-team-wrap">  
            <div class="smart-team-top <?php echo esc_attr($settings['smart_team_img_border_style']); ?>"> 
            	<img <?php echo $output; ?> src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"> 
            	<?php if(($settings['smart_team_img_border_style']=='round') && $social_links): ?>
            		<div class="social-hover">
		            	<ul class="smart-team-social">
		            		<?php foreach ($social_links as $key => $value) { 
		            			if($value['smart_team_social_rep_icon_link']){ ?> 
		            			<li><a href="<?php echo esc_url($value['smart_team_social_rep_icon_link']); ?>" class="links elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>"><i class="<?php echo esc_attr($value['smart_team_social_rep_icon']); ?>"></i></a></li>
		            		<?php } } ?> 
		            	</ul>
		            </div>
	            <?php endif; ?> 
            </div>  
            <div class="smart-team-bottom text-center"> 
            	<?php if($settings['smart_team_img_border_style']!='round'): ?>
	            	<span class="free-height"></span>
	            <?php endif; ?>
            	<h4 class="smart-team-name"><?php echo esc_html__($settings['smart_team_name']); ?></h4>
            	<p class="smart-team-designation"><?php echo wp_kses_post($settings['smart_team_designation']); ?></p>
            	<?php if(($settings['smart_team_img_border_style']!='round') && $social_links): ?>
	            	<ul class="smart-team-social">
	            		<?php foreach ($social_links as $key => $value) { 
	            			if($value['smart_team_social_rep_icon_link']){ ?> 
	            			<li><a href="<?php echo esc_url($value['smart_team_social_rep_icon_link']); ?>" class="links elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>"><i class="<?php echo esc_attr($value['smart_team_social_rep_icon']); ?>"></i></a></li>
	            		<?php } } ?> 
	            	</ul>
	            <?php endif; ?>
            </div> 
        </div>
	<?php
	}
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Team() );