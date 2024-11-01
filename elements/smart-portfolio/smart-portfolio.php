<?php
namespace Elementor;

class Smart_Portfolio extends Widget_Base {
	
	public function get_name() {
		return 'smart-portfolio';
	}
	public function get_title() {
		return esc_html__( 'Smart Portfolio', 'smart-addons-elementor' );
	}
	public function get_icon() {
		return 'smart-element-icon eicon-slideshow';
	}
	public function get_categories() {
		return [ 'smart-addons-elementor' ];
	}
	protected function _register_controls() {
		 
		/**
		* Service Content Section
		*/
		$this->start_controls_section(
			'smart_portfolio_content',
			[
				'label' => esc_html__( 'Content', 'smart-addons-elementor' ),
			]
		);
		 
        $this->add_control(
            'smart_portfolio_block_tab_style',
            [
                'label' => esc_html__( 'Portfolio Type', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'blcok',
                'description' => 'If you select filter then you need to create portfolio first. Go to <a target="_blank" href="'.admin_url('/edit.php?post_type=smartad_portfolios').'">here</a> to create portfolio.',
                'options' => [
                    'blcok'  => esc_html__( 'Block', 'smart-addons-elementor' ),
                    'filter' => esc_html__( 'Filter', 'smart-addons-elementor' ) 
                ]
            ]
        );

        $this->add_control(
            'smart_portfolio_profile_image',
            [
                'label' => esc_html__( 'Image', 'smart-addons-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'smart_portfolio_block_tab_style' => 'blcok',
                ]  
            ]
        );

        $this->add_control(
            'smart_portfolio_profile_image_size',
            [
                'label' => esc_html__( 'Image Dimension', 'smart-addons-elementor' ),
                'type' => Controls_Manager::IMAGE_DIMENSIONS,
                'description' => esc_html__( 'Set custom width or height to keep the original size ratio. Remember set width & height same if you use round style for this image.', 'smart-addons-elementor' ),
                'default' => [
                    'width' => '',
                    'height' => '',
                ],
                'condition' => [
                    'smart_portfolio_profile_image[url]!' => '',
                    'smart_portfolio_block_tab_style' => 'blcok',
                ]
            ]
        );
        $this->add_control(
            'smart_portfolio_title',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'David Smith',
                'description' => esc_html__( 'Write title here.', 'smart-addons-elementor' ),
                'condition' => [
                    'smart_portfolio_block_tab_style' => 'blcok',
                ] 
            ]
        ); 

        $this->add_control(
            'smart_portfolio_subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Gallery',
                'description' => esc_html__( 'Write subtitle title.', 'smart-addons-elementor' ),
                'condition' => [
                    'smart_portfolio_block_tab_style' => 'blcok',
                ] 
            ]
        );  


