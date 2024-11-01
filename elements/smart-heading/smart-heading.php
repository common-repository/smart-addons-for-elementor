<?php
namespace Elementor;

class Smart_Heading extends Widget_Base {
	
	public function get_name() {
		return 'smart-heading';
	}
	public function get_title() {
		return esc_html__( 'Smart Heading', 'smart-addons-elementor' );
	}
	public function get_icon() {
		return 'smart-title-icon eicon-t-letter';
	}
	public function get_categories() {
		return [ 'smart-addons-elementor' ];
	}
	protected function _register_controls() {
		
		/**
		* Team Member Content Section
		*/
		$this->start_controls_section(
			'smart_heading_content',
			[
				'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
			]
		);
		  
		$this->add_control(
			'smart_heading_title',
			[
				'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Wrie title here', 'smart-addons-elementor' ),
			]
		);
		
		$this->add_control(
			'smart_heading_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'smart-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Wrie subtitle here', 'smart-addons-elementor' ),
			]
		);
		 
		$this->add_control(
			'smart_heading_border',
			[
				'label' => esc_html__( 'Border', 'smart-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();
 

		// Title
		$this->start_controls_section(
            'section_heading_title_style',
            [
                'label' => esc_html__('Title', 'smart-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'smart_heading_title_color_style',
            [
                'label' => esc_html__('Color', 'smart-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .smart-service-heading-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .smart-service-heading-title',
            ]
        );

        $this->add_responsive_control(
            'smart_headign_title_spacing_style',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-heading-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
 

		// Sub Title
		$this->start_controls_section(
            'section_heading_subtitle_style',
            [
                'label' => esc_html__('Subtitle', 'smart-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'smart_heading_subtitle_color_style',
            [
                'label' => esc_html__('Color', 'smart-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .smart-service-heading-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .smart-service-heading-subtitle',
            ]
        );

        $this->add_responsive_control(
            'smart_headign_subtitle_spacing_style',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-heading-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
 
		// Border
		$this->start_controls_section(
            'smart_headign_border_style',
            [
                'label' => esc_html__('Border', 'smart-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'smart_headign_border_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-service-after-border:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'smart_headign_border_spacing_style',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-service-after-border' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
 
	}
	protected function render() {
		$settings = $this->get_settings_for_display(); 
		?>  
		<div class="smart-service-heading text-center">
        	<h2 class="smart-service-heading-title"><?php echo esc_html($settings['smart_heading_title']); ?></h2>
        	<p class="smart-service-heading-subtitle"><?php echo wp_kses_post($settings['smart_heading_subtitle']); ?></p> 
        	<?php if($settings['smart_heading_border'] == 'yes'): ?>
	        	<span class="smart-service-after-border"></span>
	        <?php endif; ?>
        </div> 
	<?php
	}

	protected function _content_template() {
		?>  
		<div class="smart-service-heading text-center">
        	<h2 class="smart-service-heading-title">{{{ settings.smart_heading_title }}}</h2> 
        	<p class="smart-service-heading-subtitle">{{{ settings.smart_heading_subtitle }}}</p> 
        	<# if ( settings.smart_heading_border ==='yes' ) { #>
        		<span class="smart-service-after-border"></span> 
        	<# } #> 
        </div> 
		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Heading() );