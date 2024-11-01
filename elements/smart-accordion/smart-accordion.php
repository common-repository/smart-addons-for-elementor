<?php
namespace Elementor;

class Smart_Accordion extends Widget_Base {
	
	public function get_name() {
		return 'smart-accordion';
	}
	public function get_title() {
		return esc_html__( 'Smart Accordion', 'smart-addons-elementor' );
	}
	public function get_icon() {
		return 'smart-element-icon eicon-accordion';
	}
	public function get_categories() {
		return [ 'smart-addons-elementor' ];
	}
	protected function _register_controls() {
		
        $this->start_controls_section(
            'smart_accordion',
            [
                'label' => esc_html__( 'Contents', 'smart-addons-elementor' ),
            ]
        );

        $this->add_control(
            'smart_accordion_no',
            [
                'label' => esc_html__( 'Accordion ID', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1',
                'description' => esc_html__( 'Must be insert an ID. If you use accordion multiple in a single page. And it should be diffrent from each others.', 'smart-addons-elementor' ), 
            ]
        ); 
        $accordion_repeater = new Repeater();
  
        $accordion_repeater->add_control(
            'smart_accordion_b4_icon_bg_onof',
            [
                'label' => esc_html__( 'Icon', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'your-plugin' ),
                'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                'return_value' => 'on',
                'default' => 'of',
            ]
        );
        $accordion_repeater->add_control(
            'smart_accordion_b4_icon_clas',
            [
                'label' => esc_html__( 'Icon Class', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'icon-add',
                'description' => esc_html__( 'Insert icon class here.', 'smart-addons-elementor' ),
                'condition' => [
                    'smart_accordion_b4_icon_bg_onof' => 'on',
                ]
            ]
        ); 
        $accordion_repeater->add_control(
            'smart_accordion_b4_icon_clr',
            [
                'label' => esc_html__( 'Icon Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'smart_accordion_b4_icon_bg_onof' => 'on',
                ]
            ]
        );

        $accordion_repeater->add_control(
            'smart_accordion_title',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Write accordion title.', 'smart-addons-elementor' ),
            ]
        );
        $accordion_repeater->add_control(
            'smart_accordion_title_color_style',
            [
                'label' => esc_html__( 'Text Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR
            ]
        );
        
        $accordion_repeater->add_control(
            'smart_accordion_text',
            [
                'label' => esc_html__( 'Text', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Write accordion content.', 'smart-addons-elementor' ),
            ]
        ); 
        
        $this->add_control(
            'smart_accordion_repeater',
            [
                'label' => esc_html__( 'Accordion', 'smart-addons-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $accordion_repeater->get_controls(),
                'title_field' => '{{{ smart_accordion_title }}}',
                'default' => [
                        [
                            'smart_accordion_title' => esc_html__( 'Title #1', 'smart-addons-elementor' ),
                            'smart_accordion_text' => esc_html__( 'Add accordin content here', 'smart-addons-elementor' ),
                        ],
                        [
                            'smart_accordion_title' => esc_html__( 'Title #2', 'smart-addons-elementor' ),
                            'smart_accordion_text' => esc_html__( 'Add accordin content here', 'smart-addons-elementor' ),
                        ],
                        [
                            'smart_accordion_title' => esc_html__( 'Title #3', 'smart-addons-elementor' ),
                            'smart_accordion_text' => esc_html__( 'Add accordin content here', 'smart-addons-elementor' ),
                        ]
                ]   
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'smart_accordion_settings_expand',
            [
                'label' => esc_html__( 'Settings', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'smart_accordion_expand_icon_settigns',
            [
                'label' => esc_html__( 'Expand Icon', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'arrow',
                'options' => [
                    'arrow'  => esc_html__( 'Arrow', 'smart-addons-elementor' ),
                    'plus' => esc_html__( 'Plus', 'smart-addons-elementor' ),
                    'none' => esc_html__( 'None', 'smart-addons-elementor' ),
                ]
            ]
        );
        $this->end_controls_section();
		/*
		* Accordion Styling Section
		*/ 
        $this->start_controls_section(
            'smart_accordion_style',
            [
                'label' => esc_html__( 'Icon', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'smart_accordion_b4_icon_b4title',
            [
                'label' => esc_html__( 'Icon (before title)', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'smart_accordion_b4_icon_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-srvc-ico' => 'color: {{VALUE}}',
                ],
            ]
        ); 

        $this->add_control(
            'smart_accordion_b4_icon_border_r8',
            [
                'label' => esc_html__( 'Border Right', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'your-plugin' ),
                'label_off' => esc_html__( 'Hide', 'your-plugin' ),
                'return_value' => 'on',
                'default' => 'of',
            ]
        );
        
        $this->add_control(
            'smart_accordion_aftr_icon_b4title',
            [
                'label' => esc_html__( 'Icon (after title)', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'smart_accordion_aftr_icon_color',
            [
                'label' => esc_html__( 'Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-srvc-ico' => 'color: {{VALUE}}',
                ],
            ]
        ); 
 
		$this->end_controls_section();

        $this->start_controls_section(
            'smart_accordion_title_style',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_title_clr',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-accordion-block-title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        ); 
		$this->end_controls_section();

        $this->start_controls_section(
            'smart_accordion_content_style',
            [
                'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );  

        $this->add_control(
            'smart_accordion_content_color_style',
            [
                'label' => esc_html__( 'Text Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smart-accordion-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_content_clr',
                'label' => esc_html__( 'Typography', 'smart-addons-elementor' ),
                'selector' => '{{WRAPPER}} .smart-accordion-content',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        ); 

        $this->end_controls_section();
   		
	}
	protected function render() {
		$settings = $this->get_settings_for_display(); 
        $accordion_list = $settings['smart_accordion_repeater'];
        $acc_ID = $settings['smart_accordion_no']; 
        $ico_bdr = $settings['smart_accordion_b4_icon_border_r8']; 
		?>   

        <!--Accordion wrapper-->
        <div class="accordion smart-accordion" id="SmartAccordion_<?php echo $acc_ID; ?>" role="tablist" aria-multiselectable="true">

        <?php 
        $accordion_qty = count($accordion_list);
        $i = 0;
        foreach ($accordion_list as $key => $value) { 
            $acc_onof = $value['smart_accordion_b4_icon_bg_onof'];
            ?>
            <!-- Accordion card -->
            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="heading_<?php echo esc_attr($i); ?><?php echo esc_attr($acc_ID); ?>">
                    <a class="<?php echo esc_attr(($i!=$accordion_qty-1) ? 'collapsed' : ''); ?>" data-toggle="collapse" data-parent="#SmartAccordion_<?php echo esc_attr($acc_ID); ?>" href="#collapse_<?php echo esc_attr($i); ?><?php echo esc_attr($acc_ID); ?>"
                    aria-expanded="false" aria-controls="collapse_<?php echo esc_attr($i); ?><?php echo esc_attr($acc_ID); ?>">
                        <h5 class="mb-0 <?php echo esc_attr(($ico_bdr == 'on') ? 'acc-title' : ''); ?>" style="color:<?php echo esc_attr($value['smart_accordion_title_color_style']); ?>">
                            <?php if($acc_onof=='on'): ?>
                                <i class="<?php echo esc_attr($value['smart_accordion_b4_icon_clas']); ?> <?php echo esc_attr(($ico_bdr == 'on') ? 'b4-ico' : ''); ?> acorico elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>"></i>&nbsp;
                            <?php endif; ?> 
                            <?php echo esc_html($value['smart_accordion_title']); ?> 
                            <?php if($settings['smart_accordion_expand_icon_settigns']=='arrow'): ?>
                                <i class="icon-next rotate-icon"></i>
                            <?php elseif($settings['smart_accordion_expand_icon_settigns']=='plus'): ?>
                                <span class="plus-icon rotate-icon"></span>
                            <?php endif; ?>
                        </h5>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapse_<?php echo esc_attr($i); ?><?php echo esc_attr($acc_ID); ?>" class="collapse <?php echo esc_attr(($i!=$accordion_qty-1) ? '' : 'show'); ?>" role="tabpanel" aria-labelledby="heading_<?php echo esc_attr($i); ?><?php echo esc_attr($acc_ID); ?>"
                data-parent="#SmartAccordion_<?php echo esc_attr($acc_ID); ?>">
                    <div class="card-body"> 
                        <?php echo wp_kses_post($value['smart_accordion_text']); ?> 
                    </div>
                </div>

            </div>
            <!-- Accordion card -->
        <?php $i++; } ?> 
        </div>
        <!-- Accordion wrapper -->
	<?php
	}
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Accordion() );