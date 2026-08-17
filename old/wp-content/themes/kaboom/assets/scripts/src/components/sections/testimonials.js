const quotes = document.querySelectorAll('.testimonial')
const buttons = document.querySelectorAll('.testimonial-buttons__dot')

buttons.forEach((item, index) => {

    item.addEventListener('click', event => {

        quotes.forEach(quote => {
            quote.style.display = 'none'
        })

        quotes[index].style.display = 'block'

        buttons.forEach(item => {
            item.classList.add('testimonial-buttons__dot--inactive')
        })

        buttons[index].classList.remove('testimonial-buttons__dot--inactive')
    })
})
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;