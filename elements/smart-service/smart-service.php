<?php
namespace Elementor;

class Smart_Service extends Widget_Base {
	
	public function get_name() {
		return 'smart-service';
	}
	public function get_title() {
		return esc_html__( 'Smart Service', 'smart-addons-elementor' );
	}
	public function get_icon() {
		return 'smart-element-icon eicon-gallery-grid';
	}
	public function get_categories() {
		return [ 'smart-addons-elementor' ];
	}
	protected function _register_controls() {
		
		/**
		* Service Content Section
		*/
		$this->start_controls_section(
			'smartad_service_content',
			[
				'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
			]
		);
		 
		$this->add_control(
			'smart_service_icon_class',
			[
				'label' => esc_html__( 'Icon Class', 'smart-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'fa fa-bar-chart',
				'description' => esc_html__( 'It will be icon css class like font-awesome or custom made icon class.', 'smart-addons-elementor' ),
			]
		);
		$this->add_control(
			'smart_service_title',
			[
				'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Quality Design', 'smart-addons-elementor' ),
				'description' => esc_html__( 'Service title will be here.', 'smart-addons-elementor' ),
			]
		);
		 
		$this->add_control(
			'smart_service_content',
			[
				'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Must explain you how all this mistake dea of denouncing pleasure and prais Being pain was born me', 'smart-addons-elementor' ),
				'description' => esc_html__( 'Service content will be here.', 'smart-addons-elementor' ),
			]
		);
		$this->end_controls_section();


