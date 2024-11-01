<?php
namespace Elementor;

class Smart_Tab extends Widget_Base {
    
    public function get_name() {
        return 'smart-tab';
    }
    public function get_title() {
        return esc_html__( 'Smart Tab', 'smart-addons-elementor' );
    }
    public function get_icon() {
        return 'smart-element-icon eicon-tabs';
    }
    public function get_categories() {
        return [ 'smart-addons-elementor' ];
    }
    protected function _register_controls() {
         
        $this->start_controls_section(
            'smart_tab',
            [
                'label' => esc_html__( 'Contents', 'smart-addons-elementor' )
            ]
        ); 
        $this->add_control(
            'smart_tab_no',
            [
                'label' => esc_html__( 'Tab ID', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1',
                'description' => esc_html__( 'Must be insert an ID. If you use multiple tabs in a single page. And it should be diffrent from each others.', 'smart-addons-elementor' ), 
            ]
        ); 
        
        $this->add_control(
            'smart_tab_style_type',
            [
                'label' => esc_html__( 'Tab Style', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'tab-1s',
                'options' => [
                    'tab-1s'  => esc_html__( 'One', 'smart-addons-elementor' ),
                    'tab-2s' => esc_html__( 'Two', 'smart-addons-elementor' ),
                    'tab-3s' => esc_html__( 'Three', 'smart-addons-elementor' )
                ]
            ]
        );
        $tab_repeater = new Repeater();

        $tab_repeater->add_control(
            'smart_tab_content_h',
            [
                'label' => esc_html__( 'Content', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );      

        $tab_repeater->add_control(
            'smart_tab_title',
            [
                'label' => esc_html__( 'Tab Title', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Write tab title here.', 'smart-addons-elementor' ),  
            ]
        );  
        $tab_repeater->add_control(
            'smart_tab_title_icon',
            [
                'label' => esc_html__( 'Icon Class', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Insert icon class here.', 'smart-addons-elementor' ),  
            ]
        );  
        $tab_repeater->add_control(
            'smart_tab_content',
            [
                'label' => esc_html__( 'Tab Content', 'smart-addons-elementor' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => esc_html__( 'Write content here.', 'smart-addons-elementor' ),  
            ]
        );   
        $tab_repeater->add_control(
            'smart_tab_styles_d',
            [
                'label' => esc_html__( 'Default Styles', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );      
 
        $tab_repeater->add_control(
            'smart_tab_title_color_style',
            [
                'label' => esc_html__( 'Title Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '#4941e9',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                ]
            ]
        );
        $tab_repeater->add_control(
            'smart_tab_title_bgcolor_style',
            [
                'label' => esc_html__( 'Title Background Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                ]
            ]
        );  
        $tab_repeater->add_control(
            'smart_tab_title_bdrcolor_style',
            [
                'label' => esc_html__( 'Title Border Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-color: {{VALUE}};',
                ]
            ]
        );  
        $tab_repeater->add_control(
            'smart_tab_styles_h',
            [
                'label' => esc_html__( 'Active Styles', 'plugin-name' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );    
        $tab_repeater->add_control(
            'smart_tab_title_color_hvr_style',
            [
                'label' => esc_html__( 'Title Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.active' => 'color: {{VALUE}};',
                ]
            ]
        );  
        $tab_repeater->add_control(
            'smart_tab_title_bgcolor_hvr_style',
            [
                'label' => esc_html__( 'Title Background Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.active' => 'background-color: {{VALUE}};border-color: {{VALUE}};',
                ]
            ]
        );
        $tab_repeater->add_control(
            'smart_tab_title_hvrbdrcolor_style',
            [
                'label' => esc_html__( 'Title Border Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.active' => 'border-color: {{VALUE}};',
                ]
            ]
        );  
        $tab_repeater->add_control(
            'smart_tab_title_bdrbtm_color_style',
            [
                'label' => esc_html__( 'Title Border Bottom Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'default'=> '#4941e9',
                'description'=> esc_html__( 'This is only for Tab style TWO', 'smart-addons-elementor' ),
                'selectors' => [
                    '{{WRAPPER}} .tab-1s {{CURRENT_ITEM}}.active' => 'border-bottom-color: {{VALUE}} !important;',
                ]
            ]
        );   
        $this->add_control(
            'smart_tab_repeater',
            [
                'label' => esc_html__( 'Add Tab', 'smart-addons-elementor' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $tab_repeater->get_controls(),
                'title_field' => '{{{ smart_tab_title }}}',
                'default' => [
                        [
                            'smart_tab_title' => esc_html__( 'Title #1', 'smart-addons-elementor' ),
                            'smart_tab_content' => esc_html__( 'Write content here.', 'smart-addons-elementor' ), 
                        ], 
                        [
                            'smart_tab_title' => esc_html__( 'Title #2', 'smart-addons-elementor' ),
                            'smart_tab_content' => esc_html__( 'Write content here.', 'smart-addons-elementor' ), 
                        ],
                        [
                            'smart_tab_title' => esc_html__( 'Title #3', 'smart-addons-elementor' ),
                            'smart_tab_content' => esc_html__( 'Write content here.', 'smart-addons-elementor' ), 
                        ] 
                ] 
            ]
        );
        $this->end_controls_section();
 
        
    }
    protected function render() {
        $settings = $this->get_settings_for_display(); 
        $TAB_ID = $settings['smart_tab_no'];     
        $tab_list = $settings['smart_tab_repeater'];
        $tab_style = $settings['smart_tab_style_type'];
        ?>     

        <div class="smart-tab-wrap <?php echo esc_attr($tab_style); ?>">
          <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <?php 
            $tab_qty = count($tab_list);
            $i = 0;
            foreach ($tab_list as $key => $value) { 
                $tab_title = $value['smart_tab_title'];
                $tab_icon = $value['smart_tab_title_icon']; 
                ?>
              <a class="nav-item nav-link <?php echo esc_attr(($i==0) ? 'active' : ''); ?> elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>" id="nav-tab-<?php echo esc_attr($TAB_ID); ?>-<?php echo esc_attr($i); ?>" data-toggle="tab" href="#nav-<?php echo esc_attr($TAB_ID); ?>-<?php echo esc_attr($i); ?>" role="tab" aria-controls="nav-<?php echo esc_attr($TAB_ID); ?>-<?php echo esc_attr($i); ?>" aria-selected="true"> <i class="<?php echo esc_attr($tab_icon); ?>"></i> <?php echo esc_html($tab_title); ?></a> 
            <?php $i++; } ?> 
            </div>
          </nav> 
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent"> 
            <?php 
            $tab_qty = count($tab_list);
            $i = 0;
            foreach ($tab_list as $key => $value) {  
                $tab_content = $value['smart_tab_content']; 
                ?>
                <div class="tab-pane fade <?php echo esc_attr(($i==0) ? 'show active' : ''); ?>" id="nav-<?php echo esc_attr($TAB_ID); ?>-<?php echo esc_attr($i); ?>" role="tabpanel" aria-labelledby="nav-tab-<?php echo esc_attr($TAB_ID); ?>-<?php echo esc_attr($i); ?>"><?php echo wp_kses_post($tab_content); ?></div>
            <?php $i++; } ?> 
          </div>
        
        </div>        

    <?php
    }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Tab() );