$(document).ready(function () {
    (function ($) {
        "use strict";

        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                mobile: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Please enter your name.",
                    minlength: "Your name must be at least 2 characters long."
                },
                mobile: {
                    required: "Please enter your mobile number.",
                    minlength: "Your mobile number must be at least 5 characters long."
                },
                email: {
                    required: "Please enter your email address."
                },
                message: {
                    required: "Please enter a message.",
                    minlength: "Your message must be at least 20 characters long."
                }
            },
            submitHandler: function (form) {
                let submitButton = $(".button-contactForm");
                let successMessage = $("#success");
                let errorMessage = $("#error");

                // Show loading state
                submitButton.prop("disabled", true).text("Sending...");
                
                $.ajax({
                    type: "POST",
                    url: "controllers/AdminController.php?action=contact_process",
                    data: $(form).serialize(),
                    beforeSend: function () {
                        successMessage.hide();
                        errorMessage.hide();
                    },
                    success: function (response) {
                        // Show success message
                        successMessage.text("Message submitted successfully!").fadeIn();
                        
                        // Clear form fields
                        $('#contactForm')[0].reset();
                    },
                    error: function () {
                        // Show error message
                        errorMessage.text("Oops! Something went wrong. Please try again.").fadeIn();
                    },
                    complete: function () {
                        // Enable button again
                        submitButton.prop("disabled", false).text("Send");
                    }
                });
            }
        });
    })(jQuery);
});
