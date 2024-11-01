<?php
namespace Elementor;

class Smart_Content_Block extends Widget_Base {
	
	public function get_name() {
		return 'smart-content-block';
	}
	public function get_title() {
		return esc_html__( 'Smart Content Block', 'smart-addons-elementor' );
	}
	public function get_icon() {
		return 'smart-element-icon eicon-text';
	}
	public function get_categories() {
		return [ 'smart-addons-elementor' ];
	}
	protected function _register_controls() {
		
        /**
        * Smart Heading Section
        */
        $this->start_controls_section(
            'smart_content_block_content',
            [
                'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
            ]
        );
          
        $this->add_control(
            'smart_content_block_title',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Wrie title here', 'smart-addons-elementor' ),
            ]
        );
        $this->add_control(
            'smart_content_block_border',
            [
                'label' => esc_html__( 'Border', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'your-plugin' ),
                'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        
        $this->add_control(
            'smart_content_block_subtitle',
            [
                'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Wrie content here', 'smart-addons-elementor' ),
            ]
        );

        $this->add_control(
            'smart_content_block_button_label',
            [
                'label' => esc_html__( 'Button Label', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Learn More', 'smart-addons-elementor' ),
                'description' => esc_html__( 'Wrie button label here', 'smart-addons-elementor' ),
            ]
        );
        $this->add_control(
            'smart_content_block_button_url',
            [
                'label' => esc_html__( 'Button Url', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '#',
                'description' => esc_html__( 'Insert button url here', 'smart-addons-elementor' ),
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
            'smart_content_block_title_color_style',
            [
                'label' => esc_html__('Color', 'smart-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .smart-content-block-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .smart-content-block-title',
            ]
        );

        $this->add_responsive_control(
            'smart_content_block_title_spacing_style',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-content-block-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
 
        // Border
        $this->start_controls_section(
            'smart_content_block_border_style',
            [
                'label' => esc_html__('Border', 'smart-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'smart_content_block_border_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-content-block-after-border:after' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'smart_content_block_border_spacing_style',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-content-block-after-border' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Title
        $this->start_controls_section(
            'section_content_block_style',
            [
                'label' => esc_html__('Content', 'smart-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'section_content_block_padding',
            [
                'label' => esc_html__( 'Content Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-content-block-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_control(
            'smart_content_block_subtitle_color_style',
            [
                'label' => esc_html__('Color', 'smart-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .smart-content-block-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .smart-content-block-subtitle',
            ]
        );

        $this->add_responsive_control(
            'smart_content_block_subtitle_spacing_style',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-content-block-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
 
        // Button
        $this->start_controls_section(
            'smart_content_block_button_style',
            [
                'label' => esc_html__('Button', 'smart-addons-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'smart_content_block_button_text_color',
            [
                'label' => esc_html__( 'Text Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-btn-1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'smart_content_block_button_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-btn-1' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'smart_content_block_border_style',
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
                ] 
            ]
        );
        $this->add_responsive_control(
            'section_content_block_button_border',
            [
                'label' => esc_html__( 'Border Width', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-btn-1' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_control(
            'smart_content_block_button_bdr_color',
            [
                'label' => esc_html__( 'Border Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-btn-1' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'section_content_block_button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-btn-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 

        $this->end_controls_section();
   		
	}
	protected function render() {
		$settings = $this->get_settings_for_display();  

		?>  
        <div class="smart-content-block cbk text-left">
            <h2 class="smart-content-block-title"><?php echo esc_html($settings['smart_content_block_title']); ?></h2>
            <?php if($settings['smart_content_block_border'] == 'yes'): ?>
                <span class="smart-content-block-after-border"></span> 
            <?php endif; ?>
            <p class="smart-content-block-subtitle"><?php echo wp_kses_post($settings['smart_content_block_subtitle']); ?></p> 
            <a href="<?php echo esc_url($settings['smart_content_block_button_url']); ?>" class="btn btn-primary smart-btn-1" style="border-style:<?php echo esc_attr($settings['smart_content_block_border_style']);?>"><?php echo esc_html($settings['smart_content_block_button_label']); ?></a> 
        </div> 
	<?php
	}

	protected function _content_template() {
		?>  
        <div class="smart-content-block text-left">
            <h2 class="smart-content-block-title">{{{ settings.smart_content_block_title }}}</h2>
            <# if ( settings.smart_content_block_border ==='yes' ) { #>
                <span class="smart-content-block-after-border"></span> 
            <# } #> 
            <p class="smart-content-block-subtitle">{{{ settings.smart_content_block_subtitle }}}</p> 
            <a href="{{{ settings.smart_content_block_button_label }}}" style="border-style:{{{ settings.smart_content_block_border_style }}}" class="btn btn-primary smart-btn-1">{{{ settings.smart_content_block_button_label }}}</a> 
        </div> 
		<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Content_Block() );