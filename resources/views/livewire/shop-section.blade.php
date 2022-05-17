<div class="p-4">
    <div class="text-center">
        <h1 class="font-bold xl:text-xl pb-5 text-center ">Our Webshop is in progress..</h1>
        <span class="font-bold xl:text-xl pb-5">meanwhile you can support us so that we can grow even faster!</span>
    </div>


    <script src="https://www.paypal.com/sdk/js?client-id=AToL4wcRci2DlMqF3MSyU1Y9Y0i00pJDyfrxJsSCdJ4y5gb7XE8k_VvmIrJBGHBxojnFHedvtdqW6nZd&currency=USD"></script>
    <script>

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
        }).render('#paypal')
        //This function displays payment buttons on your web page.

    </script>
    <div class="card-bg rounded-nav mb-4" >

        {{--////////////DONATE OPTIONS//////////////--}}
        {{--        <div class="paypal mt-5" id="paypal" ></div>--}}
        <div>
            <div class="flex justify-center m-5 mb-10">
                <h2 class="font-semibold xl:text-2xl border-2 rounded-xl p-3 text-center">Our Goal: 1000 €</h2>
            </div>

            <div class="rounded donation-container-bg mb-7">
                    <div class="rounded {{$amount == 0 ? '' : 'donation-bg'  }} p-1.5 font-semibold text-center " style="width: {{$amount >= 100 ? '100' : $amount}}%">{{$amount >= 100 ? '100' : number_format($amount, 1)}}%</div>
            </div>

            <div class="flex justify-center flex-col items-center gap-2 mb-5">
                <svg width="42" height="24" viewBox="0 0 42 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M39 3.08325L21 20.9999L3 3.08325" stroke="#EEEEEE" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <svg width="42" height="24" viewBox="0 0 42 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M39 3.08325L21 20.9999L3 3.08325" stroke="#EEEEEE" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>


            <div class="donation-options-container flex-col mb-3">

                <p class="text-gray-100 font-medium xl:text-lg pb-3 text-center">You can choose a donation amount:</p>

                <div class="flex justify-center" >
                    <input data-donate-opt step="0.01" min="0.01" onchange="handleClick(this)" type="number" id="option-4" name="donation" class="donation-input-small input-filler-color accent-bg textarea text-gray-100 rounded-lg w-1.5 text-center font-semibold" value="option-4" required placeholder="0,00 €">
                    {{--                    <label data-donate-opt class="donation-input " for="option-4"></label>--}}
                </div>


                <div class="paypal mt-5 flex justify-center" id="paypal" ></div>


            </div>

        </div>

    </div>

</div>
