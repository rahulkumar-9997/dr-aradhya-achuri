<form method="post" action="{{ route('enquiry.submit') }}" id="enquiryFormSubmit" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name *">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter your phone number *" maxlength="10" pattern="[0-9]{10}">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address ">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Service" name="service" id="service">
    </div>
    <div class="form-group">
        <textarea name="message" class="form-control" id="message" placeholder="Describe your consultation needs *"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary btn-lg">
        Submit
    </button>
</form>