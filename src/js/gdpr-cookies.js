window.addEventListener('load', (event) => {

    /******************* GDPR Cookies *************************************/

    const cookieMessage = document.querySelector('[data-cookie-message]');
    const cookieAcceptBtn = document.querySelector('[data-cookie-accept-btn]');
    const cookieSettingsBtn = document.querySelector('[data-cookie-settings-btn]');
    const cookieSettingsMessage = document.querySelector('[data-cookie-settings-message]');
    const cookieSettingsForm = document.querySelector('[data-cookie-settings-form]');
    const cookieSettingsAcceptBtn = document.querySelector('[data-cookie-settings-accept-btn]');
    const getGDPRCookie = getCookie('gdpr-cookie');


    /* --- Get cookie value --- */

    // If GDPR cookie is empty or not set add class visible
    if ( getGDPRCookie === '') {
        cookieMessage.classList.add('visible');    
    }

    // Check if consent has been given before you load GA.
    if ( getGDPRCookie.includes('functional,analytics') ) {

        var imported = document.createElement('script');
        imported.src = 'https://www.googletagmanager.com/gtag/js?id=UA-322915-1';
        document.head.appendChild(imported);

        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-322915-1');   

    } 

    /* --- Cookie Buttons --- */

    // Accept all cookies
    cookieAcceptBtn.onclick = function() { 
        cookieMessage.classList.remove('visible');
        createCookie('gdpr-cookie', 'functional,analytics', 365);

        location.reload();
        return false;
    };

    // Open cookie settings menu
    cookieSettingsBtn.onclick = function() { 
        cookieSettingsMessage.classList.add('visible');
        cookieMessage.classList.remove('visible');
    };

    // Save cookie settings
    cookieSettingsAcceptBtn.onclick = function() {     
        
        var array = [];
        var checkboxes = cookieSettingsForm.querySelectorAll('input[type=checkbox]:checked');

        // Buidl array with checkboxes
        for (var i = 0; i < checkboxes.length; i++) {
        array.push(checkboxes[i].value);
        }

        // Save cookie with settings
        createCookie('gdpr-cookie', array, 365);

        // Hide cookie settings menu 
        cookieSettingsMessage.classList.remove('visible');
        
        // Reload page on save
        location.reload();
        
        // Stop form 
        return false;

    };

});


/* --- GDPR Cookie Functions --- */

// Create the cookie
function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Get the cookie
function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}
