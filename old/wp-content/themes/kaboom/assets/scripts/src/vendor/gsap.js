import gsap  from 'gsap';

export function gsapTimeline() {

    gsap.config({
        nullTargetWarn: false,
        fitToSection: true
    })

    const timeline = gsap.timeline({
        defaults: {
            duration: 1.5,
            opacity: 0,
        }
    })

    const height = window.innerHeight
    const height2 = -30
    const x = '-' + height * 2

    const backgroundEase = "elastic.out(1, 1)"
    const contentEase = "Power0.easeNone"

    timeline.from('.active .background__1, .active .the-time-is-now', { y: x, ease: backgroundEase })
    .from('.active .background__2', { y: x, ease: backgroundEase }, '-=1.25')
    .from('.active .background__3', { y: x, ease: backgroundEase }, '-=1.25')
    .from('.active .backdrop', { }, '-=1.25')
    .from('.active .content__floating', { y: x, ease: backgroundEase }, '-=1')
    .from('.active .content__background', { }, '-=1.25')
    .call(allowScrolling)
    .from('.active .page-links, .active h2, .active h3, .active p, .active .form__items, .active .portfolio__filter, .active .portfolio__projects, .active form', { y: height2, ease: contentEase }, '-=1.5')
    .from('.active .next-section, .active .category-buttons, .active .testimonial-buttons', { y: height2, ease: contentEase }, '-=0.5')
    .from('.active .web__bubble-container', { y: height2, ease: contentEase }, '-=1.25')

    // Prevent scrolling before animation finishes
    fullpage_api.setAllowScrolling(false);
    fullpage_api.setKeyboardScrolling(false);

    function allowScrolling() {
        fullpage_api.setAllowScrolling(true);
    }

    timeline.timeScale(1.3)

}

export function gsapWebTimeline() {

    gsap.config({
        nullTargetWarn: false,
        fitToSection: true
    })

    const timelineWeb = gsap.timeline({
        defaults: {
            duration: 1.5,
            opacity: 0,
        }
    })

    const height = window.innerHeight
    const height2 = -30
    const x = '-' + height * 2

    const backgroundEase = "elastic.out(1, 1)"
    const contentEase = "Power0.easeNone"

    timelineWeb.from('.web--open .web__close, .web--open .logo', { y: x, ease: backgroundEase }, '0.15')
    .from('.web--open .content__floating', { y: x, ease: backgroundEase }, '+0.25')
    .from('.web--open h2, .web--open p', { y: x, ease: backgroundEase }, '-=1.25')
    .from('.web--open .web__service, .web--open .synergy, .web--open .web__footer', { x: x, ease: backgroundEase }, '-=0.75')
};
