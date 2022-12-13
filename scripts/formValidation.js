"use strict"   // Activate "strict mode" in JavaScript

// Wait until page is "ready"
$(function () {

    // Add a custom validation method to the plugin for AU phone numbers
    $.validator.addMethod("phoneAU", function (phone_number, element) {
        const regexAuPhone = /^((000|112|106)|((13|18)([- ]?\d){4})|((1300|1800|190\d)([- ]?\d){6})|(((\+61[- ]?\(?)|(\(?0[- ]?))[23478]\)?([- ]?\d){8}))$/
        return this.optional(element) || regexAuPhone.test(phone_number);
    }, "Please enter a valid australian phone number (Mobile or landline).");

    // Add a custom validation method to the plugin for credit card
    // https://jqueryvalidation.org/creditcard-method/
    // based on https://en.wikipedia.org/wiki/Luhn_algorithm
    $.validator.addMethod("creditcard", function (value, element) {
        if (this.optional(element)) {
            return "dependency-mismatch";
        }

        // Accept only spaces, digits and dashes
        if (/[^0-9 \-]+/.test(value)) {
            return false;
        }

        var nCheck = 0,
            nDigit = 0,
            bEven = false,
            n, cDigit;

        value = value.replace(/\D/g, "");

        // Basing min and max length on
        // https://dev.ean.com/general-info/valid-card-types/
        if (value.length < 13 || value.length > 19) {
            return false;
        }

        for (n = value.length - 1; n >= 0; n--) {
            cDigit = value.charAt(n);
            nDigit = parseInt(cDigit, 10);
            if (bEven) {
                if ((nDigit *= 2) > 9) {
                    nDigit -= 9;
                }
            }

            nCheck += nDigit;
            bEven = !bEven;
        }

        return (nCheck % 10) === 0;
    }, "Please enter a valid credit card number.");


    // Activate validation for the contact form
    $("#checkout").validate({
        rules: {
            firstName: {
                required: true,
                // Using the normalizer to trim the value of the element before validating it.
                normalizer: function (value) {
                    // Trim the value of the input
                    return $.trim(value);
                },
                minlength: 2
            },
            lastName: {
                required: true,
                // Using the normalizer to trim the value of the element before validating it.
                normalizer: function (value) {
                    // Trim the value of the input
                    return $.trim(value);
                },
                minlength: 2
            },
            address: {
                required: true
            },
            phone: {
                required: true,
                phoneAU: true
            },
            email: {
                required: true,
                email: true
            },
            creditcard: {
                required: true,
                creditcard: true
            },
            nameOnCard: {
                required: true,
                minlength: 2
            },
            expiry: {
                required: true,
            },
            csv: {
                required: true,
                digits: true,
                maxlength: 3
            }
        },

        // Messages show
        messages: {
            firstName: {
                required: "Please enter your first name",
                minlength: "Please enter at least 2 non-space characters"
            },

            lastName: {
                required: "Please enter your last name",
                minlength: "Please enter at least 2 non-space characters"
            },

            address: {
                required: "Please enter your Address"
            },

            phone: {
                phoneAU: "Please enter a valid australian phone number"
            },
            email: {
                required: "Please enter your email",
                email: "Email is not in a valid format, e.g. user@domain.com"
            },
            creditcard: {
                digits: "Only digits allowed",
                required: "Please enter your credit card number",
                creditcard: "Credit Card is not in a valid format, e.g. 5431 1111 1111 1111"
            },

            nameOnCard: {
                required: "Please enter your Name On Card",
                minlength: "Please enter at least 2 non-space characters"
            },
            expiry: {
                required: "Please enter expiry date of your card"
            },
                csv: {
                    required: "Please enter CSV of your card",
                    digits: "Only digits allowed",
                    maxlength:"Maximum 3 digits"
                }
        }
    })

})
