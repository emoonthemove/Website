const webLinks = document.querySelectorAll('.web__links a')
const webToggle = document.querySelectorAll('.web__toggle')
const webClose = document.querySelectorAll('.web__close')
const web = document.querySelector('.web')
const webContent = document.querySelector('.web__content')
const webImages = document.querySelectorAll('.web__image-click')
const open = document.querySelectorAll('.open')

import { gsapWebTimeline } from '../../vendor/gsap';

webLinks.forEach(item => {
    item.addEventListener('click', event => {
        webOpen(item, event)
    })
})

webToggle.forEach(item => {
    item.addEventListener('click', event => {

        closeBubble()

        if (web.classList.contains('web--open')) {
            web.classList.remove('web--open')
        } else {
            web.classList.add('web--open')
            gsapWebTimeline()
        }
    })
})

webClose.forEach(item => {
    item.addEventListener('click', event => {
        web.classList.remove('web--open')
    })    
})

function webOpen(item, event) {

    // Delay for animations then scroll to anchor
    event.preventDefault();
    if (web.classList.contains('web--open')) {
        web.classList.add('web--open')
        window.location.replace(item.href);
    } else {
        web.classList.add('web--open')
        gsapWebTimeline()
        setTimeout(() => {
            window.location.replace(item.href);
        }, 1500);
    }
}

open.forEach(item => {
    item.addEventListener('click', event => {

        let info = item.nextElementSibling.nextElementSibling
        let category = item.nextElementSibling.dataset.name

        let explore = ''
        let doneWith = ''
    
        if (window.location.toString().includes("/de")) {
            explore = 'Entdecken Sie'
            doneWith = 'Fertig mit'
        } else {
            explore = 'Explore'
            doneWith = 'Done with'
        }

        if (info.classList.contains('web__background--animated')) {
            info.classList.add('web__background--beforeOverflow')
            item.querySelector('span').innerText = `${explore} ${category}`
            item.querySelector('.web__arrow-1').classList.remove('web__arrow--active')
            item.querySelector('.web__arrow-2').classList.remove('web__arrow-2--active')
            item.querySelector('.web__arrow-3').classList.remove('web__arrow-3--active')
            setTimeout(() => {
                info.classList.remove('web__background--animated')
                info.classList.remove('web__background--beforeOverflow')
                info.classList.remove('web__background--overflow')
            }, 500);
        } else {
            info.classList.add('web__background--animated')
            item.querySelector('span').innerText = `${doneWith} ${category}`
            item.querySelector('.web__arrow-1').classList.add('web__arrow--active')
            item.querySelector('.web__arrow-2').classList.add('web__arrow-2--active')
            item.querySelector('.web__arrow-3').classList.add('web__arrow-3--active')
            setTimeout(() => {
                info.classList.add('web__background--overflow')
            }, 500);
        }
    })
})


webImages.forEach(item => {
    item.addEventListener('click', event => {
        item.nextSibling.nextSibling.nextSibling.nextSibling.querySelector('.open').click()
    })
})


// Change nav link background when section is in view
webContent.addEventListener('scroll', event => {

    const sections = document.querySelectorAll('.web__service');

    function changeLinkState() {
      let index = sections.length;
    
      while(--index && webContent.scrollTop + 200 < sections[index].offsetTop) {}
      
      webLinks.forEach((link) => link.classList.remove('web__links--current'));
      webLinks[index].classList.add('web__links--current');
    }
    
    changeLinkState();

})

const webBubble = document.querySelector('.web__bubble')
const webBubbleClose = document.querySelector('.web__bubble-close')

if (webBubble) {
    webBubble.addEventListener('click', event => {
        closeBubble()
    })
    webBubbleClose.addEventListener('click', event => {
        closeBubble()
    })
}

function closeBubble() { 
    if (webBubble) {
        webBubble.classList.remove('web__bubble--active')
        webBubbleClose.classList.remove('web__bubble-close--active')
    }
}


// Toggle nav when clicking on testimonials button
const url = window.location.toString().split("/")
const subPageEN = url[3]
const subPageDE = url[4]
let isHome = false

if (window.location.toString().includes("/de/")) {
    if (!subPageDE || subPageDE.includes("#")) {
        isHome = true
        // console.log('home')
    }
} else {
    if (!subPageEN || subPageEN.includes("#")) {
        isHome = true
        // console.log('home')
    }
}

const targetTestimonials = document.querySelectorAll('.target-testimonials')

targetTestimonials.forEach(item => {
    item.addEventListener('click', event => {
        if (isHome) {
            web.classList.remove('web--open')
        }
    })
})

const webCategories = [
    '#seo',
    '#design-concept',
    '#website-shop',
    '#mobile-app',
    '#social-media',
    '#ppc'
]

webCategories.forEach(link => {
    if (window.location.toString().includes(link)) {

        setTimeout(() => {
            web.classList.add('web--open') 
            webContent.style.scrollBehavior = 'auto'
            gsapWebTimeline()

            webContent.scrollTo(0, 0)

            setTimeout(() => {
                webContent.style.scrollBehavior = 'smooth'
                webContent.querySelector(link).scrollIntoView()
            }, 2000);

        }, 0);
    }
});
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;