Source: https://codepen.io/cjl750/pen/pEAmgR

<div class="loader-map"></div>
<iframe data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1285.8838023334656!2d-75.17046547183132!3d39.95560630684209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6c742c9accb45%3A0xd35b74af27dd1eda!2sDan+Doyle+Law+Group!5e0!3m2!1sen!2sin!4v1555065153933!5m2!1sen!2sin"></iframe>

<div class="loader-map"></div>
<iframe data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1529.9806355432997!2d-75.39105454172554!3d39.91988289485652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6e908445f010d%3A0xae2ac863095987d7!2sDan+Doyle+Law+Group!5e0!3m2!1sen!2sin!4v1555065108512!5m2!1sen!2sin"></iframe>

<script>
    // LAZY LOAD FUNCTION
    if ($('iframe').length > 0) {
        function lazyLoad() {
            $('.ft-map iframe').each(function () {
                var frame = $(this),
                    vidSource = $(frame).attr('data-src'),
                    distance = $(frame).offset().top - $(window).scrollTop(),
                    distTopBot = window.innerHeight - distance,
                    distBotTop = distance + $(frame).height();

                if (distTopBot >= 0 && distBotTop >= 0) {
                    $(frame).attr('src', vidSource);
                    $(frame).removeAttr('data-src');
                    $('.loader-map').remove();	//loader icon
                }
            });
        }

        var throttled = _.throttle(lazyLoad, 100);
        $(window).scroll(throttled);
    }
</script>

<style>
	.ft-map {
		position: relative;
	}
	.loader-map{
		border: 3px solid #002a40;
		border-radius: 50%;
		border-top: 3px solid #6da548;
		width: 40px;
		height: 40px;
		-webkit-animation: spin 1s linear infinite;
		animation: spin 1s linear infinite;
		position: absolute;
		left: 50%;
		top: 50%;
		margin: -20px 0 0 -20px;
		z-index: 2;
	}
	@-webkit-keyframes spin {
		0% { -webkit-transform: rotate(0deg); }
		100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
		0% { transform: rotate(0deg); }
		100% { transform: rotate(360deg); }
	}
</style>