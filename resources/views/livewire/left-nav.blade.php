<div class="navs left-nav  overflow-hidden">

    <div class="mb-4 px-3 py-4 card-bg rounded-nav">
        <h2 class="font-semibold xl:text-xl pb-3">Our Story</h2>

        @if($featuredArticle)
            <a href="{{url('articles/our-story/' . $featuredArticle->id)}}">
                <div class=" ">
                    <h2 class="font-semibold xl:text-lg mb-1">{{$featuredArticle->title}}</h2>
                    <img class="featured-article-img rounded-xxl "  src="{{url('storage/articles/images/' . $featuredArticle->image)}}"/>
                    <p class="text-clamp-3 my-2 mt-3 md:text-sm md:font-semibold">{{$featuredArticle->text}}</p>

                    <div class="flex justify-end items-center">
                        <p class="text-right font-semibold ">Read more..</p>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6133 24.0001C13.1946 23.9976 12.7812 23.9068 12.4 23.7334C11.9878 23.5517 11.6366 23.2552 11.3883 22.8793C11.14 22.5033 11.0052 22.0639 11 21.6134V10.3868C11.0052 9.93629 11.14 9.49685 11.3883 9.12092C11.6366 8.74499 11.9878 8.44846 12.4 8.26676C12.8743 8.04272 13.402 7.95642 13.923 8.01772C14.444 8.07901 14.9373 8.28542 15.3467 8.61343L22.1467 14.2268C22.4133 14.439 22.6287 14.7087 22.7767 15.0158C22.9247 15.3228 23.0016 15.6592 23.0016 16.0001C23.0016 16.3409 22.9247 16.6774 22.7767 16.9844C22.6287 17.2914 22.4133 17.5611 22.1467 17.7734L15.3467 23.3868C14.8565 23.7843 14.2444 24.0008 13.6133 24.0001ZM13.6133 10.6668V21.2001L20.0933 16.0001L13.6133 10.6668Z" fill="#1778F2"/>
                        </svg>
                    </div>


                </div>
            </a>
        @endif

    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=AToL4wcRci2DlMqF3MSyU1Y9Y0i00pJDyfrxJsSCdJ4y5gb7XE8k_VvmIrJBGHBxojnFHedvtdqW6nZd&currency=USD"></script>

    <script>
        // window.addEventListener("load", function () {
        //     let donateOpt = document.querySelectorAll('[data-donate-opt]')
        //
        //     // let inputValue;
        //     donateOpt.forEach(btn => {
        //         btn.addEventListener('click', (e) => {
        //             let parentContainer = e.target.closest('.donation-options-container')
        //             // console.log(parentContainer)
        //             parentContainer.classList.add('clicked')
        //             // let clickedInput = e.target.previousElementSibling
        //             // inputValue = clickedInput.value
        //             // console.log(e.target)
        //
        //         })
        //     })
        // })
        function handleClick(radioBtn) {
            inputValue = radioBtn.value;
        }
        paypal.Buttons({
            createOrder: function(data, actions) {
                // console.log(inputValue)

                // This function sets up the details of the transaction, including the amount and line item details.
                return fetch('/paypal-order', {
                    method: "post",
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        "value": inputValue
                    })
                }).then(res => {
                    if (res.ok) return res.json()
                    // return res.json().then(json => Promise.reject(json))
                    // return res.json();
                }).then( (orderData)  => {
                    console.log(orderData)
                    return orderData.id
                })
            },
            onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                console.log('sdkbnsjikfhbnsiodnbo')
                return fetch('/paypal-capture', {
                    method: 'post',
                    // redirect: 'dashboard',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        orderId: data.orderID
                    })
                }).then((res) => {
                    return res.json();

                }).then((orderData) => {
                    // This function shows a transaction success message to your buyer.
                    console.log('donation was successful')
                }).catch(e => {
                    console.error(e.error)
                })
            },
        }).render('#nav-paypal')
        //This function displays payment buttons on your web page.

    </script>
    <div class="card-bg p-4 rounded-nav mb-4" >

{{--        ////////////DONATE OPTIONS//////////////--}}
{{--                <div class="paypal mt-5" id="paypal" ></div>--}}
        <div>
            <h2 class="font-semibold xl:text-lg pb-5">Wanna Support Our Cause?</h2>
            <p class="text-gray-200 pb-3">You can choose a donation amount:</p>
            <div class="donation-options-container flex-col mb-3">

{{--                <div  >--}}
{{--                    <input onclick="handleClick(this)" type="radio" id="option-1" name="donation" value="option-1" >--}}
{{--                    <label data-donate-opt class="donation-input" for="option-1">1,00 €</label>--}}
{{--                </div>--}}
{{--                <div >--}}
{{--                    <input onclick="handleClick(this)" type="radio" id="option-2" name="donation" value="option-2" >--}}
{{--                    <label data-donate-opt class="donation-input" for="option-2">5,00 €</label>--}}
{{--                </div>--}}
{{--                <div >--}}
{{--                    <input onclick="handleClick(this)"  type="radio" id="option-3" name="donation" value="option-3" >--}}
{{--                    <label data-donate-opt class="donation-input" for="option-3">10,00 €</label>--}}
{{--                </div>--}}
                <div >
                    <input data-donate-opt step="0.01" min="0.01" onchange="handleClick(this)" type="number" id="option-4" name="donation" class="donation-input input-filler-color accent-bg textarea text-gray-100 rounded-lg w-32 text-center " value="option-4" required placeholder="0,00 €">
{{--                    <label data-donate-opt class="donation-input " for="option-4"></label>--}}
                </div>


                <div class="nav-paypal mt-5" id="nav-paypal" ></div>


            </div>





        </div>

    </div>





</div>








