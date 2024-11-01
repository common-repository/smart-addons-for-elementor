<?php
namespace Elementor;

class Smart_Count_Down extends Widget_Base {
	
	public function get_name() {
		return 'smart-count-down';
	}
	public function get_title() {
		return esc_html__( 'Smart Counter Up', 'smart-addons-elementor' );
	}
	public function get_icon() {
		return 'smart-element-icon eicon-counter';
	}
	public function get_categories() {
		return [ 'smart-addons-elementor' ];
	}
	protected function _register_controls() {
		
        $this->start_controls_section(
            'smart_count_down',
            [
                'label' => esc_html__( 'Contents', 'smart-addons-elementor' ),
            ]
        );
 
        $this->add_control(
            'smart_count_down_number',
            [
                'label' => esc_html__( 'Count Number', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '54',
                'description' => esc_html__( 'Write count number value title.', 'smart-addons-elementor' ),
            ]
        ); 
        $this->add_control(
            'smart_count_down_title',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Days', 'smart-addons-elementor' ),
                'description' => esc_html__( 'Write title here.', 'smart-addons-elementor' ),
            ]
        ); 

        $this->end_controls_section();
 
		/*
		* Count down Styling Section
		*/ 
        $this->start_controls_section(
            'smart_count_down_num_style',
            [
                'label' => esc_html__( 'Count Number', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_responsive_control(
            'smart_count_down_num_padding',
            [
                'label' => esc_html__( 'Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'smart_count_down_num_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-count' => 'color: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'count_num_typ',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-count',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            ]
        );  
        $this->add_responsive_control(
            'smart_count_down_num_botspac',
            [
                'label' => esc_html__( 'Bottom Spacing', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .smart-count' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
 
        $this->start_controls_section(
            'smart_count_down_title_style',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'smart_count_down_title_padding',
            [
                'label' => esc_html__( 'Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .c-ttl' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
 
        $this->add_control(
            'smart_count_down_title_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .c-ttl' => 'color: {{VALUE}}',
                ],
            ]
        ); 
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'count_title_typ',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .c-ttl',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );  
        $this->end_controls_section();
 
        $this->start_controls_section(
            'smart_count_down_border_style',
            [
                'label' => esc_html__( 'Border', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'smart_count_down_border_type',
            [
                'label' => esc_html__( 'Style', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'solid'  => esc_html__( 'Solid', 'smart-addons-elementor' ),
                    'dashed' => esc_html__( 'Dashed', 'smart-addons-elementor' ),
                    'dotted' => esc_html__( 'Dotted', 'smart-addons-elementor' ),
                    'double' => esc_html__( 'Double', 'smart-addons-elementor' ),
                    'none' => esc_html__( 'None', 'smart-addons-elementor' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .smart-count-down-wrap' => 'border-style: {{{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'smart_count_down_border_width',
            [
                'label' => esc_html__( 'Width', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-count-down-wrap' => 'border-top-width: {{TOP}}{{UNIT}};border-right-width:{{RIGHT}}{{UNIT}}; border-bottom-width:{{BOTTOM}}{{UNIT}}; border-left-width:{{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->add_control(
            'smart_count_down_border_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-count-down-wrap' => 'border-color: {{VALUE}}',
                ],
            ]
        );  
        $this->end_controls_section();
 
   		
	}
	protected function render() {
		$settings = $this->get_settings_for_display(); 
        $count_val = $settings['smart_count_down_number']; 
        $count_ttl = $settings['smart_count_down_title']; 
		?>   
        <div class="smart-count-down-wrap">  
            <div class="smart-count-down text-center">
                <h3 class="smart-count"><?php echo esc_html($count_val); ?></h3>
                <p class="c-ttl"><?php echo wp_kses_post($count_ttl); ?></p>
            </div> 
        </div>
	<?php
	}
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Count_Down() );