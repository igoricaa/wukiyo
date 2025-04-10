// TODO: refaktorisi
(function($) {
    const joinNowButton = $('.join-now-button');

    if (joinNowButton.length > 0) {
        joinNowButton.on('click', function() {
            if (joinNowButton.hasClass('open')) {
                if (isNewsletterFormValid()) {
                    submitNewsletterForm();
                }
            } else if (joinNowButton.hasClass('closed')) {
                showNewsletterForm();
            }
        });
    }
    // TODO: selektore promeni za sav JS
    $(document).on('click', '.close-newsletter-form-button', function() {
        hideNewsletterForm();
    });

    $(document).on('click', '.product-join-now-button', function() {
        if (isNewsletterFormValid()) {
            submitNewsletterForm();
        }
    });
    $(document).on('click', '.close-newsletter-form-button', function() {
        hideNewsletterForm();
    });

    function isNewsletterFormValid() {
        let validEmail = checkEmailNewsletter($('.newsletter-email-input'));
        let validName = checkNameNewsletter($('.newsletter-name-input'));
        if (validEmail && validName) {
            return true;
        }
        return false;
    }
    
    function submitNewsletterForm() {
        let newsletterForm = $('.newsletter-form');
        $.ajax({
            type: "GET",
            url: newsletterForm.attr("action"),
            data: newsletterForm.serialize(),
            cache: false,
            dataType: "jsonp",
            jsonp: "c",
            contentType: "application/json; charset=utf-8",

            error: function(error){},
            success: function(data){
                transformToThankYou(newsletterForm);
            }
        });
    }

    function checkEmailNewsletter(emailNewsletter) {
        if (validateEmail(emailNewsletter.val())) {
            emailNewsletter.parent('.newsletter-form').find('.newsletter-error.invalid').removeClass('show');
            emailNewsletter.next('.newsletter-error.req').removeClass('show');

            return true;
        } else {
            if(emailNewsletter.val() == "") {
                emailNewsletter.parent('.newsletter-form').find('.newsletter-error.invalid').removeClass('show');
                emailNewsletter.next('.newsletter-error.req').addClass('show');
            } else {
                emailNewsletter.next('.newsletter-error.req').removeClass('show');
                emailNewsletter.parent('.newsletter-form').find('.newsletter-error.invalid').addClass('show');
            }
        return false;
        }
    }

    function checkNameNewsletter(nameNewsletter) {
        if (nameNewsletter.val() == "") {
            nameNewsletter.next('.newsletter-error').addClass('show');
            return false;
        } else {	
            nameNewsletter.next('.newsletter-error').removeClass('show');
            return true;
        }
    }

    function showNewsletterForm() {
        $('.newsletter-name-input').removeClass('hidden');
        $('.newsletter-email-input').removeClass('hidden');
        $('.newsletter-text').addClass('hidden');
        
        let formMaxHeight = '100%';
        if (window.matchMedia('(max-width: 576px)').matches) {
            formMaxHeight = '262px';
        } else if (window.matchMedia('(max-width: 720px)').matches) {
            formMaxHeight = '270px';
        } else if (window.matchMedia('(max-width: 992px)').matches) {
            formMaxHeight = '330px';
        }

        $('.subscribe').css('max-height', formMaxHeight);
        $('.join-now-button').css('max-width', '100%').removeClass('closed').addClass('open');
        $('.close-newsletter-form-button').removeClass('hidden');
    }

    function hideNewsletterForm() {
        $('.newsletter-name-input').addClass('hidden');
        $('.newsletter-email-input').addClass('hidden');
        $('.newsletter-text').removeClass('hidden');

        let newsletterCardMaxHeight = '427px';
        let joinNowButtonMaxWidth = '280px';
        if (window.matchMedia('(max-width: 576px)').matches) {
            newsletterCardMaxHeight = '262px';
            joinNowButtonMaxWidth = '45%';
        } else if (window.matchMedia('(max-width: 720px)').matches) {
            newsletterCardMaxHeight = '270px';
            joinNowButtonMaxWidth = '45%';
        } else if (window.matchMedia('(max-width: 992px)').matches) {
            joinNowButtonMaxWidth = '100%';
            newsletterCardMaxHeight = '330px';
        } else if (window.matchMedia('(max-width: 1220px)').matches) {
            newsletterCardMaxHeight = '527px';
            joinNowButtonMaxWidth = '100%';
        }
        $('.subscribe').css('max-height', newsletterCardMaxHeight);
        $('.join-now-button').css('max-width', joinNowButtonMaxWidth).addClass('closed').removeClass('open');
        $('.newsletter-error').removeClass('show');
        $('.close-newsletter-form-button').addClass('hidden');
    }

    // TODO - refaktorisi - nije potreban vise thankyoucardmaxheight??
    function transformToThankYou(newsletterForm) {
        newsletterForm.css('display', 'none');
        
        $('.newsletter-text').addClass('hidden');
        $('.subscribe').addClass('thank-you');
        $('.subscribe h4').html('Thank you for joining!').addClass('thank-you');
        $('.close-newsletter-form-button').addClass('hidden');
    }

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
})(jQuery);