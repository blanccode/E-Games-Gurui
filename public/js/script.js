window.addEventListener("load", function () {
    let img = document.querySelector('[data-full-img]');


    document.querySelectorAll('[data-post-content]').forEach(postContent => {
        postContent.addEventListener('click', e => {
            let currentPostContainer
            currentPostContainer = e.target.closest('[data-post-container]')
            currentPostContainer.querySelector('[data-full-img]').src = currentPostContainer.querySelector('[data-post-content]').src
            // console.log(currentPostContainer)

            currentPostContainer.classList.toggle('active')



        })
    })

    document.querySelectorAll('[data-post-container]').forEach(postContainer => {
        let currentOverlay =  postContainer.querySelector('[data-full-img-container]')
        // console.log(currentOverlay)

        currentOverlay.addEventListener('click', e => {
            let currentContent =  e.target.closest('[data-full-img]')
            if (e.target == currentContent) return
            postContainer.classList.remove('active')

        })



    })

    /*///////// OPEN CLOSE SHARE LINKS //////////*/


    document.addEventListener('click', e => {
        // console.log('askjk')
        const isPostImg = e.target.matches('[data-share-btn]')
        // e.target.matches('[]')
        if (!isPostImg &&  e.target.closest('[data-share-container]') != null) return
        // console.log(isPostImg)
        let currentPostContainer
        if (isPostImg) {
            currentPostContainer = e.target.closest('[data-share-container]')
            // console.log(currentPostContainer)

            currentPostContainer.classList.toggle('active')
        }

        document.querySelectorAll('[data-share-container].active').forEach(container => {
            if (container === currentPostContainer) return

            container.classList.remove('active')
        })

    })


    /*///////// DONATION LOGIC //////////*/

    let donateOpt = document.querySelectorAll('[data-donate-opt]')


    donateOpt.forEach(btn => {
        btn.addEventListener('change', (e) => {
            let parentContainer = e.target.closest('.donation-options-container')
            // console.log(parentContainer)
            parentContainer.classList.add('clicked')
            let clikckedInput = e.target.previousElementSibling
            console.log(clikckedInput.value)
            // console.log(e.target)

        })
    })

    /*///////// TEXTAREA LOGIC //////////*/


    //     document.addEventListener('click', (e) => {
    //         if (area === document.activeElement) {
    //             console.log(area.previousElementSibling.classList.add('focus'))
    //
    //         } else {
    //             area.previousElementSibling.classList.remove('focus')
    //         }
    //     })

})
