const hamburger = document.querySelector('.hamburger')
const hamburgerToggle = document.querySelector('.hamburger-toggle')
const headerLinks = document.querySelector('.header__links')

hamburger.addEventListener('click', () => {
    if (hamburgerToggle.classList.contains('hamburger-toggle--open')) {
        hamburgerToggle.classList.remove('hamburger-toggle--open')   
        headerLinks.classList.remove('header__links--reveal')
    } else {
        hamburgerToggle.classList.add('hamburger-toggle--open')   
        headerLinks.classList.add('header__links--reveal')
    }
})
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;