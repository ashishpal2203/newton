<!-- Announcement Popup Modal -->
<div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 bg-transparent">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow-none" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1060;"></button>
                
                @if($activePopup->redirect_url)
                    <a href="{{ $activePopup->redirect_url }}" class="d-block overflow-hidden rounded-4 shadow-lg">
                        <img src="{{ $activePopup->image_url }}" alt="{{ $activePopup->title }}" class="img-fluid w-100 hover-zoom">
                    </a>
                @else
                    <div class="overflow-hidden rounded-4 shadow-lg">
                        <img src="{{ $activePopup->image_url }}" alt="{{ $activePopup->title }}" class="img-fluid w-100">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    #announcementModal .modal-content {
        box-shadow: none !important;
    }
    #announcementModal .hover-zoom {
        transition: transform 0.3s ease;
    }
    #announcementModal .hover-zoom:hover {
        transform: scale(1.02);
    }
    #announcementModal .btn-close {
        background-color: rgba(0,0,0,0.5);
        padding: 0.5rem;
        border-radius: 50%;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const popupData = {
            id: "{{ $activePopup->id }}",
            type: "{{ $activePopup->trigger_type }}",
            value: parseInt("{{ $activePopup->trigger_value }}")
        };

        const modalElement = document.getElementById('announcementModal');
        const modal = new bootstrap.Modal(modalElement);

        function showPopup() {
            // Check if user has already seen this specific popup in this session
            if (!sessionStorage.getItem('popup_seen_' + popupData.id)) {
                modal.show();
                sessionStorage.setItem('popup_seen_' + popupData.id, 'true');
            }
        }

        if (popupData.type === 'delay') {
            // Wait for specified seconds then show
            setTimeout(showPopup, popupData.value * 1000);
        } else if (popupData.type === 'scroll') {
            // Listen for scroll and show after reaching pixel depth
            let scrollTriggered = false;
            window.addEventListener('scroll', function() {
                if (!scrollTriggered && window.scrollY > popupData.value) {
                    showPopup();
                    scrollTriggered = true;
                }
            });
        }
    });
</script>
