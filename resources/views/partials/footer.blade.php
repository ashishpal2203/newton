<section class="p-bottom p-top text-white"
    style="background: linear-gradient(135deg,#0a1a5e,#1e4fd8);" id="contact">

  <div class="container-v1">
    <div class="row align-items-end flex-column-reverse flex-md-row">
   

      <!-- LEFT SIDE -->
      <div class="col-md-6 col-12 col-sm-12 borbtm">
        <div class="d-flex">
        <div class="logofoot">
          <img src="{{ Storage::url('assets/images/logo-footer.png') }}">
        </div>

      

         <div class="rihht">
        <p class="mb-3 alignnn">
          <i class="bi bi-geo-alt-fill me-2"></i>
          {{ $global_settings['site_address'] ?? "1st floor Shrinivas Building Opposite\nKothari Farsan,\nZaver Road, Mulund West, Mumbai-400080" }}
        </p>

        <p class="">
          <i class="bi bi-telephone-fill me-2"></i>
          {{ $global_settings['contact_phone'] ?? '85915 89741 | 91378 48658' }}
        </p>

        <div class="d-flex gap-3 sociall">
          <p>Social Media</p>
          <a href="{{ $global_settings['social_facebook'] ?? 'https://www.facebook.com/NewtonsAcademy17' }}"><i class="bi bi-facebook"></i></a>
          <a href="{{ $global_settings['social_linkedin'] ?? 'https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2F90970653%2Fadmin%2F' }}"><i class="bi bi-linkedin"></i></a>
          <a href="{{ $global_settings['social_youtube'] ?? 'https://www.youtube.com/@NewtonsAcademy/playlists' }}"> <i class="bi bi-youtube"></i></a>
          <a href="{{ $global_settings['social_instagram'] ?? 'https://www.instagram.com/newtons_academy_/' }}"> <i class="bi bi-instagram"></i></a>
          
          
         
         
        </div>
      </div>



      </div>




      </div>

      <!-- RIGHT SIDE FORM -->
      <div class="col-md-5 col-12 col-sm-12 offset-md-1">
        <div class="bg-light text-dark p-4 rounded-4 shadow">
          <h4 class="mb-4">Contact us</h4>
          
          <form id="footerContactForm">
            @csrf
            <div class="mb-3">
              <label class="form-label small fw-bold">Name</label>
              <input type="text" name="name" class="form-control rounded-pill" placeholder="Your full name" required>
              <span class="text-danger error-text name_error small"></span>
            </div>
            
            <div class="mb-3">
              <label class="form-label small fw-bold">Mobile</label>
              <input type="text" name="mobile" class="form-control rounded-pill" placeholder="Your Mobile Number" required>
              <span class="text-danger error-text mobile_error small"></span>
            </div>
            
            <div class="mb-3">
              <label class="form-label small fw-bold">Email</label>
              <input type="email" name="email" class="form-control rounded-pill" placeholder="your@email.com" required>
              <span class="text-danger error-text email_error small"></span>
            </div>

            <div class="row mb-3">
              <div class="col">
                 <label class="form-label small fw-bold">Class</label>
                 <input type="text" name="class" class="form-control rounded-pill" placeholder="Your class" required>
                 <span class="text-danger error-text class_error small"></span>
              </div>
              <div class="col">
                 <label class="form-label small fw-bold">Stream</label>
                 <input type="text" name="stream" class="form-control rounded-pill" placeholder="Your Stream" required>
                 <span class="text-danger error-text stream_error small"></span>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label small fw-bold">Message (Optional)</label>
              <textarea name="message" class="form-control rounded-4" rows="3" placeholder="Tell us more..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2" id="submitBtn">
              <i class="bi bi-send me-2"></i> SUBMIT HERE
            </button>
          </form>
          
          <div id="formSuccessMessage" class="alert alert-success mt-3 d-none rounded-4">
             <i class="bi bi-check-circle-fill me-2"></i> Your request has been submitted successfully. We will contact you soon.
          </div>
        </div>
      </div>

    </div>

    <!-- FOOTER LINKS -->
    <div class="text-left tttoop small">
      <a href="{{ url('about-us') }}" class="text-white text-decoration-none me-3">about us </a>
      <a href="{{ route('gallery.index') }}" class="text-white text-decoration-none me-3">Gallery</a>
      <a href="{{ url('contact') }}" class="text-white text-decoration-none me-3">Contact Us </a>
      <a href="{{ url('help') }}" class="text-white text-decoration-none me-3">Help</a>
      <a href="{{ url('privacy-policy') }}" class="text-white text-decoration-none me-3">Privacy Policy</a>
      <a href="{{ url('disclaimer') }}" class="text-white text-decoration-none"> Disclaimer</a>
    </div>
    <div class="copyright">
    <p>{{ $global_settings['footer_text'] ?? "© 2025 Newton's Academy. Designed by" }}<a href="https://gravityweb.in"> Gravity Web</a></p>
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
    img: "{{ Storage::url('assets/images/frme.png') }}"
  },
  {
    name: "Our Mission",
    rank: "Empowering families through education, one life at a time.",
    msg: " At Newton's Academy, we believe that education is not just about academic success but also about changing lives. We are passionate about creating a positive impact in the lives of families by providing quality education that opens up opportunities and transforms futures. Seeing our students succeed and achieve their goals fills us with a deep sense of fulfilment and pride. We are committed to making a difference and changing lives through education, one family at a time.",
    img: "{{ Storage::url('assets/images/frme.png') }}"
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
