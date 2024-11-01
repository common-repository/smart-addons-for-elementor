<?php
namespace Elementor;

class Smart_Before_After extends Widget_Base {
    
    public function get_name() {
        return 'smart-before-after';
    }
    public function get_title() {
        return esc_html__( 'Smart Before After', 'smart-addons-elementor' );
    }
    public function get_icon() {
        return 'smart-title-icon eicon-adjust';
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
            'smart_bra4_box_w',
            [
                'label' => esc_html__( 'Box Width', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'], 
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ]
                ], 
                'selectors' => [
                    '{{WRAPPER}} .uniq .twentytwenty-container' => 'width: {{SIZE}}{{UNIT}} !important;',
                ]
            ]
        ); 
        $this->add_control(
            'smart_bra4_box_h',
            [
                'label' => esc_html__( 'Box Height', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'], 
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ]
                ], 
                'selectors' => [
                    '{{WRAPPER}} .uniq .twentytwenty-container' => 'height:{{SIZE}}{{UNIT}} !important;',
                ]
            ]
        ); 
        $this->add_control(
            'smart_bra4_dir',
            [
                'label' => esc_html__( 'Direction', 'smart-addons-elementor' ), 
                'type' => Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal'  => esc_html__( 'Horizontal', 'smart-addons-elementor' ),
                    'vertical' => esc_html__( 'Vertical', 'smart-addons-elementor' ) 
                ], 
            ]
        ); 
        $this->add_control(
            'smart_before_image',
            [
                'label' => esc_html__( 'Before Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'before_thumbnail',
                'default' => 'full',
                'condition' => [
                    'smart_before_image[url]!' => '',
                ]
            ]
        );

        $this->add_control(
            'smart_after_image',
            [
                'label' => esc_html__( 'After Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'after_thumbnail',
                'default' => 'full',
                'condition' => [
                    'smart_after_image[url]!' => '',
                ]
            ]
        );
            

        $this->end_controls_section();
   
    }
    protected function render() {
        $settings = $this->get_settings_for_display(); 

        $before_img_alt = get_post_meta( $settings['smart_before_image']['id'], '_wp_attachment_image_alt', true ); 
        $after_image_alt = get_post_meta( $settings['smart_after_image']['id'], '_wp_attachment_image_alt', true ); 
        $this->add_render_attribute( 'smart-bra4-wrap', 
            [
                'class'=> 'uniq',
                'data-direction' => $settings['smart_bra4_dir']
            ]); 
        ?>  
            <div <?php echo $this->get_render_attribute_string( 'smart-bra4-wrap' ); ?> >
                <div class="twentytwenty-container" >
                  <img class="b4" src="<?php echo esc_url($settings['smart_before_image']['url']); ?>" alt="<?php echo esc_attr($before_img_alt); ?>" />
                  <img class="a4" src="<?php echo esc_url($settings['smart_after_image']['url']); ?>" alt="<?php echo esc_attr($after_image_alt); ?>" />
                </div>
            </div>
    <?php
    }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Before_After() );