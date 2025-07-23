export const initContactForm = () => {
  const form = document.getElementById('ajaxForm');
  const msg = form.querySelector('.form-msg');
  const spinner = form.querySelector('.fa-spinner');

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    msg.textContent = '';
    spinner.style.display = 'inline-block';

    // reCAPTCHA token
    grecaptcha.ready(() => {
      grecaptcha.execute('YOUR_SITE_KEY', {action: 'submit'}).then(token => {
        document.getElementById('recaptchaResponse').value = token;

        const data = new FormData(form);
        fetch('php/send-mail.php', {method:'POST', body:data})
          .then(r => r.json())
          .then(res => {
            spinner.style.display = 'none';
            if (res.success) {
              msg.textContent = 'Vielen Dank! Wir melden uns schnellstmöglich.';
              msg.className = 'form-msg success';
              form.reset();
            } else {
              msg.textContent = res.error || 'Fehler beim Senden.';
              msg.className = 'form-msg error';
            }
          });
      });
    });
  });
};