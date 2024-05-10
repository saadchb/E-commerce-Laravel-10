<script src="{{asset('build/assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('build/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('build/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('build/assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('build/assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('build/assets/js/slick.min.js')}}"></script>
<script src="{{asset('build/assets/js/biolife.framework.js')}}"></script>
<script src="{{asset('build/assets/js/functions.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const stars = document.querySelectorAll(".btn-rating");
        // Add event listeners to each star icon
        stars.forEach(function(star) {
            star.addEventListener("mouseenter", function() {
                const value = parseInt(star.dataset.value);          
                ratingText.textContent = ratings[value - 1];
            });
            star.addEventListener("click", function() {
                const value = parseInt(star.dataset.value);
                // Store selected rating in hidden input field
                document.getElementById("rating").value = value;
            });
        });
    });
</script>

<script>
    // Loop through each book and attach event listeners
    function SubmitForm() {
        const eleT = document.querySelectorAll(".submitButton");
        for (let i = 0; i < eleT.length; i++) {
            eleT[i].addEventListener("click", function() {
                this.parentElement.submit();
                // console.log('helo');
            });
        }
    }
    SubmitForm()
</script>