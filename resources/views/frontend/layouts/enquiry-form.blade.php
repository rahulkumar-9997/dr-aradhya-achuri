<form method="post" class="enquiry_form" action="{{ route('enquiry.submit') }}" id="enquiryFormSubmit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="hp_name" id="hp_name" />
    <input type="hidden" name="form_timer" value="{{ time() }}">
    <!-- <div class="form-group mt-0">
        <label>
            <input type="radio" name="address_option" value="Gramakautam, Plot No.1, Plot No.6, Kothaguda Village Serilingampally, M, 2-34/2, Gachibowli - Miyapur Rd, Kondapur, Hyderabad, Telangana 500084" checked>
           Apollo Fertility , Kondapur
        </label>
        <label class="ms-3">
            <input type="radio" name="address_option" value="Survey No. 55/E, Nanakramguda Circle, Gachibowli, Nanakramguda, Hyderabad, Telangana 500032">
            Medics Fertility , Nanakramguda
        </label>
    </div>
    <div class="form-group mt-1 kondapur_address">
        <div class="alert alert-secondary">
            <h5>Apollo Fertility, Kondapur Address:</h5>           
            <p class="mb-0">Plot No.1, Plot No.6,<br> Kothaguda Village Serilingampally, <br> M, 2-34/2, Gachibowli - Miyapur Rd, <br>Kondapur, Hyderabad, Telangana 500084</p>
            <p class="mb-0">
                <strong>Timing :</strong> 10AM - 3AM
            </p>
        </div>
    </div> -->

    <!-- <div id="nanakramguda_address" class="form-group mt-1 nanakramguda_address" style="display: none;">
        <div class="alert alert-secondary">
            <h5>Medics Fertility , Nanakramguda Address:</h5>
            <p class="mb-0">Survey No. 55/E, Nanakramguda Circle, <br>Gachibowli, Nanakramguda, Hyderabad, Telangana 500032</p>
            <p class="mb-0">
                <strong>Timing :</strong> 4PM - 6PM
            </p>
        </div>
    </div> -->
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