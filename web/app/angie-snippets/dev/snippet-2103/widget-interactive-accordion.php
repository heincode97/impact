<?php
namespace AngieSnippets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) { exit; }

class Interactive_Accordion_a1080bc6 extends Widget_Base {
    public function get_name() { return 'interactive_accordion_a1080bc6'; }
    public function get_title() { return esc_html__( 'Interactive Accordion', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-accordion'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_script_depends() { return [ 'interactive-accordion-script-a1080bc6' ]; }
    public function get_style_depends() { return [ 'interactive-accordion-style-a1080bc6' ]; }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Cards', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'angie-snippets' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Card Title', 'angie-snippets' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Subtitle / Description', 'angie-snippets' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Description of the card goes here.', 'angie-snippets' ),
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'angie-snippets' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'angie-snippets' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Learn More', 'angie-snippets' ),
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'angie-snippets' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'angie-snippets' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'cards',
            [
                'label' => esc_html__( 'Cards', 'angie-snippets' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__( 'First Item', 'angie-snippets' ),
                        'subtitle' => esc_html__( 'Description for the first item.', 'angie-snippets' ),
                    ],
                    [
                        'title' => esc_html__( 'Second Item', 'angie-snippets' ),
                        'subtitle' => esc_html__( 'Description for the second item.', 'angie-snippets' ),
                    ],
                    [
                        'title' => esc_html__( 'Third Item', 'angie-snippets' ),
                        'subtitle' => esc_html__( 'Description for the third item.', 'angie-snippets' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__( 'Height', 'angie-snippets' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 1000,
                        'step' => 10,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 400,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-container' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'section_style_cards',
            [
                'label' => esc_html__( 'Cards', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_object_fit',
            [
                'label' => esc_html__( 'Image Fit', 'angie-snippets' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => esc_html__( 'Cover', 'angie-snippets' ),
                    'contain' => esc_html__( 'Contain', 'angie-snippets' ),
                    'auto' => esc_html__( 'Auto', 'angie-snippets' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-bg' => 'background-size: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'card_gap',
            [
                'label' => esc_html__( 'Gap', 'angie-snippets' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-container' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => esc_html__( 'Border', 'angie-snippets' ),
                'selector' => '{{WRAPPER}} .ia-a1080bc6-item',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__( 'Content', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_title_style',
            [
                'label' => esc_html__( 'Title', 'angie-snippets' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'color_title',
            [
                'label' => esc_html__( 'Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .ia-a1080bc6-title',
            ]
        );

        $this->add_control(
            'heading_subtitle_style',
            [
                'label' => esc_html__( 'Subtitle', 'angie-snippets' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'color_subtitle',
            [
                'label' => esc_html__( 'Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_subtitle',
                'selector' => '{{WRAPPER}} .ia-a1080bc6-subtitle',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__( 'Button', 'angie-snippets' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_button',
                'selector' => '{{WRAPPER}} .ia-a1080bc6-button',
            ]
        );

        $this->start_controls_tabs( 'tabs_button_style' );

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => esc_html__( 'Normal', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__( 'Text Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => esc_html__( 'Hover', 'angie-snippets' ),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__( 'Text Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'angie-snippets' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
                'type' => Controls_Manager::SLIDER,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .ia-a1080bc6-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if ( empty( $settings['cards'] ) ) {
            return;
        }
        
        ?>
        <div class="ia-a1080bc6-container">
            <?php foreach ( $settings['cards'] as $index => $item ) : 
                $active_class = ( $index === 0 ) ? ' is-active' : '';
                $image_url = !empty($item['image']['url']) ? $item['image']['url'] : '';
            ?>
                <div class="ia-a1080bc6-item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?><?php echo esc_attr( $active_class ); ?>">
                    
                    <div class="ia-a1080bc6-content">
                        <?php if ( ! empty( $item['title'] ) ) : ?>
                            <h3 class="ia-a1080bc6-title"><?php echo esc_html( $item['title'] ); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ( ! empty( $item['subtitle'] ) ) : ?>
                            <div class="ia-a1080bc6-subtitle"><?php echo wp_kses_post( $item['subtitle'] ); ?></div>
                        <?php endif; ?>
                        
                        <?php if ( ! empty( $item['button_text'] ) ) : ?>
                            <a href="<?php echo esc_url( $item['button_link']['url'] ); ?>" class="ia-a1080bc6-button">
                                <?php echo esc_html( $item['button_text'] ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="ia-a1080bc6-bg" style="background-image: url('<?php echo esc_url( $image_url ); ?>');"></div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <# if ( settings.cards.length ) { #>
            <div class="ia-a1080bc6-container">
                <# _.each( settings.cards, function( item, index ) { 
                    var active_class = index === 0 ? ' is-active' : '';
                    var image_url = item.image.url ? item.image.url : '';
                #>
                    <div class="ia-a1080bc6-item elementor-repeater-item-{{ item._id }}{{ active_class }}">
                        
                        <div class="ia-a1080bc6-content">
                            <# if ( item.title ) { #>
                                <h3 class="ia-a1080bc6-title">{{{ item.title }}}</h3>
                            <# } #>
                            
                            <# if ( item.subtitle ) { #>
                                <div class="ia-a1080bc6-subtitle">{{{ item.subtitle }}}</div>
                            <# } #>
                            
                            <# if ( item.button_text ) { #>
                                <a href="{{ item.button_link.url }}" class="ia-a1080bc6-button">{{{ item.button_text }}}</a>
                            <# } #>
                        </div>
                        
                        <div class="ia-a1080bc6-bg" style="background-image: url('{{ image_url }}');"></div>
                    </div>
                <# } ); #>
            </div>
        <# } #>
        <?php
    }
}
