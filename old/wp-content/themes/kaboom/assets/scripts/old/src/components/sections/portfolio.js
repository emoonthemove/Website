import { initPhotoSwipeFromDOM } from '../../vendor/photoswipe';

initPhotoSwipeFromDOM('.my-gallery')

const projectsList = document.querySelector('.my-gallery')
const projects = document.querySelectorAll('.project')
const more = document.querySelector('.more-projects-gallery')

if (projectsList) {
    
    let content
    let contentSplit

    let projectCurrent = 0
    // let projectLimit = 8
    let projectLimit = 12

    // Set shapes
    const blobs = [
        '61% 39% 48% 52% / 53% 49% 51% 47%',
        '37% 63% 51% 49% / 37% 65% 35% 63%',
        '36% 64% 64% 36% / 64% 48% 52% 36%',
        '37% 63% 51% 49% / 30% 30% 70% 70%',
        '40% 60% 42% 58% / 41% 51% 49% 59%',
        '64% 36% 51% 49% / 52% 25% 75% 48%',
        '62% 38% 31% 69% / 61% 52% 48% 39%',
        '35% 65% 38% 62% / 63% 66% 34% 37%',
        '44% 56% 34% 66% / 33% 44% 56% 67%',
        '57% 43% 70% 30% / 63% 34% 66% 37%',
    ]

    function makeBlob(item) { 
        const random = Math.floor(Math.random() * 10)
        item.style.borderRadius = blobs[random]
        item.style.transform = `scale(${blobs[random]})`
    }

    function makeExternalLink(item) {

        const img = item.querySelector('img')
        const anchor = item.querySelector('a')

        const externalLink = img.alt

        if (externalLink) {
            anchor.href = externalLink

            anchor.addEventListener('click', event => {
                anchor.target = '_blank'
                anchor.rel = 'noopener'
                event.stopPropagation()
            })
        }
    }

    function makeFigure(item) {
        item.classList.add('project')
        item.setAttribute('itemprop', 'associatedMedia')

        // Get anchor
        let image = item.querySelector('img')

        let imageSrc = image.src
        let width = 0
        let height = 0

        // Change protocol
        if (imageSrc.match('^http://')) {
            imageSrc = imageSrc.replace('http://','https://')
            image.srcset = image.srcset.replaceAll('http://','https://')
        }

        // Set images
        image.setAttribute('itemprop', 'thumbnail')
        
        // Create anchor
        let anchor = document.createElement('a')
        image.parentNode.insertBefore(anchor, image)
        anchor.appendChild(image)

        // Set anchor
        anchor.classList.add('accent-main-color-background')
        anchor.setAttribute('data-size', `${width}x${height}`)
        anchor.href = imageSrc

        // Update image size attributes when loaded
        image.onload = function() {
            width = image.clientWidth * 2
            height = image.clientHeight * 2
            anchor.setAttribute('data-size', `${width}x${height}`)
            image.style.objectFit = 'cover'
            image.style.height = '100%'
            item.style.opacity = 1
            initPhotoSwipeFromDOM('.my-gallery')
        }

        makeBlob(item)
        makeExternalLink(item)
    }

    function displayProject() {

        for (var i = projectCurrent; i < projectCurrent + projectLimit; i++){

            if (contentSplit[i]) {
                projectsList.insertAdjacentHTML('beforeend', contentSplit[i]);
            }

            let images = projectsList.querySelectorAll('figure')

            if (images[i]) {
                makeFigure(images[i])
            }

            // When no more projects hide see more button
            if (contentSplit[i + 2] == undefined) {
                more.style.visibility = 'hidden'
            } else {
                more.style.visibility = 'visible' 
            }
        }

        projectCurrent = projectCurrent + projectLimit

        // Rebuild
        fullpage_api.reBuild()
        initPhotoSwipeFromDOM('.my-gallery')
    }

    // Load more projects
    more.addEventListener('click', () => {
        displayProject()
    });

    // Fetch category
    function initProjects(category) {

        const url = `https://kaboom.bg/wp-json/wp/v2/pages/${category}`;
        fetch(url)
        .then((resp) => resp.json())
        .then(function(data) {

            content = data.content.rendered
            contentSplit = content.split('</figure>')

            displayProject()
        })
        .catch(function(error) {
            console.log(error)
        })
    }


    // Category filter
    const filter = document.querySelectorAll('.portfolio__filter button')
    const all = filter[0].getAttribute('data-id')

    filter.forEach((button, index) => {

        button.addEventListener('click', event => {

            filter.forEach(item => {
                item.classList.remove('accent-color')
            })
        
            filter[index].classList.add('accent-color')

            // Reset
            projectCurrent = 0
            projectsList.innerHTML = ''

            let id = button.getAttribute('data-id')
            initProjects(id)
        })
    })

    // Show all projects
    initProjects(all)

}
;
/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/
;