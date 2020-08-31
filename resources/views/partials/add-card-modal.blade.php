<div class="overlay">
    <div class="Add-Card-box">
        <div class="Add-card-box-header">
            <h2><span class="underline">ADD</span> CARD</h2>
            <img src="{{asset('assets/images/cancel.svg')}}" class="x-button" alt="">
        </div>
        <p class="invalid">Invalid Card, Please check if your card has expired</p>
        <form action="{{url('card/add')}}" method="post" class="Add-card-box-form">
            @csrf

            <div class="form-group-full">
                <div class="form-group-header">
                    <h2>Name on card</h2>
                </div>
                <input required type="text" name="name" class="form-input-full" placeholder="Samuel Fapoun">
                <p class="additional-info">
                    The name written on your Debit Card
                </p>
            </div>
            <div class="form-group-full">
                <div class="form-group-header">
                    <h2>Card Number</h2>
                </div>
                <input type="text" required name="card_number" class="form-input-full credit-card"
                       placeholder="1234-XXXX-XXXX-XXXX"/>
                <p class="additional-info">
                    The bold number on your Debit Card
                </p>
            </div>
            <div class="form-group-half margin-right">
                <div class="form-group-header">
                    <h2>Expiry Date</h2>
                </div>
                <input id="expiry-date" required name="expiry" class="form-input-full" placeholder="MM/YY"/>
            </div>


            <div class="form-group-half">
                <div class="form-group-header">
                    <h2>CVV</h2>
                </div>
                <input type="text" required name="cvv" class="form-input-full cvv" placeholder="..."/>
            </div>
            <p class="disclaimer">You will not be billed until the start date of your savings</p>

            <button type="submit" class="btn plans-submit">Add card</button>
        </form>
    </div>
</div>
