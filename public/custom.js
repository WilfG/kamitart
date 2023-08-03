
$(document).ready(function () {
    const slides = $(".slide");
    let currentIndex = 0;

    function showSlide(index) {
        slides.hide();
        slides.eq(index).fadeIn(800);

        // Reset the typing animation for each caption
        $(".caption").css("animation", "none");
        setTimeout(function () {
            $(".caption").css("animation", "typing 4s steps(60, end)");
        }, 100);
    }

    function showNextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    // Change slide every 5 seconds (adjust the interval as needed)
    setInterval(showNextSlide, 9000);

    // Show the first slide initially
    showSlide(currentIndex);

    // Get the popup and the button that opens and closes it
    popupContainer = $('#popupContainer');
    closePopupBtn = $('#closePopupBtn');

    // Function to open the popup
    $('.openPopupBtn').on('click', function () {

        $('#event_id').attr('value', $(this).data('event'));
        popupContainer.fadeIn();
        $('.popup-container').css('display', 'flex');
    });

    // Function to close the popup
    function closePopup() {
        popupContainer.fadeOut();
    }

    // Event listeners to open and close the popup
    closePopupBtn.on('click', closePopup);



    // Get the popup and the button that opens and closes it
    requestContainer = $('#requestContainer');
    closeRequestBtn = $('#closeRequestBtn');

    // Function to open the popup
    $('.requestArtBtn').on('click', function () {

        // $('#event_id').attr('value', $(this).data('event'));
        requestContainer.fadeIn();
        $('.request-container').css('display', 'flex');
    });
    $('.requestArtBtnMobile').on('click', function () {

        // $('#event_id').attr('value', $(this).data('event'));
        requestContainer.fadeIn();
        $('.request-container').css('display', 'flex');
    });

    // Function to close the popup
    function closeRequest() {
        requestContainer.fadeOut();
    }

    // Event listeners to open and close the popup
    closeRequestBtn.on('click', closeRequest);


    const menuButton = $('.mobile-menu-btn');
    const menu = $('.menu');

    menuButton.on('click', function() {
        menu.toggleClass('active');
    });
});