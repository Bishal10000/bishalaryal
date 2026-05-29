document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('[data-newsletter-form]');

    forms.forEach((form) => {
        const emailInput = form.querySelector('input[type="email"]');
        const button = form.querySelector('button[type="submit"]');
        const success = form.querySelector('[data-newsletter-success]');
        const label = button ? button.textContent : 'Subscribe';

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            if (success) {
                success.hidden = false;
            }

            if (button) {
                button.textContent = 'Subscribed';
                button.disabled = true;
            }

            if (emailInput) {
                emailInput.value = '';
            }

            form.classList.add('is-subscribed');
            window.setTimeout(() => {
                form.classList.remove('is-subscribed');
                if (button) {
                    button.textContent = label;
                    button.disabled = false;
                }
            }, 2500);
        });
    });
});
