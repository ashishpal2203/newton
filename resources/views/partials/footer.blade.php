<section class="p-bottom p-top text-white"
    style="background: linear-gradient(135deg,#0a1a5e,#1e4fd8);" id="contact">

  <div class="container-v1">
    <div class="row flex-column-reverse flex-lg-row">
   
      <!-- BRAND & CONTACT INFO -->
      <div class="col-lg-3 col-md-12 mb-5 mb-lg-0 pb-4 pb-lg-0">
        <div class="logofoot mb-4">
          <img src="{{ Storage::url('assets/images/logo-footer.png') }}" alt="Newton's Academy" style="max-width: 180px;">
        </div>
        <div class="d-flex align-items-start mb-3">
          <i class="bi bi-geo-alt-fill fs-5 me-2 text-warning mt-1"></i>
          <p class="m-0" style="font-size: 14px; line-height: 1.6;">
            {{ $global_settings['site_address'] ?? "1st floor Shrinivas Building Opposite Kothari Farsan, Zaver Road, Mulund West, Mumbai-400080" }}
          </p>
        </div>
        <div class="d-flex align-items-center mb-4">
          <i class="bi bi-telephone-fill fs-5 me-2 text-warning"></i>
          <p class="m-0" style="font-size: 14px;">
            {{ $global_settings['contact_phone'] ?? '85915 98974 | 91378 48668' }}
          </p>
        </div>
        <div class="sociall d-flex align-items-center gap-3 mt-4 pt-3 border-top border-secondary">
          <a href="{{ $global_settings['social_facebook'] ?? 'https://www.facebook.com/NewtonsAcademy17' }}" class="text-white fs-5 hover-opacity"><i class="bi bi-facebook"></i></a>
          <a href="{{ $global_settings['social_linkedin'] ?? 'https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2F90970653%2Fadmin%2F' }}" class="text-white fs-5 hover-opacity"><i class="bi bi-linkedin"></i></a>
          <a href="{{ $global_settings['social_youtube'] ?? 'https://www.youtube.com/@NewtonsAcademy/playlists' }}" class="text-white fs-5 hover-opacity"><i class="bi bi-youtube"></i></a>
          <a href="{{ $global_settings['social_instagram'] ?? 'https://www.instagram.com/newtons_academy_/' }}" class="text-white fs-5 hover-opacity"><i class="bi bi-instagram"></i></a>
        </div>
      </div>

      <!-- QUICK LINKS -->
      <div class="col-lg-2 col-md-6 col-6 mb-5 mb-lg-0">
        <h5 class="text-warning mb-4 fw-bold fs-5">Quick Links</h5>
        <ul class="list-unstyled d-flex flex-column gap-2 m-0" style="font-size: 14px;">
          <li><a href="{{ url('about-us') }}" class="text-white text-decoration-none hover-opacity">About Us</a></li>
          <li><a href="{{ route('gallery.index') }}" class="text-white text-decoration-none hover-opacity">Gallery</a></li>
          <li><a href="{{ url('contact') }}" class="text-white text-decoration-none hover-opacity">Contact Us</a></li>
          <li><a href="{{ url('help') }}" class="text-white text-decoration-none hover-opacity">Help</a></li>
          <li><a href="{{ url('privacy-policy') }}" class="text-white text-decoration-none hover-opacity">Privacy Policy</a></li>
          <li><a href="{{ url('disclaimer') }}" class="text-white text-decoration-none hover-opacity">Disclaimer</a></li>
          <li><a href="{{ route('login') }}" class="text-white text-decoration-none hover-opacity">Admin Login</a></li>
        </ul>
      </div>

      <!-- COURSES WE OFFER -->
      <div class="col-lg-3 col-md-6 col-6 mb-5 mb-lg-0">
        <h5 class="text-warning mb-4 fw-bold fs-5">Courses We Offer</h5>
        <ul class="list-unstyled d-flex flex-column gap-2 m-0" style="font-size: 14px;">
          <li><a href="{{ route('courses.jee-mains-advanced') }}" class="text-white text-decoration-none hover-opacity">JEE Mains & Advanced</a></li>
          <li><a href="{{ route('courses.neet') }}" class="text-white text-decoration-none hover-opacity">NEET</a></li>
          <li><a href="{{ route('courses.mht-cet') }}" class="text-white text-decoration-none hover-opacity">MHT-CET</a></li>
          <li><a href="{{ route('courses.science') }}" class="text-white text-decoration-none hover-opacity">Science (XI & XII)</a></li>
          <li><a href="{{ route('courses.foundation') }}" class="text-white text-decoration-none hover-opacity">Foundation (VIII to X)</a></li>
          <li><a href="{{ route('courses.school-section') }}" class="text-white text-decoration-none hover-opacity">School Section</a></li>
        </ul>
      </div>

      <!-- RIGHT SIDE FORM -->
      <div class="col-lg-4 col-md-12 col-12 mb-5 mb-lg-0">
        <div class="bg-white text-dark p-3 rounded-4 shadow-lg border-0">
          <h5 class="mb-4 fw-bold" style="color: #0a3d91;">Get in Touch</h5>
          
          <form id="footerContactForm">
            @csrf
            
            <div class="mb-3">
              <input type="text" name="name" class="form-control bg-light border-0 px-3" placeholder="Full Name" required style="font-size: 14px; border-radius: 8px;">
              <span class="text-danger error-text name_error small"></span>
            </div>
            
            <div class="row g-2 mb-3">
              <div class="col-6">
                <input type="text" name="mobile" class="form-control bg-light border-0 px-3" placeholder="Mobile No." required style="font-size: 14px; border-radius: 8px;">
                <span class="text-danger error-text mobile_error small"></span>
              </div>
              <div class="col-6">
                <input type="email" name="email" class="form-control bg-light border-0 px-3" placeholder="Email Address" required style="font-size: 14px; border-radius: 8px;">
                <span class="text-danger error-text email_error small"></span>
              </div>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-6">
                 <input type="text" name="class" class="form-control bg-light border-0 px-3" placeholder="Class" required style="font-size: 14px; border-radius: 8px;">
                 <span class="text-danger error-text class_error small"></span>
              </div>
              <div class="col-6">
                 <input type="text" name="stream" class="form-control bg-light border-0 px-3" placeholder="Stream" required style="font-size: 14px; border-radius: 8px;">
                 <span class="text-danger error-text stream_error small"></span>
              </div>
            </div>

            <div class="mb-4">
              <textarea name="message" class="form-control bg-light border-0 px-3 py-3" rows="3" placeholder="Your Message (Optional)" style="font-size: 14px; border-radius: 8px; resize: none;"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" id="submitBtn" style="border-radius: 8px; font-size: 15px;">
              <i class="bi bi-send me-2"></i> Submit Request
            </button>
          </form>
          
          <div id="formSuccessMessage" class="alert alert-success mt-3 d-none" style="border-radius: 8px; font-size: 14px;">
             <i class="bi bi-check-circle-fill me-2"></i> Request submitted successfully. We will contact you soon.
          </div>
        </div>
      </div>

    </div>

    <!-- FOOTER BOTTOM -->
    <div class="text-center mt-4 pb-3">
       <p class="mb-0 text-white-50" style="font-size: 14px;">{{ $global_settings['footer_text'] ?? "© 2025 Newton's Academy. Designed by" }} <a href="https://gravityweb.in" class="text-white hover-opacity text-decoration-none">Gravity Web</a></p>
    </div>

  </div>
