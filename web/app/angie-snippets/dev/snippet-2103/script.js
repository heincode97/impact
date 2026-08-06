class InteractiveAccordionHandler_a1080bc6 extends elementorModules.frontend.handlers.Base {
    getDefaultSettings() {
        return {
            selectors: {
                item: '.ia-a1080bc6-item'
            }
        };
    }

    getDefaultElements() {
        return {
            $items: this.$element.find(this.getSettings('selectors').item)
        };
    }

    bindEvents() {
        const items = this.elements.$items;
        
        if (!items.length) {
            return;
        }

        // Vanilla JS implementation
        items.each((index, el) => {
            el.addEventListener('click', () => {
                if (el.classList.contains('is-active')) {
                    return;
                }
                
                // Remove active class from all
                items.each((i, itemEl) => {
                    itemEl.classList.remove('is-active');
                });
                
                // Add active class to clicked
                el.classList.add('is-active');
            });
        });
    }
}

jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(InteractiveAccordionHandler_a1080bc6, { $element });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/interactive_accordion_a1080bc6.default', addHandler);
});