        // ==========================================================================
        $this->add_control(
            'smart_portfolio_tab_title',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
                'description' => esc_html__( 'Write title title.', 'smart-addons-elementor' ),
                'condition' => [
                    'smart_portfolio_block_tab_style' => 'filter',
                ] 
            ]
        );       
        $this->add_control(
            'smart_portfolio_tab_qty',
            [
                'label' => esc_html__( 'Number of Portfolio to Show', 'smart-addons-elementor' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '3',
                'description' => esc_html__( 'Insert numerice value here.', 'smart-addons-elementor' ),
                'condition' => [
                    'smart_portfolio_block_tab_style' => 'filter',
                ] 
            ]
        );   
        // ==============================================================

		$this->end_controls_section();

        // title style
        $this->start_controls_section(
            'smart_portfolio_img_style',
            [
                'label' => esc_html__( 'Image', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );  
        $this->add_control(
            'port_ico_grd_clr',
            [
                'label' => esc_html__( 'Gradient Overlay', 'smart-addons-elementor' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__( 'None', 'smart-addons-elementor' ),
                'label_on' => esc_html__( 'Custom', 'smart-addons-elementor' ),
                'return_value' => 'yes', 
            ]
        );

        $this->start_popover();
 
        $this->add_control(
            'port_ico_grd_clr_1',
            [
                'label' => esc_html__( 'First Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR, 
                'condition' => [
                    'port_ico_grd_clr' => 'yes' 
                ],
            ]
        );
        $this->add_control(
            'port_ico_grd_clr_2',
            [
                'label' => esc_html__( 'Second Color', 'smart-addons-elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [ 
                    '{{WRAPPER}} .smart-portfolio-img.gradient-overlay::after' => 'background-image: linear-gradient(0deg, {{port_ico_grd_clr_1.VALUE}} 40%, {{port_ico_grd_clr_2.VALUE}} 100%);',
                ],
                'condition' => [
                    'port_ico_grd_clr' => 'yes'
                ],
            ]
        ); 
 
        $this->end_popover();


        $this->add_responsive_control(
            'smart_portfolio_img_spac_style',
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
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .smart-portfolio-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();

        //  content block
        $this->start_controls_section(
            'smart_portfolio_content block_style',
            [
                'label' => esc_html__( 'Content Block', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );   
        $this->add_responsive_control(
            'smart_portfolio_content_block_padding_style',
            [
                'label' => esc_html__( 'Block Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_control(
            'smart_portfolio_content_block_style',
            [
                'label' => esc_html__('Block BG Color', 'smart-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .smart-portfolio-content' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'smart_portfolio_content_block_pos_style',
            [
                'label' => esc_html__( 'Block Possition', 'smart-addons-elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'bottom',
                'options' => [
                    'bottom'  => esc_html__( 'Bottom', 'smart-addons-elementor' ),
                    'overlap' => esc_html__( 'Overlap', 'smart-addons-elementor' ) 
                ]
            ]
        );
        $this->end_controls_section();
        //  title
        $this->start_controls_section(
            'smart_portfolio_title_style',
            [
                'label' => esc_html__( 'Title', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );   
        $this->add_control(
            'smart_portfolio_title_color_style',
            [
                'label' => esc_html__('Color', 'smart-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .smart-portfolio-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'portfolio_title_typography',
                'selector' => '{{WRAPPER}} .smart-portfolio-title',
            ]
        );

        $this->add_responsive_control(
            'smart_portfolio_title_spacing_style',
            [
                'label' => esc_html__( 'Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-portfolio-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );  
        $this->end_controls_section();
 
        //  subtitle
        $this->start_controls_section(
            'smart_portfolio_subtitle_style',
            [
                'label' => esc_html__( 'Subtitle', 'smart-addons-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );   
        $this->add_control(
            'smart_portfolio_subtitle_color_style',
            [
                'label' => esc_html__('Color', 'smart-addons-elementor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .smart-portfolio-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'portfolio_subtitle_typography',
                'selector' => '{{WRAPPER}} .smart-portfolio-subtitle',
            ]
        );

        $this->add_responsive_control(
            'smart_portfolio_subtitle_spacing_style',
            [
                'label' => esc_html__( 'Padding', 'smart-addons-elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .smart-portfolio-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );   
        $this->end_controls_section();
 
 
	}
	protected function render() {
        $settings = $this->get_settings_for_display(); 
        $image_url = !empty($settings['smart_portfolio_profile_image']['url']) ? ($settings['smart_portfolio_profile_image']['url']) : (SMARTAD_ASSETS_URL.'img/team.png');  
        $image_id = $settings['smart_portfolio_profile_image']['id'];
        $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); 
        $image_size = $settings['smart_portfolio_profile_image_size'];
        $width = $image_size['width']; 
        $height = $image_size['height'];

        $block_pos = $settings['smart_portfolio_content_block_pos_style'];
        $gradient_overlay = $settings['port_ico_grd_clr'];
        $portfolio_type = $settings['smart_portfolio_block_tab_style'];

        $portfolio_tab_title = $settings['smart_portfolio_tab_title'];

        $this->add_render_attribute( 'smart-portfolio', 
            [
                'class'=> 'smart-portfolio-filter',
                'data-type' => $portfolio_type
            ]); 

        if($portfolio_type!='filter'){
    		?>  
    		<div class="smart-portfolio-block text-center">
    			<div class="smart-portfolio-img <?php echo esc_attr(($gradient_overlay=='yes') ? 'gradient-overlay' : ''); ?>"> 
                    <img style="<?php echo esc_attr($width ? "width:{$width}px;" : ""); ?><?php echo esc_attr($height ? "height:{$height}px;" : ""); ?>" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
    			</div>
                <div class="smart-portfolio-content <?php echo esc_attr($block_pos); ?>"> 
        			<h3 class="smart-portfolio-title"><?php echo esc_html($settings['smart_portfolio_title']); ?></h5>
        			<p class="smart-portfolio-subtitle"><?php echo wp_kses_post($settings['smart_portfolio_subtitle']); ?></p>
                </div> 
    		</div> 
        <?php }else{ ?>
            <div <?php echo $this->get_render_attribute_string( 'smart-portfolio' ); ?> >
                <div class="container"> 
                    <div class="row">
                        <div class="col-md-6">
                            <?php if($portfolio_tab_title): ?>
                                <h2 class="smart-portfolio-filter-heading"><?php echo esc_html($portfolio_tab_title); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">                            
                            <ul id="filters" class="float-right">
                                <li><span class="filter active" data-filter="*">All</span></li>
                                <?php  $terms = get_terms( 'smartad_portfolios_cat' );
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ 
                                    foreach ( $terms as $term ) {  
                                        echo '<li><span class="filter" data-filter=".' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</span></li> ';
                                    } 
                                } ?>   
                            </ul> 
                        </div>
                    </div>
                    <div id="portfoliolist" class="row">
                        <?php $args = array('post_type'=>'smartad_portfolios','posts_per_page'=>3,'order'=>'ASC','orderby'=>'menu_order'); 
                        query_posts( $args ); ?>
                        <?php while ( have_posts() ) : the_post(); 
                        $almus_terms = get_the_terms( get_the_ID(), 'smartad_portfolios_cat' );  
                        $almus_link = array();
                        foreach ( $almus_terms as $almus_term ) {
                            $almus_link[] = $almus_term->slug;
                        }              
                        $almus_links = join( " ", $almus_link ); 

                        $value_sub = get_post_meta(get_the_ID(), '_smartad_portfolio_meta_key', true);
                        ?> 
                            <div class="smart-portfolio-block portfolio <?php echo esc_attr(($block_pos=='overlap') ? 'pfwrap' : ''); ?> text-center <?php echo esc_attr($almus_links); ?>">
                                <div class="smart-portfolio-img <?php echo esc_attr(($gradient_overlay=='yes') ? 'gradient-overlay' : ''); ?>"> 
                                    <?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full')[0]; ?>
                                    <img src="<?php echo esc_url($image_url); ?>" alt="portfolio" />
                                </div>
                                <div class="smart-portfolio-content <?php echo esc_attr($block_pos); ?>"> 
                                    <h3 class="smart-portfolio-title"><?php the_title(); ?></h5>
                                    <p class="smart-portfolio-subtitle"><?php echo wp_kses_post($value_sub ? $value_sub : ''); ?></p>
                                </div> 
                            </div>  
                        <?php endwhile; wp_reset_query(); ?>                                                                                                          
                    </div>                    
                </div> 
            </div>
        <?php } ?>
	<?php
	}
 
}

Plugin::instance()->widgets_manager->register_widget_type( new Smart_Portfolio() );