</section>


















<!-- <div id="popup desktop-popup" class="popup">
    

<!-- POPUP ->
<div id="asatPopup" class="popup-overlay">
<span class="popup-close" onclick="closePopup()">×</span>




  <div class="popup-box desktop">


    

    <div class="popup-content">

      <div class="popup-text">

       

      </div>

      

    </div>

    <div class="popup-bottom">
      <a href="#">Register Now</a>
    </div>

  </div>

  <div class="popup-boxxx mobile">


    

    <div class="popup-contentmobile">

      <div class="popup-text">

       

      </div>

      

    </div>

    <div class="popup-bottom">
      <a href="#">Register Now</a>
    </div>

  </div>
</div>

</div> -->






<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
new Swiper(".reviewSwiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 600,
  loop: false,


  breakpoints: {
    768: { slidesPerView: 2 },
    1024: { slidesPerView: 3 }
  }
});
</script>



<script>
 const data = [
  {
    name: "Our Mission",
    rank: "Empowering families through education, one life at a time.",
    msg: " At Newton's Academy, we believe that education is not just about academic success but also about changing lives. We are passionate about creating a positive impact in the lives of families by providing quality education that opens up opportunities and transforms futures. Seeing our students succeed and achieve their goals fills us with a deep sense of fulfilment and pride. We are committed to making a difference and changing lives through education, one family at a time.",
    img: "{{ Storage::url('assets/images/frme.webp') }}"
  },
  {
    name: "Our Mission",
    rank: "Empowering families through education, one life at a time.",
    msg: " At Newton's Academy, we believe that education is not just about academic success but also about changing lives. We are passionate about creating a positive impact in the lives of families by providing quality education that opens up opportunities and transforms futures. Seeing our students succeed and achieve their goals fills us with a deep sense of fulfilment and pride. We are committed to making a difference and changing lives through education, one family at a time.",
    img: "{{ Storage::url('assets/images/frme.webp') }}"
  }
];

