<form method="post" action="{{ route('enquiry.submit') }}" id="enquiryFormSubmit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hp_name" id="hp_name"/>
    <div class="form-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name *">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter your Phone number *" maxlength="10" pattern="[0-9]{10}">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email ID ">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="What Service you need" name="service" id="service">
    </div>
    <div class="form-group">
        <textarea name="message" class="form-control" id="message" placeholder="Any details you can share *"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary btn-lg">
        Submit
    </button>
</form>