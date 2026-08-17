const cartItems = document.querySelector('.cart__items')
const services = document.querySelectorAll('.service')

let cart = JSON.parse(localStorage.getItem('cart') || '[]')

if (cart.length) {
    cartItems.innerText = cart.length
} else {
    cartItems.innerText = 0
}

services.forEach(item => {
    updateServices(item)
    selectItemsInForm(item)

    item.addEventListener('click', event => {
        updateCart(item)
    })
})

function updateCart(item) {
    let category = item.dataset.name
  
    if (cart.includes(category)) {
        cart = cart.filter(i => i !== category);
        localStorage.setItem('cart', JSON.stringify(cart));
    } else{
        cart.push(category);
        localStorage.setItem('cart', JSON.stringify(cart));
    }
  
    cartItemsAnimate()
    selectItemsInForm(item)

    services.forEach(item => {
        updateServices(item)
    })

    cartItems.innerText = cart.length
}

function updateServices(item) {
    let category = item.dataset.name

    let addToCart = ''
    let removeFromCart = ''

    if (window.location.toString().includes("/de")) {
        addToCart = 'Zum Info-Warenkorb hinzufügen'
        removeFromCart = 'Aus dem Info-Warenkorb entfernen'
    } else {
        addToCart = 'Add to Info-Cart'
        removeFromCart = 'Remove from Info-Cart'
    }

    if (item.classList.contains('web__service-action')) {
        if (cart.includes(category)) {
            item.querySelector('span').innerText = removeFromCart
        } else {
            item.querySelector('span').innerText = addToCart
        }
    } else {
        if (cart.includes(category)) {
            item.classList.add('form__service--active')
        } else {
            item.classList.remove('form__service--active')
        }
    }
}

function selectItemsInForm(item) {
    let category = item.dataset.name
    let x = document.querySelector(`input[value="${category}"]`)

    if (x) {
        if (cart.includes(category)) {
            x.checked = true
        } else {
            x.checked = false
        }  
    }
}

function cartItemsAnimate() {
    cartItems.classList.add('cart__items--update')
    setTimeout(() => {
        cartItems.classList.remove('cart__items--update')
    }, 500);
}
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;