<?php
namespace Elementor;

class Smart_Testimonial extends Widget_Base {
    
    public function get_name() {
        return 'smart-testimonial';
    }
    public function get_title() {
        return  esc_html__( 'Smart Testimonial', 'smart-addons-elementor' );
    }
    public function get_icon() {
        return 'smart-element-icon eicon-testimonial';
    }
    public function get_categories() {
        return [ 'smart-addons-elementor' ];
    }
    protected function _register_controls() {
        
        // Settings
        $this->start_controls_section(
            'smart_testimonial_settings',
            [
                'label' =>  esc_html__( 'Settings', 'smart-addons-elementor' )
            ]
        );

        $this->add_control(
            'smart_testimonial_settings_testi_type',
            [
                'label' =>  esc_html__( 'Testimoial Type', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'box',
                'options' => [
                    'box'  =>  esc_html__( 'Box', 'smart-addons-elementor' ), 
                    'slider' =>  esc_html__( 'Slider', 'smart-addons-elementor' ),
                ] 
            ]
        ); 
        $this->add_control(
            'smart_testimonial_settings_style',
            [
                'label' =>  esc_html__( 'Box Style', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'text-center'  =>  esc_html__( 'Center', 'smart-addons-elementor' ), 
                    'default' =>  esc_html__( 'Default', 'smart-addons-elementor' ),
                ],
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ]
            ]
        ); 
        $this->add_control(
            'smart_testimonial_settings_slider_style',
            [
                'label' =>  esc_html__( 'Slider Style', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'vertical'  =>  esc_html__( 'Vertical', 'smart-addons-elementor' ), 
                    'default' =>  esc_html__( 'Default', 'smart-addons-elementor' ),
                ],
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'slider',
                ]
            ]
        ); 

        $this->end_controls_section();
  
