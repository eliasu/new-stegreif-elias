import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import persist from '@alpinejs/persist'
import focus from '@alpinejs/focus'
import 'focus-visible'
import YouTubeToHtml5 from '@thelevicole/youtube-to-html5-loader'
import Plyr from 'plyr';

let logo_visible = (window.pageYOffset > 200) ? true : false;
initLogo();

function initLogo() {
    const logo = document.querySelector('#stgrf_logo');
    if(logo_visible) {
        logo.classList.add("fade-in");
    } else {
        logo.classList.remove("fade-in");
    }
}


// Global get CSRF token function (used by forms).
window.getToken = async () => {
    return await fetch('/!/DynamicToken/refresh')
        .then((res) => res.json())
        .then((data) => {
            return data.csrf_token
        })
        .catch(function (error) {
            this.error = 'Something went wrong. Please try again later.'
        })
}

// Call Alpine.
window.Alpine = Alpine
Alpine.plugin(collapse)
Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.start()

new YouTubeToHtml5();
const players = Plyr.setup('.video_sound');



onscroll = (event) => {
    
    if(window.pageYOffset > 200 && !logo_visible) {
        const logo = document.querySelector('#stgrf_logo');
        logo.classList.add("fade-in");
        console.log("bigger");
        logo_visible = !logo_visible;
    }  
    if(window.pageYOffset < 200 && logo_visible) {
        const logo = document.querySelector('#stgrf_logo');
        logo.classList.remove("fade-in");
        console.log("smaller");
        logo_visible = !logo_visible;
    }
    
};