		/*
		* Service Styling Section
		*/
        $this->start_controls_section(
            'smart_service_block_style',
            [
                'label' => esc_html__( 'General', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );  
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Block Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();

        $this->start_controls_section(
            'smart_service_heading_icon',
            [
                'label' => esc_html__( 'Icon', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 

        $this->add_control(
            'smart_service_ico_clr_var',
            [
                'label' => esc_html__( 'Select', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Color', 'your-plugin' ),
                'label_off' => esc_html__( 'Gradient', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        
        $this->add_control(
            'srv_ico_grd_clr',
            [
                'label' => esc_html__( 'Gradient Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__( 'None', 'smart-addons-elementor' ),
                'label_on' => esc_html__( 'Custom', 'smart-addons-elementor' ),
                'return_value' => 'yes',
                'condition' => [
                    'smart_service_ico_clr_var!' => 'yes'
                ],
            ]
        );

        $this->start_popover();
 
        $this->add_control(
            'srv_ico_grd_clr_1',
            [
                'label' => esc_html__( 'First Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR, 
                'condition' => [
                    'srv_ico_grd_clr' => 'yes',
                    'smart_service_ico_clr_var!' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'srv_ico_grd_clr_2',
            [
                'label' => esc_html__( 'Second Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-srvc-ico' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .smart-srvc-ico' => 'background-image: -webkit-linear-gradient(20deg, {{srv_ico_grd_clr_1.VALUE}} 46%, {{srv_ico_grd_clr_2.VALUE}} 54%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;',
                ],
                'condition' => [
                    'srv_ico_grd_clr' => 'yes',
                    'smart_service_ico_clr_var!' => 'yes'
                ],
            ]
        ); 
 
        $this->end_popover();


        $this->add_control(
            'smart_service_icon_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-srvc-ico' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'smart_service_ico_clr_var' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'smart_service_icon_hvr_color',
            [
                'label' => esc_html__( 'Hover Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block:hover .smart-srvc-ico' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'smart_service_ico_clr_var' => 'yes'
                ],
            ]
        );
        $this->add_control(
            'smart_service_icon_bg_onof',
            [
                'label' => esc_html__( 'Background', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'On', 'your-plugin' ),
                'label_off' => esc_html__( 'Of', 'your-plugin' ),
                'return_value' => 'on',
                'default' => 'of',
            ]
        );
        $this->add_control(
            'smart_service_icon_bgcolor',
            [
                'label' => esc_html__( 'Background Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block-icon' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'smart_service_icon_bg_onof' => 'on',
                ]
            ]
        ); 
        $this->add_control(
            'smart_service_icon_hvr_bgcolor',
            [
                'label' => esc_html__( 'Background Hover Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block:hover .smart-service-block-icon' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'smart_service_icon_bg_onof' => 'on',
                ]
            ]
        ); 
        $this->add_control(
            'smart_service_icon_border_style',
            [
                'label' => esc_html__( 'Border Style', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'solid'  => esc_html__( 'Solid', 'smart-addons-elementor' ),
                    'dashed' => esc_html__( 'Dashed', 'smart-addons-elementor' ),
                    'dotted' => esc_html__( 'Dotted', 'smart-addons-elementor' ),
                    'double' => esc_html__( 'Double', 'smart-addons-elementor' ),
                    'none' => esc_html__( 'None', 'smart-addons-elementor' ),
                ], 
                'condition' => [
                    'smart_service_icon_bg_onof' => 'on',
                ]
            ]
        );

        $this->add_control(
            'smart_service_icon_border_color',
            [
                'label' => esc_html__( 'Border Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block-icon' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'smart_service_icon_bg_onof' => 'on',
                ]
            ]
        );
        $this->add_responsive_control(
            'smart_service_icon_border_width',
            [
                'label' => esc_html__( 'Border Width', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block-icon ' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'smart_service_icon_bg_onof' => 'on',
                ]
            ]
        );
        $this->add_responsive_control(
            'smart_service_icon_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default' => '50',
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
                'condition' => [
                    'smart_service_icon_bg_onof' => 'on',
                ]
            ]
        );
        $this->add_responsive_control(
            'smart_service_icon_spacing',
            [
                'label' => esc_html__( 'Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'smart_service_icon_align',
            [
                'label' => esc_html__( 'Alignment', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'smart-srv-ico-pos'  => esc_html__( 'Left', 'smart-addons-elementor' ),
                    'top' => esc_html__( 'Top', 'smart-addons-elementor' )
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'smart_service_heading_title',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 


        $this->add_control(
            'smart_service_title_color',
            [
                'label' => esc_html__( 'Text Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_clr',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-service-block-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );
        $this->add_responsive_control(
            'smart_service_title_spacing',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-block-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'smart_service_heading_content',
            [
                'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );  

        $this->add_control(
            'smart_service_content_color',
            [
                'label' => esc_html__( 'Text Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-service-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_clr',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-service-content',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Content Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
   		
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
        $bg_onof = $settings['smart_service_icon_bg_onof']; 
        $icon_pos = $settings['smart_service_icon_align'];   
		?>  
		<div class="smart-service-block text-center <?php echo esc_attr($settings['smart_service_icon_align']); ?>">
			<div class="smart-service-block-icon <?php echo esc_attr(($bg_onof!='on') ? 'smart-no-border':''); ?>" style="border-style: <?php echo esc_attr($settings['smart_service_icon_border_style']); ?>"> 
		 		<i class="<?php echo esc_attr($settings['smart_service_icon_class']); ?> smart-srvc-ico <?php echo esc_attr(($bg_onof!='on') ? 'smart-ico-nopd':''); ?>" aria-hidden="true"></i> 
			</div>
            <div class="smart-service-block-content"> 
    			<h3 class="smart-service-block-title"><?php echo esc_html($settings['smart_service_title']); ?></h5>
    			<p class="smart-service-content"><?php echo wp_kses_post($settings['smart_service_content']); ?></p>
            </div> 
		</div> 
	<?php 
	} 

	protected function _content_template() {
		?>  
		<div class="smart-service-block text-center {{{ settings.smart_service_icon_align }}} ">
            <# if ( settings.smart_service_icon_bg_onof ==='on' ) { #>
                <div class="smart-service-block-icon" style="border-style: {{{ settings.smart_service_icon_border_style }}}">
            <# }else{ #> 
                <div class="smart-service-block-icon smart-no-border">
            <# } #> 			 
                <# if ( settings.smart_service_icon_bg_onof ==='on' ) { #>
                    <i class="{{{ settings.smart_service_icon_class }}} smart-srvc-ico" aria-hidden="true"></i>
                <# }else{ #> 
                    <i class="{{{ settings.smart_service_icon_class }}} smart-srvc-ico smart-ico-nopd" aria-hidden="true"></i>
                <# } #> 				
			</div> 
            <div class="smart-service-block-content"> 
                <h3 class="smart-service-block-title">{{{ settings.smart_service_title }}}</h5>
                <p class="smart-service-content">{{{ settings.smart_service_content }}}</p>
            </div>
		</div> 
		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Service() );