        $this->start_controls_section(
            'smart_testimonial',
            [
                'label' =>  esc_html__( 'Contents', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'smart_slide_testimonial_title',
            [
                'label' =>  esc_html__( 'Title', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>  esc_html__( 'Write title here.', 'smart-addons-elementor' ),  
            ]
        );  
        $slider_repeater = new Repeater();

        $slider_repeater->add_control(
            'smart_slide_testimonial_comment',
            [
                'label' =>  esc_html__( 'Testimonial Text', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' =>  esc_html__( 'Write your testimonial here.', 'smart-addons-elementor' ),  
            ]
        );  
        $slider_repeater->add_control(
            'smart_slide_testimonial_name',
            [
                'label' =>  esc_html__( 'Name', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>  esc_html__( 'Write your name here.', 'smart-addons-elementor' ),  
            ]
        );  
        $slider_repeater->add_control(
            'smart_slide_testimonial_designation',
            [
                'label' =>  esc_html__( 'Designation', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>  esc_html__( 'Write your designation here.', 'smart-addons-elementor' ),  
            ]
        );  
        $slider_repeater->add_control(
            'smart_profile_icon_bg_onof',
            [
                'label' =>  esc_html__( 'Profile Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' =>  esc_html__( 'Show', 'your-plugin' ),
                'label_off' =>  esc_html__( 'Hide', 'your-plugin' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );
        $slider_repeater->add_control(
            'smart_slide_testimonial_image',
            [
                'label' =>  esc_html__( 'Profile Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'smart_profile_icon_bg_onof' => 'on'
                ]
            ]
        );
        $slider_repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [
                    'smart_slide_testimonial_profle_image[url]!' => '',
                ]
            ]
        );
        $slider_repeater->add_control(
            'smart_slide_testimonial_sign_image',
            [
                'label' =>  esc_html__( 'Signature Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ] 
            ]
        );
        $slider_repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [
                    'smart_slide_testimonial_sign_image[url]!' => '',
                ]
            ]
        );
        
        $this->add_control(
            'smart_slider_repeater',
            [
                'label' =>  esc_html__( 'Add Slide', 'smart-addons-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $slider_repeater->get_controls(),
                'title_field' => '{{{ smart_slide_testimonial_comment }}}',
                'default' => [
                        [
                            'smart_slide_testimonial_comment' =>  esc_html__( 'Text #1', 'smart-addons-elementor' ),
                            'smart_slide_testimonial_name' =>  esc_html__( 'Write name here.', 'smart-addons-elementor' ), 
                        ],  
                        [
                            'smart_slide_testimonial_comment' =>  esc_html__( 'Text #2', 'smart-addons-elementor' ),
                            'smart_slide_testimonial_name' =>  esc_html__( 'Write name here.', 'smart-addons-elementor' ), 
                        ],  
                        [
                            'smart_slide_testimonial_comment' =>  esc_html__( 'Text #3', 'smart-addons-elementor' ),
                            'smart_slide_testimonial_name' =>  esc_html__( 'Write name here.', 'smart-addons-elementor' ), 
                        ]
                ],
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'slider',
                ] 
            ]
        );


        $this->add_control(
            'smart_testimonial_comment',
            [
                'label' =>  esc_html__( 'Testimonial Text', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' =>  esc_html__( 'Write your testimonial here.', 'smart-addons-elementor' ),
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ]  
            ]
        );  
        $this->add_control(
            'smart_testimonial_name',
            [
                'label' =>  esc_html__( 'Name', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>  esc_html__( 'Write your name here.', 'smart-addons-elementor' ),  
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ]  
            ]
        );  
        $this->add_control(
            'smart_testimonial_designation',
            [
                'label' =>  esc_html__( 'Designation', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' =>  esc_html__( 'Write your designation here.', 'smart-addons-elementor' ),
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ]    
            ]
        );  
        $this->add_control(
            'smart_testimonial_image',
            [
                'label' =>  esc_html__( 'Profile Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ]  
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'full',
                'condition' => [
                    'smart_testimonial_profle_image[url]!' => '',
                ],
            ]
        );
        $this->end_controls_section();
 
        /*
        * Styles
        */ 
        $this->start_controls_section(
            'smart_testimonial_icon_style',
            [
                'label' =>  esc_html__( 'Icon', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 
        $this->add_control(
            'smart_testimonial_icon_style_clr',
            [
                'label' =>  esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-testimonial-content:before' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .smart-testimonial-heading:before' => 'color: {{VALUE}}',
                ]
            ]
        );  
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'testi_icon_shadow',
                'label' =>  esc_html__( 'Icon Shadow', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-testimonial-content:before',
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ] 
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'testi_icon_slide_shadow',
                'label' =>  esc_html__( 'Icon Shadow', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-testimonial-heading:before',
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'slider',
                ] 
            ]
        );
        $this->end_controls_section();
 
        $this->start_controls_section(
            'smart_testimonial_comment_style',
            [
                'label' =>  esc_html__( 'Text', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'smart_testimonial_comment_style_clr',
            [
                'label' =>  esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-testimonial-content' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .smart-testimonial-content-slide' => 'color: {{VALUE}}',
                ],
            ]
        );  
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'smart_testimonial_comment_style_typo',
                'label' =>  esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-testimonial-content',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ] 
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'smart_testimonial_comment_style_slide_typo',
                'label' =>  esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-testimonial-content-slide',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'slider',
                ] 
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'smart_testimonial_name_style',
            [
                'label' =>  esc_html__( 'Name', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'smart_testimonial_name_style_clr',
            [
                'label' =>  esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-testimonial-info h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .name-design .name' => 'color: {{VALUE}}',
                ],
            ]
        );  
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'smart_testimonial_name_type',
                'label' =>  esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-testimonial-info h4',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ] 
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'smart_testimonial_name_slide_type',
                'label' =>  esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .name-design .name',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'slider',
                ] 
            ]
        );
        $this->end_controls_section();
 
        $this->start_controls_section(
            'smart_testimonial_desig_style',
            [
                'label' =>  esc_html__( 'Designation', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
 
        $this->add_control(
            'smart_testimonial_desig_style_clr',
            [
                'label' =>  esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-testimonial-info p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .name-design p' => 'color: {{VALUE}}',
                ],
            ]
        );  
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'smart_testimonial_desig_style_typo',
                'label' =>  esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-testimonial-info p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'box',
                ] 
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'smart_testimonial_desig_slide_style_typo',
                'label' =>  esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .name-design p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
                'condition' => [
                    'smart_testimonial_settings_testi_type' => 'slider',
                ] 
            ]
        );
        $this->end_controls_section();
 
        
    }
    protected function render() {
        $settings = $this->get_settings_for_display();   
        $profile_url = $settings['smart_testimonial_image']['url'] ? $settings['smart_testimonial_image']['url'] : (SMARTAD_ASSETS_URL.'img/testimonial-1.png');  
        $image_id = $settings['smart_testimonial_image']['id'];
        $style = $settings['smart_testimonial_settings_style'];
        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

        $slider_type = $settings['smart_testimonial_settings_slider_style'];

        $type = $settings['smart_testimonial_settings_testi_type'];
        $sliders = $settings['smart_slider_repeater'];


        if($type=='slider'):
        ?>    
            <div class="smart-testimonial-slider-wrap">
                <div class="owl-carousel owl-theme <?php echo esc_attr(($slider_type=='vertical') ? 'smart-testimonial-slider-vertical' : 'smart-testimonial-slider-default'); ?>">
                    <?php $i=0;
                    foreach ($sliders as $key => $value) {  

                        $profile_slide_image_alt = get_post_meta( $value['smart_slide_testimonial_image']['id'], '_wp_attachment_image_alt', true ); 
                        $slide_image_alt = get_post_meta( $value['smart_slide_testimonial_sign_image']['id'], '_wp_attachment_image_alt', true ); 
                        ?>
                        <div class="item"> 
                            <?php if($slider_type=='vertical'): ?>
                                <div class="smart-width-50 smart-testimonial-silder-image">
                                    <img src="<?php echo esc_url($value['smart_slide_testimonial_image']['url']); ?>" alt="<?php echo esc_attr($profile_slide_image_alt); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="<?php echo esc_attr(($slider_type=='vertical') ? 'smart-width-50' : 'smart-width-default'); ?> smart-testimonial-slider-content-box">
                                <h3 class="smart-testimonial-heading"><?php echo esc_html__($settings['smart_slide_testimonial_title']); ?></h3>
                                <div class="smart-testimonial-slider-content">
                                    <p class="smart-testimonial-content-slide"><?php echo esc_html__($value['smart_slide_testimonial_comment']); ?></p>
                                </div>
                                <div class="smart-testimonial-name-sign">
                                    <div class="sign <?php echo esc_attr(($slider_type=='vertical') ? 'float-left' : ''); ?>">
                                        <img src="<?php echo esc_url($value['smart_slide_testimonial_sign_image']['url']); ?>" alt="<?php echo esc_attr($slide_image_alt); ?>">
                                    </div>
                                    <div class="name-design <?php echo esc_attr(($slider_type=='vertical') ? 'float-left' : ''); ?>">
                                        <h6 class="name "><?php echo esc_html__($value['smart_slide_testimonial_name']); ?></h6>
                                        <p><?php echo wp_kses_post($value['smart_slide_testimonial_designation']); ?></p>
                                    </div> 
                                </div>
                            </div> 
                        </div>   
                    <?php $i++; } ?>   
                </div>
            </div>
        <?php else: ?>
            <div class="smart-testimonial-box <?php echo $style; ?>">
                <div class="smart-testimonial-top">
                    <p class="smart-testimonial-content">
                        <?php echo wp_kses_post($settings['smart_testimonial_comment']);  ?>
                    </p>
                </div>
                <div class="smart-testimonial-bottom">
                    <div class="smart-testimonial-img <?php echo ($style == 'text-center') ? 'text-center' : 'float-left'; ?>">
                        <img src="<?php echo esc_url($profile_url);?>" alt="<?php echo $image_alt; ?>">
                    </div>
                    <div class="smart-testimonial-info <?php echo ($style == 'text-center') ? 'text-center' : 'float-left'; ?>"> 
                        <h4><?php echo esc_html__($settings['smart_testimonial_name']);  ?></h4>
                        <p><?php echo wp_kses_post($settings['smart_testimonial_designation']);  ?></p>
                    </div>
                </div>
            </div>  
        <?php endif; ?>
    <?php
    }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Testimonial() );