let i = 0;

const nameEl = document.getElementById("name");
const rankEl = document.getElementById("rank");
const msgEl = document.getElementById("msg");
const imgEl = document.getElementById("img");

function show() {
  if(!nameEl || !rankEl || !msgEl || !imgEl) return;
  nameEl.innerText = data[i].name;
  rankEl.innerText = data[i].rank;
  msgEl.innerText = data[i].msg;
  imgEl.src = data[i].img;
}

function next() {
  i = (i + 1) % data.length;
  show();
}

function prev() {
  i = (i - 1 + data.length) % data.length;
  show();
}

if(nameEl && rankEl && msgEl && imgEl){
  show();
}

</script>


<script >
const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
  const updateCount = () => {
    const rawTarget = counter.getAttribute('data-target');
    const targetMatch = rawTarget.match(/[\d.]+/);
    if (!targetMatch) {
       counter.innerText = rawTarget;
       return;
    }
    const target = parseFloat(targetMatch[0]);
    const currentTextMatch = counter.innerText.match(/[\d.]+/);
    const count = currentTextMatch ? parseFloat(currentTextMatch[0]) : 0;

    const speed = 200;
    const increment = target / speed;

    if (count < target) {
      let nextCount = Math.ceil(count + increment);
      if (nextCount > target) nextCount = target;
      
      let suffix = rawTarget.replace(/[\d.]+/g, '');
      counter.innerText = nextCount + suffix;
      setTimeout(updateCount, 20);
    } else {
      counter.innerText = rawTarget;
    }
  };

  updateCount();
});

</script>




@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#footerContactForm').on('submit', function(e) {
        e.preventDefault();
        
        let formData = $(this).serialize();
        let $btn = $('#submitBtn');
        let $form = $(this);
        let $successMsg = $('#formSuccessMessage');
        
        // Reset errors
        $('.error-text').text('');
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span> Sending...');
        
        $.ajax({
            url: "{{ route('contact.store') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                if(response.success) {
                    $form.trigger("reset");
                    $form.addClass('d-none');
                    $successMsg.removeClass('d-none');
                    
                    // Optional: Reset form after 5 seconds to allow another submission
                    setTimeout(function() {
                        $successMsg.addClass('d-none');
                        $form.removeClass('d-none');
                    }, 8000);
                }
            },
            error: function(xhr) {
                if(xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                } else {
                    alert('Something went wrong. Please try again.');
                }
            },
            complete: function() {
                $btn.prop('disabled', false).html('<i class="bi bi-send me-2"></i> SUBMIT HERE');
            }
        });
    });
});
</script>
@endpush
