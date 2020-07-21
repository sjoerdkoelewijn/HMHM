/*! Hashmuseum v1.0.0 | (c) 2020 Sjoerd Koelewijn | MIT License |  */
/*jshint esversion: 6 */


// https://css-tricks.com/form-validation-part-2-constraint-validation-api-javascript/
// https://alistapart.com/article/inline-validation-in-web-forms/


var forms = document.querySelector('[data-form-validate]');
for (var i = 0; i < forms.length; i++) {
    forms[i].setAttribute('novalidate', true);
}

var hasError = function (field) {
    
		// Don't validate submits, buttons, file and reset inputs, and disabled fields
    if (field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') return;

    // Get validity
    let validity = field.validity;
	
	// If valid, return nothing
    if (validity.valid) return '';

    // If field is required and empty
    if (validity.valueMissing) return 'Please fill out this field';
    // If not the right type
    if (validity.typeMismatch) {

			// Email
			if (field.type === 'email') return 'Is this email address correct?';

		}

    // If all else fails, return a generic catchall error
    return 'Controleer dit veld. Gebruik geen speciale tekens.';
	
};

// Show the error message
var showError = function (field, error) {
    
	// Get field id or name
    var id = field.id || field.name;
    if (!id) return;

	// Add error class to field
    field.classList.add('error');
	
		// If the field is a radio button and part of a group, error all and get the last item in the group
    if (field.type === 'radio' && field.name) {
        var group = document.getElementsByName(field.name);
        if (group.length > 0) {
            for (let i = 0; i < group.length; i++) {
                // Only check fields in current form
                if (group[i].form !== field.form) continue;
                group[i].classList.add('error');
            }
            field = group[group.length - 1];
        }
    }
	
		// Check if error message field already exists
    // If not, create one
    var message = field.form.querySelector('.error-message#error-for-' + id );
    if (!message) {
        message = document.createElement('div');
        message.className = 'error-message';
        message.id = 'error-for-' + id;

        // If the field is a checkbox, insert error after the label
        var label;
        if (field.type ==='checkbox') {
            label = field.form.querySelector('label[for="' + id + '"]') || field.parentNode;
            if (label) {
                label.parentNode.insertBefore( message, label.nextSibling );
            }
        }

        // Otherwise, insert it after the field
        if (!label) {
            field.parentNode.insertBefore( message, field.nextSibling );
        }
    }
			
		
    if (!message) {
        message = document.createElement('div');
        message.className = 'error-message';
        message.id = 'error-for-' + id;
        field.parentNode.insertBefore( message, field.nextSibling );
    }
	
		// Add ARIA role to the field
    field.setAttribute('aria-describedby', 'error-for-' + id);
	
		// Update error message
    message.innerHTML = error;

    // Show error message
    message.style.display = 'block';
    message.style.visibility = 'visible';	
	
};

// Remove the error message
var removeError = function (field) {
    
	// Remove error class to field
    field.classList.remove('error');

    // Remove ARIA role from the field
    field.removeAttribute('aria-describedby');

    // Get field id or name
    var id = field.id || field.name;
    if (!id) return;

    // Check if an error message is in the DOM
    var message = field.form.querySelector('.error-message#error-for-' + id + '');
    if (!message) return;

    // If so, hide it
    message.innerHTML = '';
    message.style.display = 'none';
    message.style.visibility = 'hidden';
	
};


document.addEventListener('blur', (function (event) {
   
    var error = hasError(event.target);
	
		if (error) {
        showError(event.target, error);
				return;
    }
	
	// Otherwise, remove any existing error message
    removeError(event.target);
	
}), true);


// Check all fields on submit
document.addEventListener('submit', (function (event) {
    
    // Get all of the form elements
    var fields = event.target.elements;

    // Validate each field
    // Store the first field with an error to a variable so we can bring it into focus later
    var error, hasErrors;
    for (var i = 0; i < fields.length; i++) {
        error = hasError(fields[i]);
        if (error) {
            showError(fields[i], error);
            if (!hasErrors) {
                hasErrors = fields[i];
            }
        }
    }

    // If there are errrors, don't submit form and focus on first element with error
    if (hasErrors) {
        event.preventDefault();
        hasErrors.focus();
    } else {
		// Otherwise, let the form submit normally
		event.preventDefault();
		submitMailChimpForm(event.target);
	}
	
}), false);


var submitMailChimpForm = function (form) {
     // Get the Submit URL
	 var url = form.getAttribute('action');
	 url = url.replace('/post?u=', '/post-json?u=');
	 url += serialize(form) + '&c=displayMailChimpStatus';

	  // Create script with url and callback (if specified)
	  var script = window.document.createElement( 'script' );
	  script.src = url;

	  // Insert script tag into the DOM (append to <head>)
	  var ref = window.document.getElementsByTagName( 'script' )[ 0 ];
	  ref.parentNode.insertBefore( script, ref );

	   // After the script is loaded (and executed), remove it
	   script.onload = function () {
        this.remove();
    };

};


var serialize = function (form) {

    // Setup our serialized data
    var serialized = '';

    // Loop through each field in the form
    for (i = 0; i < form.elements.length; i++) {

        var field = form.elements[i];

        // Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields
        if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;

        // Convert field data to a query string
        if ((field.type !== 'checkbox' && field.type !== 'radio') || field.checked) {
            serialized += '&' + encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
        }
    }

    return serialized;

};

var displayMailChimpStatus = function (data) {
	console.log(data);
	
	// Make sure the data is in the right format
	if (!data.result || !data.msg ) return;
    
    var HideForm = document.querySelector('[data-hide-form]');

	// Get the status message content area
    var mcStatus = document.querySelector('[data-mc-status]');
    
    if (!mcStatus) return;

    // Update our status message
	mcStatus.innerHTML = data.msg;

	// Bring our status message into focus
    //mcStatus.addAttribute('tabindex', '-1');
	mcStatus.focus();
	
	 // If error, add error class
	 if (data.result === 'error') {
        mcStatus.classList.remove('success-message');
        mcStatus.classList.add('error-message');
        return;
    }

    if (data.result === 'success') {
        mcStatus.classList.remove('error-message');
        mcStatus.classList.add('success-message');
        HideForm.classList.add('hidden');
        return;
    }

    
};