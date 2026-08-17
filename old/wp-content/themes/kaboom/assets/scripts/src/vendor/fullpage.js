import scrolloverflow from 'fullpage.js/vendors/scrolloverflow';
import fullpage from 'fullpage.js';
import { gsapTimeline } from './gsap';

window.onload = () => {

    // setTimeout(function(){

        new fullpage('#fullpage', {
            licenseKey: 'E08224CF-14794F73-B4FDC1D6-5B18B32E',
            scrollingSpeed: 500,
            autoScrolling: true,
            anchors: ['home', 'portfolio', 'testimonials', 'contact', 'form'],
            navigation: true,
            navigationPosition: 'right',
            showActiveTooltip: true,
            scrollOverflow: true,
            normalScrollElements: '.web__content',
            scrollOverflowOptions: {
                // preventDefault: false,
                disablePointer: true,
                disableTouch: false,
            },

            afterLoad: function(section, origin, destination, direction) {

                gsapTimeline()

                // Scroll to top
                const scroll = document.querySelector('.fp-scrollable')
                if (scroll) {
                    scroll.fp_iscrollInstance.scrollTo(0, 0);
                }

                // Loading
                const loading = document.querySelector('.loading')
                loading.classList.add('loading--hidden')

                // Logo colors
                const active = document.querySelector('.active')
                const logo = document.querySelector('header .logo')
                
                if (active.classList.contains('section--color')) {
                    logo.classList.remove('logo--dark')   
                    logo.classList.remove('logo--light')   
                    logo.classList.add('logo--black')   
                } else if (active.classList.contains('section--light')) {
                    logo.classList.remove('logo--black')   
                    logo.classList.remove('logo--light')
                    logo.classList.add('logo--dark')
                } else if (active.classList.contains('section--dark')) {
                    logo.classList.remove('logo--black')
                    logo.classList.remove('logo--dark')   
                    logo.classList.add('logo--light')   
                }

                if (active.classList.contains('section--hide-logo')) {
                    logo.classList.add('logo--hidden')   
                } else {
                    logo.classList.remove('logo--hidden')   
                }

                // Color nav based on category
                let uri = window.location.pathname.split('/')[1]
                let uri2 = window.location.pathname.split('/')[2]
                let category = false
                let link = document.querySelector('header [href="/"]')

                if (uri == 'de') {
                    category = uri2
                    if (category !='') {
                        link = document.querySelector('header [href="/de/' + category + '"]')
                    }
                } else {
                    category = uri
                    if (category != '') {
                        link = document.querySelector('header [href="/' + category + '"]')
                    }
                }

                const nav = document.querySelector('.header__links')
                const mail = document.querySelector('.header__links-right li')

                if (active.classList.contains('head')) {

                    mail.classList.remove('accent-color')
                    mail.classList.remove('accent-secondary-color')

                    if (category && link) {
                        nav.classList.add(category)
                        link.classList.add('accent-color')
                    }

                } else {

                    if (active.classList.contains('contacts') || active.classList.contains('form')) {
                        mail.classList.remove('accent-color')            
                        mail.classList.add('accent-secondary-color')            
                    } else {
                        mail.classList.remove('accent-secondary-color')
                        mail.classList.add('accent-color')
                    }

                    if (category && link) {
                        nav.classList.remove(category)
                        link.classList.remove('accent-color')
                    }
                }

                // Prevent click on active category
                if (link) {
                    link.addEventListener('click', event => {
                        event.preventDefault()
                    })
                }
            }
        })

        fullpage_api.setAllowScrolling(false);
        fullpage_api.setKeyboardScrolling(false);

        document.querySelectorAll('.next-section').forEach(item => {
            item.addEventListener('click', event => {
                fullpage_api.moveSectionDown();
            })
        })

        document.querySelector('.next-section-first').addEventListener('click', event => {
            fullpage_api.moveTo('home');
        })

        if (window.location.toString().includes("/contact") || window.location.toString().includes("/de/kontakt")) {

            document.getElementById('fp-nav').remove()

            let home = '/'
            if (window.location.toString().includes("/de")) {
                home = '/de'
            }

            document.querySelector('.next-section__arrow--first').addEventListener('click', event => {
                window.location = home
            })
        }
        
    // }, 1000);    

}


// Change section height when resizing text area
const form = document.querySelector('form')

if (form) {
    form.addEventListener('mousedown', event => {

        // Listen document in case mouse leaves the form
        document.addEventListener('mouseup', event => {
            fullpage_api.reBuild()
        })
    })
}
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;