@extends('frontend.layouts.master')
@section('title','FAQs | Dr. Aradhya Achuri')
@section('description', 'Fertility Specialist')
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay" style="background-image:url({{ asset('fronted/assets/aradhya/breadcrumb/faqs.jpg')}});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>FAQs</h1>
                    <!-- <h6>Some content here</h6> -->
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
        </div>
    </div>
    <section class="section-area section-sp1 contact-section">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title">Some FAQ Questions</h2>
            </div>
            <div class="row">                
                <div class="col-lg-5">
                    <div class="margin-right sticky-top">
                        <figure class="mb-0 inner-img-be">
                            <img src="{{asset('fronted/assets/aradhya/faq.jpg')}}" alt="My Awards and Achievement" class="mb-0 img-fluid inner-img">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-7">                    
                    <div class="accordion ttr-accordion1 why-choose-accoding" id="accordionRow1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">What is infertility?</button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Infertility is the inability to conceive after one year of regular, unprotected intercourse for women under 35, or after six months for women over 35.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    What are the common causes of infertility?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Infertility can be caused by factors such as ovulatory disorders, tubal blockages, endometriosis, sperm abnormalities, and unexplained reasons.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    When should I see a fertility specialist?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        If you have been trying to conceive for over a year (or six months if over 35), or if you have irregular periods, painful periods, prior miscarriages, or known reproductive health issues.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                   Can infertility be treated?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Yes, treatments like ovulation induction, IUI, IVF, and surgical interventions can help improve the chances of conception.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    What lifestyle factors affect fertility?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        IFactors like smoking, excessive alcohol consumption, obesity, stress, and poor diet can negatively impact fertility.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    What is ovulation induction?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Ovulation induction involves using medications to stimulate egg production in women who have irregular or absent ovulation.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    What is intrauterine insemination (IUI)?
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        IUI is a procedure where sperm is directly placed into the uterus to increase the chances of fertilization.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                    What is in vitro fertilization (IVF)?
                                </button>
                            </h2>
                            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        IVF is a process where eggs are retrieved, fertilized with sperm in a lab, and then implanted into the uterus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading9">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                   How many IVF cycles are needed for success?
                                </button>
                            </h2>
                            <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Success rates vary, but most couples may require more than one cycle. Age, health conditions, and embryo quality play a role.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading10">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                    Does stress affect fertility treatment outcomes?
                                </button>
                            </h2>
                            <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        High stress levels can impact hormone regulation and treatment success, so relaxation techniques are encouraged.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading11">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                    What is mild stimulation IVF?
                                </button>
                            </h2>
                            <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Mild stimulation IVF uses lower doses of medication to stimulate the ovaries while reducing side effects and costs.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading12">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                    What is embryo transfer?
                                </button>
                            </h2>
                            <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Embryo transfer is the final step of IVF, where a fertilized embryo is placed into the uterus for implantation.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading13">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                    How long does an IVF cycle take?
                                </button>
                            </h2>
                            <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                        An IVF cycle typically takes about 4-6 weeks from ovarian stimulation to embryo transfer.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading14">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                    What is transvaginal oocyte retrieval?
                                </button>
                            </h2>
                            <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                       It is a procedure where eggs are collected from the ovaries using ultrasound guidance for IVF.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading15">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                    What is an ectopic pregnancy?
                                </button>
                            </h2>
                            <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="heading15" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      An ectopic pregnancy occurs when a fertilized egg implants outside the uterus, requiring immediate medical attention.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading16">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                    What is diagnostic hysteroscopy?
                                </button>
                            </h2>
                            <div id="collapse16" class="accordion-collapse collapse" aria-labelledby="heading16" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      It is a procedure to examine the uterus for abnormalities using a thin telescope-like device.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading17">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                    Can age affect fertility?
                                </button>
                            </h2>
                            <div id="collapse17" class="accordion-collapse collapse" aria-labelledby="heading17" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      Yes, fertility declines with age, especially after 35, due to decreased egg quantity and quality.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading18">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                   Can male infertility be treated?
                                </button>
                            </h2>
                            <div id="collapse18" class="accordion-collapse collapse" aria-labelledby="heading18" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      Yes, treatments include lifestyle changes, medications, hormonal therapy, and assisted reproductive techniques.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading19">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                   Is IVF painful?
                                </button>
                            </h2>
                            <div id="collapse19" class="accordion-collapse collapse" aria-labelledby="heading19" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      The process involves injections and minor discomfort, but pain is minimal with modern techniques.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading20">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                   Can stress cause infertility?
                                </button>
                            </h2>
                            <div id="collapse20" class="accordion-collapse collapse" aria-labelledby="heading20" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      While stress alone does not cause infertility, it can impact hormone levels and overall reproductive health.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading21">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                   What are the risks of IVF?
                                </button>
                            </h2>
                            <div id="collapse21" class="accordion-collapse collapse" aria-labelledby="heading21" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      Risks include multiple pregnancies, ovarian hyperstimulation, and implantation failure.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading22">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                   How successful is IVF?
                                </button>
                            </h2>
                            <div id="collapse22" class="accordion-collapse collapse" aria-labelledby="heading22" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      Success depends on factors like age, egg quality, and medical history, with an average success rate of 40-60%.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading23">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse23" aria-expanded="false" aria-controls="collapse23">
                                   Can lifestyle changes improve fertility?
                                </button>
                            </h2>
                            <div id="collapse23" class="accordion-collapse collapse" aria-labelledby="heading23" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      Yes, maintaining a healthy weight, balanced diet, exercise, and reducing stress can improve fertility.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading24">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse24" aria-expanded="false" aria-controls="collapse24">
                                  What are the common causes of infertility?
                                </button>
                            </h2>
                            <div id="collapse24" class="accordion-collapse collapse" aria-labelledby="heading24" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      Common causes include ovulation disorders, blocked fallopian tubes, low sperm count, and hormonal imbalances.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading25">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse25" aria-expanded="false" aria-controls="collapse25">
                                  How can I prepare for fertility treatment?
                                </button>
                            </h2>
                            <div id="collapse25" class="accordion-collapse collapse" aria-labelledby="heading25" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">
                                      Preparing includes maintaining a healthy lifestyle, managing stress, consulting a fertility specialist, and undergoing necessary tests.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
@endsection
@push('scripts')
@endpush